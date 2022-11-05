<?php

namespace App\Providers;

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

        $models = array(
            'Base',
            'User',
            'Publisher',
            'Author',
            'Genre',
            'Book',
        );

        foreach ($models as $model) {
            $this->app->bind(
                "App\Repositories\Interfaces\\{$model}Interface",
                "App\Repositories\\{$model}Repository"
            );
        }
    }
}
