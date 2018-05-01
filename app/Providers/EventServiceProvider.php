<?php

declare(strict_types=1);

namespace Helix\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'Helix\Events\Project\ProjectCreatedOrUpdated' => [
            'Helix\Listeners\Project\UpdateProjectGeneral',
            'Helix\Listeners\Project\UpdateInterests',
            'Helix\Listeners\Project\UpdateCollaborators',
            'Helix\Listeners\Project\UpdateProjectPolicy',
            'Helix\Listeners\Project\UpdateProjectAttributes',
            // 'Helix\Listeners\Project\UpdateProjectPurpose',
        ],
        'Helix\Events\Individual\IndividualAddInterests' => [
            'Helix\Listeners\Individual\AddInterests',
        ],
        'Helix\Events\Individual\IndividualAddAcademicInterests' => [
            'Helix\Listeners\Individual\AddAcademicInterests',
        ],
        'Helix\Events\Individual\IndividualAddPersonalInterests' => [
            'Helix\Listeners\Individual\AddPersonalInterests',
        ],
    ];

    /**
     * The subscriber classes to register.
     *
     * @var array
     */
    protected $subscribe = [];

    /**
     * Register any other events for your application.
     *
     * @param \Illuminate\Contracts\Events $events
     */
    public function boot()
    {
        parent::boot();
    }
}
