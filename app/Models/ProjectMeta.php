<?php

declare(strict_types=1);

namespace Helix\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectMeta extends Model
{
    protected $table = 'projectmeta';
    protected $primaryKey = 'project_id';
    protected $fillable = [
      'title', 'description',
   ];
    public $incrementing = false;

    /**
     * Relates this project to its assoicated people.
     *
     * @return Builder
     */
    public function collaborators()
    {
        return $this->belongsToMany('Helix\Models\Person', 'person_project', 'project_id', 'individuals_id');
    }

    /**
     * Relates this project to its associated research interests.
     *
     * @return Builder
     */
    public function expertise()
    {
        return $this->belongsToMany('Helix\Models\Expertise', 'fresco.expertise_entity', 'entities_id', 'expertise_id');
    }

    public function research_interests()
    {
        return $this->expertise()->where('expertise_id', 'LIKE', 'research:%');
    }

    /**
     * Relates this project to its associated project details from the projects table.
     *
     * @return Builder
     */
    public function details()
    {
        return $this->hasOne('Helix\Models\Project', 'project_id', 'project_id');
    }

    /**
     * Relates this project to its associated project details from the projects table.
     *
     * @return Builder
     */
    public function image()
    {
        return $this->morphOne('Helix\Models\Image', 'imageable');
    }

    /**
     * Relates this project to its associated funds.
     *
     * @return Builder
     */
    public function funds()
    {
        return $this->hasMany('Helix\Models\Fund', 'project_id');
    }

    // returns the funding for the most current period - portion of the lump sum
    public function fundingToDate()
    {
        $funds = $this->details
              ->funds()
              ->where('project_id', $this->project_id)
              ->where('start_date', '<', \Carbon\Carbon::now())
              ->pluck('amount')
              ->toArray();

        return \array_sum($funds);
    }

    // returns the entire fund amount the project will receive for its lifespan - lump sum amount
    public function totalFunding()
    {
        $funds = \array_column($this->funds->toArray(), 'amount');

        return \array_sum($funds);
    }

    public function isFunded()
    {
        return $this->details->funds;
    }

    // returns the project sponsors
    public function sponsors()
    {
        $sponsors = $this->funds->pluck('sponsor_id')->toArray();
        $sponsors = \array_unique($sponsors);
        $names = [];

        foreach ($sponsors as $sponsorId) {
            $name = Sponsor::findOrFail($sponsorId)->name;

            \array_push($names, $name);
        }

        return $names;
    }

    /**
     * Relates this project to its associated sponsors.
     *
     * @return Builder
     */
    public function invitations()
    {
        return $this->hasMany('Helix\Models\Invitation', 'project_id');
    }

    /**
     * Return the principle investigators for a project.
     */
    // public function principleInvestigators()
    // {
    //    return $this->hasMany('Helix\Models\PersonProject','project_id')->where('role_position', "pi/copi")->hasMany('Helix\Models\Person','individuals_id');
    // }
    public function pi()
    {
        return $this->hasMany('Helix\Models\PersonProject', 'project_id')->where('role_position', 'pi/copi');
    }

    /**
     * Relates this project to its policies.
     */
    public function policies()
    {
        return $this->hasMany('Helix\Models\ProjectPolicy', 'project_id', 'project_id');
    }

    public static function getProjectTypeLabels()
    {
        return [
           'open_access' => 'Open Access',
           'public_closed_access' => 'Public Closed Access',
           'institutional_open_access' => 'Institutional Open Access',
           'institutional_closed_access' => 'Institutional Closed Access',
           'open_project_showcase' => 'Open Project Showcase',
           'institutional_project_showcase' => 'Institutional Project Showcase',
           'private' => 'Private',
       ];
    }

    public static function getSelectedPolicies($project_type, $key = null)
    {
        $projectTypes = [
           'open_access' => ['visibility' => 'public', 'invitation' => 'implicit', 'approval' => 'self'],
           'public_closed_access' => ['visibility' => 'public', 'invitation' => 'implicit', 'approval' => 'editor'],
           'institutional_open_access' => ['visibility' => 'internal', 'invitation' => 'implicit', 'approval' => 'self'],
           'institutional_closed_access' => ['visibility' => 'internal', 'invitation' => 'implicit', 'approval' => 'editor'],
           'open_project_showcase' => ['visibility' => 'public', 'invitation' => 'editor', 'approval' => 'self'],
           'institutional_project_showcase' => ['visibility' => 'internal', 'invitation' => 'editor', 'approval' => 'self'],
           'private' => ['visibility' => 'private', 'invitation' => 'editor', 'approval' => 'self'],
       ];

        if ($key == null) {
            return $projectTypes[$project_type];
        }

        return \array_search($project_type, $projectTypes);
    }

    public function isJoinable()
    {
        $query = $this->policies()->policyTypeIs('approval');

        if (\in_array($query->policy, ['self', 'implicit'])) {
            return true;
        }
    }

    public function isRequestable()
    {
        $query = $this->policies()->policyTypeIs('approval');

        if (\in_array($query->policy, ['editor', 'pi/copi'])) {
            return true;
        }
    }

    public function isVisible()
    {
        return $this->details()
              ->where('project_id', $this->project_id)
               ->whereIn('visibility', ['public', 'internal'])
               ->first();
    }
}
