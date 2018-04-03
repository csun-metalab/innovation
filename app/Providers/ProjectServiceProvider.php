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
            'Helix\Contracts\VerifyProjectIdContract',
            'Helix\Services\VerifyProjectIdService'
        );

        $this->app->bind(
            'Helix\Contracts\UpdateProjectGeneralContract',
            'Helix\Services\UpdateProjectGeneralService'
        );

        $this->app->bind(
            'Helix\Contracts\UpdateProjectAttributesContract',
            'Helix\Services\UpdateProjectAttributesService'
        );

        $this->app->bind(
            'Helix\Contracts\UpdateProjectPolicyContract',
            'Helix\Services\UpdateProjectPolicyService'
        );

        $this->app->bind(
            'Helix\Contracts\UpdateProjectPurposeContract',
            'Helix\Services\UpdateProjectPurposeService'
        );
        $this->app->bind(
            'Helix\Contracts\CreateSeekingContract',
            'Helix\Services\CreateSeekingService'
        );
        $this->app->bind(
            'Helix\Contracts\UpdateCollaboratorsContract',
            'Helix\Services\UpdateCollaboratorsService'
        );
        $this->app->bind(
            'Helix\Contracts\GetUniversityEventsContract',
            'Helix\Services\GetUniversityEventsService'
        );
    }
}
