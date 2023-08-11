<?php

namespace App\Providers;

use App\Interfaces\RepositoryInterface;
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
        $this->app->bind(RepositoryInterface::class, CreatorRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
