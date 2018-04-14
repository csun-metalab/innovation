@extends('layouts.master')

@section('content')
<div class="section">
  <div class="container">

    <div class="row">

      <div class="col-sm-12">
      <a class="btn btn-default" style="float:right;" href="{{ url('project/create') }}">Add a New Project</a>
        <h1 class="type--header type--thin">Innovation Dashboard</h1>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-3">
        @include("layouts.partials.admin-sidebar")
      </div>
      <div class="col-lg-9">
			@forelse($invitations as $invitation)
			<div style="border: 1px solid #d4d4d4; padding: 15px;">
				<p>{{ monthFormat($invitation->created_at) }} -
				@if(is_null($invitation->from_id))
				<b>{{ $invitation->invitee->display_name }}</b> is requesting to join your project as <b>{{ $invitation->role_position }}</b>
				@else
				<b>{{ $invitation->inviter->display_name }}</b> wants you to join their project as <b>{{ $invitation->role_position }}</b>:
				@endif
				</p>
				<a title="{{ $invitation->project->project_title }}"
           href="{{url('project/'.$invitation->project->slug)}}">
          <strong>{{ $invitation->project->project_title }}</strong>
        </a><br>
				<p>{{ str_limit($invitation->project->abstract, 150, '...') }}</p>
				<ul class="list--inline list--unstyled">
					<li>
						<a title="Accept" href="{{ url('project/' . $invitation->project->project_id . '/invitation/' . $invitation->id . '/accept') }}" class="btn btn-primary">Accept</a>
					</li>
					<li>
						<a title="Reject" href="{{ url('project/' . $invitation->project->project_id . '/invitation/' . $invitation->id . '/reject') }}" class="btn btn-default">Reject</a>
					</li>
				</ul>
			</div>
		@empty
			<div style="margin: 15px 0; text-align: center;">
				<h1>No pending invitations.</h1>
			</div>
		@endforelse
      </div>
    </div>
  </div>
</div>
    {!! Html::script('js/metaphor.js') !!}
    <script>
      $('.delete-modal-btn').on('click', function(){
        $('#deleteModal form').attr({
          action: $('html').data('url') + '/project/' + $(this).data('id') + '/delete',
          method: 'GET'
        });
        $('#deleteModal .modal__content h3').text($(this).data('title'));
      })
    </script>
@stop
