@if($response == 'accept')
	@if($to == 'recipient')
		You've been accepted to be part of the project!
		{{ $project->project_title }}
	@elseif($to == 'project-authorities')
		{{ $member->first_name }} {{ $member->last_name }} has accepted to be part of your project: {{ $project->project_title }}
	@endif
@elseif($response == 'reject')
	@if($to == 'recipient')
		You've been rejected to be part of the project:
		{{ $project->project_title }}
	@elseif($to == 'project-authorities')
		{{ $member->first_name }} {{ $member->last_name }} has rejected to be part of your project: {{ $project->project_title }}
	@endif
@endif