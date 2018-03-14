<?php namespace Helix\Http\ViewComposers;

use Illuminate\View\View;

class ProjectTypeComposer
{
	public function compose(View $view)
	{
		$projectTypes = [
       // 'open'          => 'Public Showcase',
       'showcase'      => 'Showcase',
       'institutional' => 'Institutional',
       'stealth'       => 'Stealth'
    ];

		return $view->with('projectTypes', $projectTypes);
	}
}