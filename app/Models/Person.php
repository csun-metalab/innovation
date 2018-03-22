<?php

declare(strict_types=1);

namespace Helix\Models;

use Illuminate\Database\Eloquent\Model;
use METALab\Auth\MetaUser;

class Person extends MetaUser
{
    protected $table = 'users';
    protected $primaryKey = 'user_id';

    /**
     * user_id,
     * first_name,
     * middle_name,
     * last_name,
     * common_name,
     * display_name,
     * email,
     * gender,
     * confidential,
     * deceased,
     * affiliation,
     * rank,
     * affiliation_status,
     * biography,
     * profile_image,
     * orcid_id,
     * created_at,
     * updated_at,.
     */
    // this must be set for models that do not use an auto-incrementing PK
    public $incrementing = false;

    // This is used to keep track of related search terms
    public $relatedSearchTerms;

    /**
     * Constructs a new Person object. This constructor has to be added because
     * this model is subclassed from the MetaUser class and therefore its parent
     * constructor has to be invoked.
     */
    public function __construct()
    {
        parent::__construct($this->table, $this->primaryKey);
    }

    public function profile_image()
    {
        $email = $this->email;
        $imageUrl = getProfileImage($email);

        return $this->image = $imageUrl;
    }

    public function profile_url()
    {
        return config('app.faculty_profile_url') . $this->emailURI;
    }

    /**
     * Relates this person to their associated expertise.
     * //Don't use this.
        return $this->all_interests()->where('expertise_id', 'LIKE', 'research:%');
    }

    /**
     * Returns the academic interest model for a user.
     *
     * @return Builder
     */
    public function expertise()
    {
        return $this->belongsToMany('Helix\Models\Expertise', 'person_expertise', 'individuals_id', 'expertise_id');
    }

    /**
     * Relates this Person to all its associated Department models. This also
     * tacks on the role_name attribute from the pivot table used in the
     * relationship.
     *
     * @return Builder
     */
    public function departments()
    {
        return $this->belongsToMany('Helix\Models\Departments', 'department_user', 'user_id', 'department_id')
            ->withPivot('role_name');
    }

    /**
     * This will grab all the academic departments associated with a user.
     *
     * @return mixed
     */
    public function academicDepartments()
    {
        return $this->hasMany('Helix\Models\NemoMembership', 'individuals_id')
            ->where('parent_entities_id', 'LIKE', 'academic_departments:%');
    }

    /**
     * This will grab from academicDepartments eager-load the primary department.
     * Note: this is similar to how faculty retrieves the primary department.
     *
     * @return NemoEntity or null
     */
    public function getPrimaryDepartmentAttribute()
    {
        if (!empty($this->academicDepartments)) {
            // check whether a primary department exists
            $primary = $this->academicDepartments->filter(function ($dept) {
                return $dept->primary;
            })->first();

            if (!empty($primary)) {
                return $primary;
            }

            // just return the first department if nothing is marked as
            // the primary department
            return $this->academicDepartments->first();
        }

        return null;
    }

    // *
    // * Returns the Image model instance from which this Person is morphed.
    // *
    // * @return Image

    //  public function image() {
    //    return $this->morphOne('Helix\Models\Image', 'imageable');
    //  }

    /**
     * Relates this person their associated projects.
     *
     * @return Builder
     */
    public function projects()
    {
        return $this->belongsToMany('Helix\Models\Project', 'nemo.memberships', 'individuals_id', 'parent_entities_id')->withPivot('role_position');
    }

    /**
     * Relates this Person to all its associated Role models.
     *
     * @return Builder
     */
    public function roles()
    {
        // grab all the roles associated with this person depending on whether they
        // exist in an academic department or they are assigned an application-specific
        // role instead
        return $this->belongsToMany('Helix\Models\Role', 'nemo.memberships', 'individuals_id', 'role_position')
         ->withPivot('parent_entities_id')
         ->where('individuals_id', $this->user_id)
         ->where(function ($q) {
             $q->where('parent_entities_id', 'LIKE', 'academic\_departments:%')
               ->orWhere('parent_entities_id', config('app.application_entity_id'));
         });
    }

    /**
     * Returns the user with the given identifier. This is used primarily by
     * custom authentication service providers.
     *
     * @param string $identifier The identifier to use for retrieval
     *
     * @return User
     */
    public static function findForAuth($identifier)
    {
        return Person::where('user_id', '=', $identifier)->first();
    }

