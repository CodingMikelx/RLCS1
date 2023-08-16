<?php

namespace App\Providers;

use App\Interfaces\RepositoryInterface;
use App\Repositories\CreatorRepository;
use App\Repositories\AudioRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
        $this->app->bind(RepositoryInterface::class, CreatorRepository::class);
        $this->app->bind(RepositoryInterface::class, AudioRepository::class);
        
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
