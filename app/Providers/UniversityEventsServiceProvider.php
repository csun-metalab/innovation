<?php

declare(strict_types=1);

namespace Helix\Providers;

use Illuminate\Support\ServiceProvider;

class UniversityEventsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     */
    public function boot()
    {
    }

    /**
     * Register services.
     */
    public function register()
    {
        $this->app->bind(
            'Helix\Contracts\GetUniversityEventsContract',
            'Helix\Services\GetUniversityEventsService'
        );
        $this->app->bind(
            'Helix\Contracts\CreateUniversityEventContract',
            'Helix\Services\CreateUniversityEventService'
        );
    }
}