    /**
     * Returns the user with the given identifier and Remember Me token. This
     * is used primarily by custom authentication service providers.
     *
     * @param string $identifier The identifier to use for retrieval
     * @param string $token      The token to use for retrieval
     *
     * @return User
     */
    public static function findForAuthToken($identifier, $token)
    {
        return Person::where('user_id', '=', $identifier)
         ->where('remember_token', '=', $token)
         ->first();
    }

    /**
     * Returns whether the person has the specified general role name.
     *
     * @param string $role The system name of the role to check
     *
     * @return boolean
     */
    public function hasRole($role)
    {
        $roles = $this->roles()->pluck('system_name')->toArray();

        return \in_array($role, $roles);
    }

    /**
     * Returns whether the person has ANY of the specified roles.
     *
     * @param array $roles An array of system role names to check
     *
     * @return boolean
     */
    public function hasAnyRole($roles)
    {
        foreach ($roles as $role) {
            if ($this->hasRole($role)) {
                return true;
            }
        }

        return false;
    }

    /**
     * Returns whether the person has the specified role name within the
     * specified department entities ID.
     *
     * @param string $role   The system name of the role
     * @param string $deptId The department entities ID to check
     *
     * @return boolean
     */
    public function hasRoleInDepartment($role, $deptId)
    {
        $depts = $this->departments()->get();

        // only retain elements that match BOTH the department and the
        // role name
        $depts = $depts->filter(function ($dept) use ($role, $deptId) {
            return $dept->department_id == $deptId
            && $dept->pivot->role_name == $role;
        });

        // if there are any departments left, then the role exists
        return !$depts->isEmpty();
    }

    /**
     * Returns whether this person is a faculty member in any department.
     *
     * @return boolean
     */
    public function isFaculty()
    {
        return $this->hasAnyRole(['faculty', 'chair', 'emeritus']);
    }

    /**
     * Returns whether this person is an admin in the system.
     *
     * @return bool
     */
    public function isAdmin()
    {
        return $this->hasRole('admin');
    }

    /**
     * Returns whether or not the person is a faculty member based on their
     * affiliation.
     *
     * @return bool
     */
    public function isFacultyBasedOnAffiliation()
    {
        return $this->affiliation == 'faculty';
    }

    /**
     * Returns whether or not the person is a staff member based on their
     * affiliation in nemo.individuals.affiliation. This is used to identify
     * staff members during the login because some don't have the role staff
     * when getting their roles.
     *
     * @return bool
     */
    public function isStaffBasedOnAffiliation()
    {
        return $this->affiliation == 'staff';
    }

    /**
     * Query Scope to find email address from URI.
     *
     * @param string $email string from email before \@ symbol (ie: john.smith.123)
     * @param mixed  $query
     *
     * @return Builder
     */
    public function scopeWhereEmailURI($query, $email)
    {
        return $query->where('email', 'LIKE', $email . '@%.edu');
    }

    /**
     * Returns the email URI for this Person without the domain suffix.
     *
     * @return string
     */
    public function getEmailURIAttribute()
    {
        $email = \strtok($this->email, '@');
        if (\substr($email, 0, 3) == 'nr_') {
            $email = \substr_replace($email, '', 0, 3);
        }

        return $email;
    }

    /**
     * This will return an email uri that is.
     *
     * @return string
     */
    public function getEscapedEmailURIAttribute()
    {
        return \str_replace('.', '-', $this->email_uri);
    }

    /**
     * Returns the role of the person on a project.
     *
     * @param mixed $project_id
     *
     * @return string
     */
    public function roleOnProject($project_id)
    {
        return $this->projects()->get()->where('project_id', $project_id)->first()->pivot->role_position;
    }

    public function memberships()
    {
        return $this->belongsToMany('Helix\Models\Project', 'nemo.memberships', 'individuals_id', 'parent_entities_id');
    }

    public function invitations()
    {
        return $this->hasMany('Helix\Models\Invitation', 'recipient_id', 'user_id');
    }

    /**
     * Determines if the user is in the given project.
     * This will be either 0 or 1 database call depending on whether or not the project was loaded with all its members.
     *
     * @param Project $project - The project to check.
     *
     * @return boolean
     */
    public function isMember(Project $project)
    {
        /**
         * Get a list of members as an associative array, keyed by user_id.
         * If the members were not already loaded, then load them from the database now.
         */
        $projectMembers = null;
        // Check if members are already loaded.
        if (isset($project->allMembers)) {
            // Use the already-loaded members.
            $projectMembers = $project->allMembers->keyBy('user_id');
        } else {
            // This will load members from the database.
            $projectMembers = $project->allMembers()->keyBy('user_id');
        }

        return $projectMembers->has($this->user_id);
    }

