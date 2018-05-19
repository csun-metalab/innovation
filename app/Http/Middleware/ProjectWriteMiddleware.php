<?php

namespace Helix\Http\Middleware;

use Helix\Models\Project;
use Gate;
use Closure;

class ProjectWriteMiddleware
{
    public function handle($request, Closure $next)
    {
        if(!is_null($request->route('projectId')))
        {
            // can-edit-project is a session that will be set upon validating auth user can edit project
            // this will avoid having to query the database everytime this middleware is triggered
            if(!session('can-edit-project-' . $request->route('projectId')))
            {
                $project = Project::findOrFail($request->route('projectId'));

                // if auth user is not owner
                if(Gate::denies('is-owner', $project))
                {
                    abort(403);
                }

                // start a session to avoid querying database every time
                session()->put('can-edit-project-' . $request->route('projectId'), true);
            }
        }

        return $next($request);
    }
}
