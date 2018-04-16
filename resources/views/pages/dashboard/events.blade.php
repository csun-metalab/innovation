@extends('layouts.master')

@section('content')
<div class="section">
  <div class="container">

    <div class="row">

      <div class="col-sm-12">
      <a class="btn btn-default" style="float:right;" href="{{ url('project/step-1') }}">Add a New Project</a>
        <h1 class="type--header type--thin">Innovation Dashboard</h1>
      </div>
    </div>

    <div class="row">

      <div class="col-lg-3">
        @include("layouts.partials.admin-sidebar")
      </div>

      <div class="col-lg-9">
          {!! Form::open(array('url' => route('dashboard.event.create'))) !!}
          {!! Form::hidden('originator', Auth::user()->display_name) !!}
          {!! Form::label('event_name', 'Title', ['class'=>'label--default']) !!}
          {!! Form::text('event_name') !!}
          {!! Form::label('start_date', 'Start Date', ['class'=>'label--default']) !!}
          {!! Form::text('start_date', '', ['class'=>'form-control datepicker', 'placeholder'=>'mm/dd/yyyy', 'type' => 'date', 'maxlength' => '10']) !!}
          {!! Form::label('end_date', 'End Date', ['class'=>'label--default']) !!}
          {!! Form::text('end_date', '', ['class'=>'form-control datepicker', 'placeholder'=>'mm/dd/yyyy', 'type' => 'date', 'maxlength' => '10']) !!}
          {!! Form::submit('Create', ['title' => 'Create','class' => 'btn btn-primary', 'style' => 'width: 132px']) !!}
          {!! Form::close() !!}
			@forelse($events as $event)
			<div style="border: 1px solid #d4d4d4; padding: 15px;">
				<p>
                    {{ monthFormat($event->start_date) }} to {{ monthFormat($event->end_date) }}
                </p>
          <strong>{{ $event->event_name }}</strong>
        <br>
				<p></p>
				<ul>
                    Created By {{$event->originator}}
				</ul>
			</div>
		@empty
			<div style="margin: 15px 0; text-align: center;">
				<h1>No Events.</h1>
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
