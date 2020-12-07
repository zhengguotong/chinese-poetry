<?php

namespace App\Console\Commands;

use App\Repositories\Contracts\IPoetry;
use Illuminate\Console\Command;
use App\Services\Contracts\ITranslation;
use Config;

class PullPoetry extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'chinese-poetry:pull-poetry {type=shi} {--flush}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Pull Chinese Poetry';

    protected $translateService;
    protected $poetryRepository;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(ITranslation $translateService, IPoetry $poetryRepository)
    {
        parent::__construct();

        $this->translateService = $translateService;
        $this->poetryRepository = $poetryRepository;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
    //     $types  = array();
    //     $type = $this->argument('type');
    //     $flush = $this->option('flush');

    //     if ($flush) {
    //         $this->info('Clear poetry data');
    //         $this->poetryRepository->truncate();
    //     }

    //     $poetryJson = Config::get('chinesepoetry.poetry_source');

    //     if ($flush || $type == 'all') {
    //         $types = array_keys($poetryJson);
    //     } else {
    //         $types = array($type);
    //     }

    //     foreach ($types as $key) {
    //         if (isset($poetryJson[$key])) {
    //             $this->info('Starting parse ' . $key . ' author Json');
    //             $this->parsePoetry($key, $poetryJson[$key]);
    //         } else {
    //             $this->warn($key . ' type poetry json did not exist');
    //         }
    //     }
    }

    protected function parsePoetry($type, $json)
    {
        switch ($type) {
            case 'shi':
                $this->parseShi($json);
                break;
            default:
                break;
        }
    }

    protected function parseShi($json)
    {
        // $count = 0;
        $json .= "0.json";
        $file = @file_get_contents($json);
        if ($file !== false) {
            $poetries = json_decode($file, true);

            if ($poetries && count($poetries) > 0) {
                $bar = $this->output->createProgressBar(count($poetries));
                $bar->start();

                foreach ($poetries as $poetry) {
                    dd($poetry);
                    // $author['type'] = $;
                    // $author['name'] =  $this->translateService->translate($author['name']);
                    // $author['desc'] =  $this->translateService->translate($author['desc']);
                    // $this->authorRepository->create($author);
                    $bar->advance();
                }
            }
        } else {
            $this->warn($json . ' json file did not exist!');
        }
    }
}
