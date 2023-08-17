<?php

namespace App\Providers;

use App\Http\Controllers\AudioController;
use App\Http\Controllers\CreatorController;
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
        // $this->app->bind(RepositoryInterface::class, CreatorRepository::class);
        // $this->app->bind(RepositoryInterface::class, AudioRepository::class);

        $this->app->when(CreatorController::class)->needs(RepositoryInterface::class)->give(
            function () {
                return new CreatorRepository;
            }
        );

        $this->app->when(AudioController::class)->needs(RepositoryInterface::class)->give(
            function () {
                return new AudioRepository;
            }
        );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
