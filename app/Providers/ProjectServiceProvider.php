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
        $this->Helix->bind(
            'Helix\Contracts\VerifyProjectIdContract',
            'Helix\Services\VerifyProjectIdService'
        );

        $this->Helix->bind(
            'Helix\Contracts\UpdateProjectGeneralContract',
            'Helix\Services\UpdateProjectGeneralService'
        );

        $this->Helix->bind(
            'Helix\Contracts\UpdateProjectAttributesContract',
            'Helix\Services\UpdateProjectAttributesService'
        );

        $this->Helix->bind(
            'Helix\Contracts\UpdateProjectPolicyContract',
            'Helix\Services\UpdateProjectPolicyService'
        );

        $this->Helix->bind(
            'Helix\Contracts\UpdateProjectPurposeContract',
            'Helix\Services\UpdateProjectPurposeService'
        );
        $this->Helix->bind(
            'Helix\Contracts\CreateProjectSeekingContract',
            'Helix\Services\CreateProjectSeekingService'
        );
        $this->Helix->bind(
            'Helix\Contracts\CreateProjectTagContract',
            'Helix\Services\CreateProjectTagService'
        );
    }
}
