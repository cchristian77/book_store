<?php

namespace App\Providers;

// Interfaces
use App\Repositories\Interfaces\BaseInterface;

// Repositories
use App\Repositories\BaseRepository;

// Library
use App\Repositories\Interfaces\UserInterface;
use App\Repositories\UserRepository;
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
        $this->app->bind(BaseInterface::class, BaseRepository::class);
        $this->app->bind(UserInterface::class, UserRepository::class);
    }
}
