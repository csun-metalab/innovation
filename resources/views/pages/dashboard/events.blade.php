
@extends('layouts.master')

@section('content')
    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
    <div class="section">
        <div class="container">
            @if(Auth::user()->isAdmin())
                <div class="row">
                    <div class="col-sm-12">
                        <a class="btn btn-default" style="float:right;" href="{{ url('project/create') }}">Add a New
                            Project</a>
                        @if(env('APP_NAME')=='SeniorDesign')
                            <h1 class="type--header type--thin">Senior Design Dashboard</h1>
                        @else
                            <h1 class="type--header type--thin">Innovation Dashboard</h1>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                        @include("layouts.partials.admin-sidebar")
                    </div>
                    <div class="col-lg-9">
                        <h3>Add a New Event</h3>
                        {!! Form::open(array('url' => route('dashboard.event.create'))) !!}
                        {!! Form::label('event_name', 'Event Name', ['class'=>'label--default label--required']) !!}
                        {!! Form::text('event_name','', ['placeholder'=>'Enter an event name', 'maxlength' => '50']) !!}
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                {!! Form::label('start_date', 'Start Date', ['class'=>'label--default']) !!}
                                {!! Form::text('start_date', '', ['class'=>'form-control datepicker', 'placeholder'=>'mm/dd/yyyy', 'type' => 'date', 'maxlength' => '10']) !!}
                            </div>
                            <div class="col-md-6">
                                {!! Form::label('end_date', 'End Date', ['class'=>'label--default']) !!}
                                {!! Form::text('end_date', '', ['class'=>'form-control datepicker', 'placeholder'=>'mm/dd/yyyy', 'type' => 'date', 'maxlength' => '10']) !!}
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-xs-12">
                                {!! Form::label('description', 'Event Description', ['class'=>'label--default']) !!}
                                {!! Form::textarea('description', '', ['class'=>'form-control']) !!}
                            </div>
                        </div>
                        <br>
                        <div class="type--right">
                            {!! Form::submit('Create', ['title' => 'Create','class' => 'btn btn-primary']) !!}
                            {!! Form::close() !!}
                        </div>
                        <br>
                        <h3>Created Events</h3>
                        <div class="bg--white" style="padding: 25px; border-radius: 3px;">
                            <div class="row">
                                <div class="col-xs-1"></div>
                                <div class="table--responsive">
                                    <table class="table">
                                        <thead>
                                        <tr class="table"
                                            style="text-transform: uppercase; border-bottom: darkgrey 1px solid;">
                                            <th>Event</th>
                                            <th style="text-align: center;">Start Date</th>
                                            <th style="text-align: center;">End Date</th>
                                            <th style="text-align: center;">Creator</th>
                                            <th style="text-align: center;"></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($events as $event)
                                            <tr style="border-bottom: lightgray 1px solid" id="{{ $event->id }}" >
                                                <td>
                                                    <div style="padding: 10px;">
                                                        {{ $event->event_name }}
                                                    </div>
                                                </td>
                                                <td style="text-align: center;padding: 10px;">{{ monthFormat($event->start_date) }}</td>
                                                <td style="text-align: center;padding: 10px;">{{ monthFormat($event->end_date) }}</td>
                                                @if($event->originator == 'system')
                                                    <td style="text-align: center;padding: 10px;">System</td>
                                                @else
                                                    <td style="text-align: center;padding: 10px;">{{$event->creator->display_name}}</td>
                                                @endif
                                                <td style="text-align: center;padding: 10px; width: 5%;">
                                                    <button id="{{ $event->id }}" role="button" class="modal-toggle btn btn-default">
                                                        <i class="fa fa-times"></i></button>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div id="deleteEvent" class="modal__outer">
                                    <div class="modal">
                                        <div class="modal__header"><strong>Delete Event</strong></div>
                                        <div class="modal__content">Are you sure you want to delete this event?</div>
                                        <div class="modal__footer">
                                            <div class="pull-right">
                                                <button class="btn btn-default" data-modal-close="#deleteEvent">Cancel
                                                </button>
                                                <button class="btn btn-primary" id="confirmEventDelete" >Delete</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-1"></div>
                            </div>
                        </div>
                        <br>
                        @forelse($events as $event)
                        @empty
                            <div style="margin: 15px 0; text-align: center;">
                                <h4>No Events.</h4>
                            </div>
                        @endforelse
                    </div>
                </div>
            @endif
            @if(!Auth::user()->isAdmin())
                <h3 style="text-align: center">You need to be an admin to view this page</h3>
            @endif
        </div>
    </div>
    {!! Html::script('js/metaphor.js') !!}
    <script>
        $('.modal-toggle').click(function () {
            $('#confirmEventDelete').data('event-id', this.id);
            $('#deleteEvent').toggleClass('modal--show');
        });
        $('#confirmEventDelete').on('click', function () {
            eventId = $(this).data('event-id');
            $.ajax({
                url: $('html').data('url') + '/admin/dashboard/delete-event',
                type: "POST",
                data: JSON.stringify(
                    {
                    id: eventId
                    }
                ),
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                contentType: "application/json; charset=utf-8",
                dataType   : "json",
                success    : function(data){
                    console.log(data);
                    if (data.success=="true"){
                        $('#'+eventId).remove();
                    }
                    $('#deleteEvent').toggleClass('modal--show');
                }
            });

        })
    </script>
@stop

