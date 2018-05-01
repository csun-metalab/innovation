<?php

declare(strict_types=1);

namespace Helix\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectPolicy extends Model
{
    protected $table = 'project_policy';
    protected $fillable = ['project_id', 'policy_type', 'policy'];

    public function scopePolicyTypeIs($q, $policyType)
    {
        return $q->where('policy_type', $policyType)->first();
    }

    public function scopeInvitationPolicy($q, Project $project)
    {
        return $q->where('project_id', $project->project_id)->where('policy_type', 'invitation');
    }

    public function scopeApprovalPolicy($q, Project $project)
    {
        return $q->where('project_id', $project->project_id)->where('policy_type', 'approval');
    }

    public function scopeVisibilityPolicy($q, Project $project)
    {
        return $q->where('project_id', $project->project_id)->where('policy_type', 'visibility');
    }
}
