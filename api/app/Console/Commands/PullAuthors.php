<?php

namespace App\Console\Commands;

use App\Repositories\Contracts\IAuthor;
use App\Services\Contracts\ITranslation;
use Illuminate\Console\Command;
use Config;

class PullAuthors extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'chinese-poetry:pull-authors {dynasty=all} {--flush}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Pull chinese poetry authors';

    protected $translateService;
    protected $authorRepository;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(ITranslation $translateService, IAuthor $authorRepository)
    {
        parent::__construct();

        $this->translateService = $translateService;
        $this->authorRepository = $authorRepository;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $dynasties  = array();
        $dynasty = $this->argument('dynasty');
        $flush = $this->option('flush');

        if ($flush) {
            $this->info('Clear Old authors data');
            $this->authorRepository->truncate();
        }

        $author_jsons = Config::get('chinesepoetry.authors_source');

        if ($flush || $dynasty == 'all') {
            $dynasties = array_keys($author_jsons);
        } else {
            $dynasties = array($dynasty);
        }

        foreach ($dynasties as $key) {
            if (isset($author_jsons[$key])) {
                $this->info('Starting parse ' . $key . ' author Json');
                $this->parseAuthor($key, $author_jsons[$key]);
            } else {
                $this->warn($key . ' dynasty authors json did not exist');
            }
        }
    }

    protected function parseAuthor($dynasty, $json)
    {
        $file = @file_get_contents($json);
        if ($file !== false) {
            $authors = json_decode($file, true);

            if ($authors && count($authors) > 0) {
                $bar = $this->output->createProgressBar(count($authors));
                $bar->start();

                foreach ($authors as $author) {
                    $author['dynasty'] = $dynasty;
                    $author['name'] =  $this->translateService->translate($author['name']);
                    $author['desc'] =  $this->translateService->translate($author['desc']);
                    $this->authorRepository->create($author);
                    $bar->advance();
                }
            }
        } else {
            $this->warn($json . ' json file did not exist!');
        }
    }
}
