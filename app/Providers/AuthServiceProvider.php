<?php

namespace Helix\Providers;

use Helix\Models\Person;
use Helix\Models\Project;
use Helix\Models\Invitation;
use Helix\Models\NemoMembership;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [];

    /**
     * Register any application authentication / authorization services.
     *
     * @param  \Illuminate\Contracts\Auth\Access\Gate  $gate
     * @return void
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);

        // The auth user is the Lead Principal Investigator or Editor
        $gate->define('is-owner', function(Person $person, Project $project){
            return $person->hasRoleOnProject(['Lead Principal Investigator', 'Co-Principal Investigator'], $project) || $person->hasRole('admin');
        });

        // The auth user can accept or reject invitations
        $gate->define('accept-or-reject', function(Person $person, Invitation $invitation, Project $project){
            is_null($invitation->from_id) ? $whoSentTheInvite = 'invitation came from self' : $whoSentTheInvite = 'invitation sent by authority';

            switch($whoSentTheInvite)
            {
                // Auth user is requesting to be part of project so only project authority can accept or reject
                case 'invitation came from self':
                    return $person->hasRoleOnProject(['Lead Principal Investigator', 'Co-Principal Investigator'], $project);
                break;

                // Auth user was invited from project authority so only recipient can accept or reject
                case 'invitation sent by authority':
                    return $invitation->recipient_id == $person->user_id;
                break;
            }
        });
    }
}
