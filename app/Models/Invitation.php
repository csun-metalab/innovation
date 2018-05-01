<?php

declare(strict_types=1);

namespace Helix\Models;

use Illuminate\Database\Eloquent\Model;

class Invitation extends Model
{
    protected $fillable = [
        'project_id',
        'from_id',
        'recipient_id',
        'role_position',
        'accepted',
        'updated_at',
    ];

    public function project()
    {
        return $this->belongsTo('Helix\Models\Project', 'project_id');
    }

    public function invitee()
    {
        return $this->hasOne('Helix\Models\Person', 'user_id', 'recipient_id');
    }

    public function inviter()
    {
        return $this->hasOne('Helix\Models\Person', 'user_id', 'from_id');
    }

    public function role()
    {
        return $this->hasOne('Helix\Models\Role', 'rolename_id', 'role_position');
    }

    public function memberships()
    {
        return $this->hasMany('Helix\Models\NemoMembership', 'parent_entities_id', 'project_id')
                ->where('parent_entities_id', 'LIKE', 'projects:%');
    }

    public function scopeActiveInvitations($q)
    {
        return $q->whereNull('updated_at')
                ->get();
    }

    public function scopeAcceptedInvitations($q)
    {
        return $q->where('accepted', true)
                ->get();
    }

    public function scopeRejectedInvitations($q)
    {
        return $q->where('accepted', false)
                 ->whereNotNull('updated_at')
                 ->get();
    }

    public function scopePending($q, Project $project, Person $person)
    {
        return $q->where('project_id', $project->project_id)
                ->where('recipient_id', $person->user_id)
                ->whereNull('from_id')
                ->whereNull('updated_at');
    }

    public function updateAccepted($bool)
    {
        return $this->update(['accepted' => $bool, 'updated_at' => \Carbon\Carbon::now()]);
    }
}
