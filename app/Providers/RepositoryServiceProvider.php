<?php

namespace App\Providers;

use App\Interfaces\CreatorRepositoryInterface;
use App\Repositories\CreatorRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
        $this->app->bind(CreatorRepositoryInterface::class, CreatorRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
