<?php

declare(strict_types=1);

namespace Helix\Providers;

use Illuminate\Support\ServiceProvider;

class ProjectServiceProvider extends ServiceProvider
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
            'App\Contracts\VerifyProjectIdContract',
            'App\Services\VerifyProjectIdService'
        );

        $this->app->bind(
            'App\Contracts\UpdateProjectGeneralContract',
            'App\Services\UpdateProjectGeneralService'
        );
    }
}
