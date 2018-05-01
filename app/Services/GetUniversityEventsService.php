<?php

declare(strict_types=1);

namespace Helix\Services;

use Helix\Contracts\GetUniversityEventsContract;
use Helix\Models\Event;
use Helix\Models\Invitation;

class GetUniversityEventsService implements GetUniversityEventsContract
{
    public function getUniversityEvents()
    {
        $events = Event::get();
        $pendingInvitations = $this->pendingInvitations()->count();
        return view('pages.dashboard.events', compact('events', 'pendingInvitations'));
    }

    private function pendingInvitations()
    {
        return $invitations = Invitation::with('project')
            ->where('recipient_id', auth()->user()->user_id)
            ->whereNotNull('from_id')
            ->whereNull('updated_at')
            ->orwhereHas('memberships', function ($q) {
                $q->whereIn(
                    'role_position',
                    [
                        'Co-Principal Investigator',
                        'Lead Principal Investigator',
                    ]
                )
                    ->where('individuals_id', auth()->user()->user_id);
            })
            ->whereNull('from_id')
            ->whereNull('updated_at')
            ->get();
    }
}
