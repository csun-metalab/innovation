@extends('layouts.master')

@section('content')
    <div class="section">
        <div class="container">

            <div class="row">

                <div class="col-sm-12">
                    <a class="btn btn-default" style="float:right;" href="{{ url('project/create') }}">Add a New
                        Project</a>
                    <h1 class="type--header type--thin">Innovation Dashboard</h1>
                </div>
            </div>
            <div class="row">

                <div class="col-lg-3">
                    @include("layouts.partials.admin-sidebar")
                </div>
                <div class="col-lg-9">
                    <h3>Add a New Event</h3>
                    {!! Form::open(array('url' => route('dashboard.event.create'))) !!}
                    {!! Form::hidden('originator', Auth::user()->display_name) !!}
                    {!! Form::label('event_name', 'Event Name', ['class'=>'label--default label--required']) !!}
                    {!! Form::text('event_name','', ['placeholder'=>'Enter an event name', 'maxlength' => '50']) !!}
                    <br>
                    {!! Form::label('start_date', 'Start Date', ['class'=>'label--default']) !!}
                    {!! Form::text('start_date', '', ['class'=>'form-control datepicker', 'placeholder'=>'mm/dd/yyyy', 'type' => 'date', 'maxlength' => '10']) !!}
                    <br>
                    {!! Form::label('end_date', 'End Date', ['class'=>'label--default']) !!}
                    {!! Form::text('end_date', '', ['class'=>'form-control datepicker', 'placeholder'=>'mm/dd/yyyy', 'type' => 'date', 'maxlength' => '10']) !!}
                    <br>
                    <div class="type--right">
                        {!! Form::submit('Create', ['title' => 'Create','class' => 'btn btn-primary']) !!}
                        {!! Form::close() !!}
                    </div>
                    <br>
                    <h3>Created Events</h3>
                    @forelse($events as $event)
                        <div class="row">
                        <div class="col-xs-1"></div>
                            <div class="panel">
                                <div class="panel__header" style="background-color: whitesmoke">
                                    <h5>{{ $event->event_name }}</h5>{{ datePickerFormat($event->start_date) }} to {{ datePickerFormat($event->end_date) }}
                                </div>
                                <div class="panel__content">Created By {{$event->originator}}</div>
                                <div class="type--right" style="padding-right: 10px; padding-bottom: 10px">
                                    <button role="button" class="btn btn-primary">Delete</button>
                                </div>
                            </div>
                        <div class="col-xs-1"></div>
                        </div>
                        <br>
                    @empty
                        <div style="margin: 15px 0; text-align: center;">
                            <h4>No Events.</h4>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
    {!! Html::script('js/metaphor.js') !!}
    <script>
        $('.delete-modal-btn').on('click', function () {
            $('#deleteModal form').attr({
                action: $('html').data('url') + '/project/' + $(this).data('id') + '/delete',
                method: 'GET'
            });
            $('#deleteModal .modal__content h3').text($(this).data('title'));
        })
    </script>
@stop
