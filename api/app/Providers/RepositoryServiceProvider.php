<?php

namespace App\Providers;

use App\Repositories\Contracts\{
    IAuthor,
    IParagraph,
    IPoetry
};

use App\Repositories\Eloquent\{
    AuthorRepository,
    ParagraphRepository,
    PoetryRepository
};

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(IAuthor::class, AuthorRepository::class);
        $this->app->bind(IPoetry::class, PoetryRepository::class);
        $this->app->bind(IParagraph::class, ParagraphRepository::class);
    }
}