    public function hasRoleOnProject(array $roles, Project $project)
    {
        return $this->memberships()
              ->where('parent_entities_id', $project->project_id)
              ->whereIn('role_position', $roles)
              ->count();
    }

    // Grants all rights to auth user with specified members id
    public function isSpecificUser()
    {
        $specialUserIds = [
          'members:108443892', // Sherri Hixon
          'members:106627051', // Erika Reyes
          'members:000420312', // Nerces K
      ];

        return \in_array($this->user_id, $specialUserIds);
    }

    public function hasPendingInvitation(Project $project)
    {
        $invitation = $this->invitations()
                    ->where('project_id', $project->project_id)
                    ->whereNull('updated_at')
                    ->first();

        if (null !== $invitation) {
            return true;
        }

        return false;
    }

    public function scopeWithInterestsLike($query, $searchStr, $interestTypes = ['research_interests'])
    {
        if (!\is_array($interestTypes)) {
            $interestTypes = [$interestTypes];
        }

        $query = $query->with($interestTypes);
        foreach ($interestTypes as $type) {
            $query = $query->orWhereHas($type, function ($q) use ($searchStr) {
                $q->where('title', $searchStr);
            });
        }

        return $query;
    }

    /**
     * Queries people who have any of the given Research interests by ID.
     *
     * @param builder $query       - (implied) The scope query to build off of
     * @param array   $interestIds - An array of primary keys for the Research model.
     *
     * @return builder
     */
    public function scopeWithResearchInterestsIn($query, $interestIds)
    {
        // Get an array of primary keys.
        $query = $query->with('research_interests')
          ->whereHas('research_interests', function ($interestQuery) use ($interestIds) {
              return $interestQuery->whereIn('attribute_id', $interestIds);
          });

        return $query;
    }

    /**
     * Taken from Faculty Application, and we might need to change or update this
     * Section when the Faculty Application is pulled in.
     *
     * Scopes faculty members within a department. Yes, this kind of query is
     * awful when considering it from a maintainability aspect. However, this
     * query to get the relevant information executes several orders of magnitude
     * faster than the one using the "users" view. Compare the number of rows
     * checked with this query (~6200) versus the number of rows checked in the
     * "users" view to retrieve the same people (~224000). This query only has
     * to check roughly three percent of the rows that the DB view has to check
     * to receive the same data.
     *
     * @param Builder $query The existing query object
     * @param string  $name  Optional name of an individual to search for
     * @param string  $dept  Optional academic department entities_id to search for
     *
     * @return Builder
     */
    public function scopeFacultyWithDepartment($query, $name = '', $dept = null)
    {
        $query = $query->join('nemo.entities', 'user_id', '=', 'nemo.entities.entities_id')
            ->join('bedrock.registry', 'user_id', '=', 'bedrock.registry.entities_id')
            ->join('nemo.memberships', 'user_id', '=', 'nemo.memberships.individuals_id')
            ->select(
                'user_id',
                'last_name',
                'first_name',
                'last_name',
                'affiliation_status',
                'users.display_name',
                'users.confidential',
                'bedrock.registry.email'
            )
            ->whereNotNull('rank')
            ->where('deceased', 0)
            ->whereNotNull('bedrock.registry.email');

        if (!empty($dept)) {
            // we want individuals that are only present in a specific department
            $query = $query->where('nemo.memberships.parent_entities_id', $dept);
        } else {
            // doesn't matter what academic department the individuals are in as long
            // as they are in an academic department
            $query = $query->where('nemo.memberships.parent_entities_id', 'LIKE', 'academic_departments:%');
        }

        // if a by-name search query has not been specified then only display
        // active individuals
        if (empty($name)) {
            $query = $query->where('affiliation_status', 'Active');
        }

        // perform a different kind of search based on the kind of name that
        // was specified in the search field
        if (!empty($name)) {
            // check to see if name is an email
            $result = \filter_var($name, FILTER_VALIDATE_EMAIL);
            if ($result) {
                // email search
                $query = $query->where('bedrock.registry.email', $name);
            } else {
                // tokenize the query and chain in a single where clause delimited with wildcards
                $tokens = \explode(' ', $name);
                $where = '%';
                foreach ($tokens as $token) {
                    $where .= "{$token}%";
                }
                $query = $query->where(function ($q) use ($where) {
                    $q->where('users.display_name', 'LIKE', $where)
                        ->orWhere('users.common_name', 'LIKE', $where);
                });
            }
        }

        // retrieve only records with unique user IDs to prevent duplication;
        // some people have multiple roles in a department
        $query = $query->groupBy('individuals_id');

        return $query;
    }
}
