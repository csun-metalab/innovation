@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <br><br>
                {{-- Checks to see if the project variable exists --}}
                @if (isset($project))
                    {{-- Checks to make sure the user can edit projects --}}
                    @can('is-owner', $project)
                        {{-- Lastly, make sure the project isn't a new one --}}
                        @if(!session('new-project')['project_general']['cayuse_project'] && $projectId)
                            <div class="row">
                                <div class="col-xs-6 col-sm-3 col-sm-offset-9">
                                    <a class="btn btn-primary btn-sm delete-modal-btn" data-modal="#deleteModal"
                                       data-title="{{ session('new-project')['project_general']['title'] }}" data-id="{{ $project->project_id }}">
                                        <i class="fa fa-trash-o" aria-hidden="true"></i> Delete This Project</a>
                                </div>
                            </div>
                            @include('pages.project.partials.delete-modal')
                        @endif
                    @endcan
                @endif
                <br />
                <h2 class="type--center type--thin">Create A Project</h2>
                <br />
                <div class="timeline type--center">
                    <ul class="progressbar">
                        <li title="Create A Project" class="active  hover"> Create A project</li>
                        <li title="Project Research Theme" class="form-btn" data-action="next">Project Theme</li>
                        <li title="Add Collaborators" class="form-btn">Add Collaborators</li>
                        <li title="Finish" class="form-btn form-btn-check">Finish</li>
                    </ul>
                </div>
                <br><br>
                @include('layouts.partials.display-errors')
            </div>
        </div>
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
                {!! Form::open() !!}
                <div class="row">
                    <div class="col-sm-6">
                        @if(session('new-project')['project_general']['cayuse_project'] && !auth()->user()->hasRole('admin'))
                            <label for="project_type">Title
                                <div class="tooltip"><i class="fa fa-question-circle" aria-hidden="true"></i>
                                    <span class="tooltiptext">This project was imported from Research and Graduate Studies, therefore you are not able to change the project title, start date, and end date.</span>
                                </div>
                            </label>
                            <p>{{ session('new-project')['project_general']['title'] }}</p>
                        @else
                            <div class="form__group">
                                {!! Form::label('title', 'Project Title', ['class'=>'label--required']) !!}
                                {!! Form::text('title', session('new-project')['project_general']['title'] ?: '', ['class'=>'form-control','placeholder'=>'Project title...']) !!}
                            </div>
                        @endif
                    </div>
                    <div class="col-sm-3">
                        <div class="form__group">
                            @if(session('new-project')['project_general']['cayuse_project'] && !auth()->user()->hasRole('admin'))
                                {!! Form::label('start_date', 'Start Date') !!}
                                <p>{{ session('new-project')['project_general']['start_date'] }}</p>
                                {!! Form::hidden('start_date', session('new-project')['project_general']['start_date']) !!}
                            @else
                                {!! Form::label('start_date', 'Start Date', ['class'=>'label--required']) !!}
                                {!! Form::text('start_date', session('new-project')['project_general']['start_date'] ?: '', ['class'=>'form-control col-sm-3 datepicker', 'placeholder'=>'mm/dd/yyyy','type' => 'date','maxlength' => '10']) !!}
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form__group">
                            {!! Form::label('end_date', 'End Date', ['class'=>'label--default']) !!}
                            @if(session('new-project')['project_general']['cayuse_project'] && !auth()->user()->hasRole('admin'))
                                <p>{{ session('new-project')['project_general']['end_date'] }}</p>
                                {!! Form::hidden('end_date', session('new-project')['project_general']['end_date']) !!}
                            @else
                                {!! Form::text('end_date', session('new-project')['project_general']['end_date'] ?: '', ['class'=>'form-control datepicker', 'placeholder'=>'mm/dd/yyyy', 'type' => 'date', 'maxlength' => '10']) !!}
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form__group">
                            @if(session('new-project')['project_general']['cayuse_project'] && !auth()->user()->hasRole('admin'))
                                {!! Form::label('project_type', 'Visibility') !!}
                                {!! Form::hidden('project_type', session('new-project')['project_general']['project_type']) !!}
                                <p>{{ ucfirst(session('new-project')['project_general']['project_type']) }}</p>
                            @else
                                <label class="label--required" for="project_type">Visibility
                                    <div class="tooltip"><i class="fa fa-question-circle" aria-hidden="true"></i>
                                        <span class="tooltiptext">
                                            Showcase: Project will be visible to users who have logged in. Users must be invited to join the project.<br><br>
                                            Institutional: Project will be visible to users who have logged in. Users can request to join the project.<br><br>
                                            Stealth: Project will be visible only to collaborators. Users must be invited to join the project.<br>
                                        </span>
                                    </div>
                                </label>
                                {{-- VIEW COMPOSER IS SETTING $projectTypes variable in App\Http\ViewComposers\ProjectTypeComposer --}}
                                {!! Form::select('project_type', $projectTypes, session('new-project')['project_general']['project_type'] ? : '', ['id' => 'project_type']) !!}
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form__group">
                            {!! Form::label('url', 'Website') !!}
                            {!! Form::text('url', session('new-project')['project_general']['url'] ?: '', ['class'=>'form-control url-field', 'placeholder' => 'http://']) !!}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form__group">
                            <label class="label--required" for="project_purpose">
                                Type
                            </label>
                            {!! Form::select('project_purpose', $projectPurposes, session('new-project')['project_general']['project_purpose']?: Helix\Models\Purpose::defaultPurpose(), ['id' => 'project_type']) !!}
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form__group">
                            <label for="youtube">Video
                                <div class="tooltip"><i class="fa fa-question-circle" aria-hidden="true"></i>
                                    <span class="tooltiptext">
                                        YouTube and Vimeo are the currently supported video-sharing web sites<br>
                                    </span>
                                </div>
                            </label>
                            {!! Form::text('youtube', session('new-project')['project_general']['youtube'] ?: '', ['class'=>'form-control', 'placeholder' => 'http://', 'id' => 'youtube']) !!}
                            <small hidden="true" style="color:#ff0011" id="youtubemsg">* Video URL must be from YouTube or Vimeo</small>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form__group">
                            {!! Form::label('description', 'Description', ['class'=>'label--required']) !!}
                            {!! Form::textarea('description', session('new-project')['project_general']['description'] ?: '', ['rows'=>'4','cols'=>'','class'=>'form-control', 'placeholder'=>'Add Project Description...']) !!}
                        </div>
                    </div>
                </div>
                <br>
                <div class="type--center">
                      <a href="{{ url("project/$projectId") }}" class="btn btn-default">Cancel</a>
                      {!! Form::submit('Next Step', ['title' => 'Next Step','class' => 'btn btn-primary', 'style' => 'width: 132px']) !!}
                </div>
                <br><br><br>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop
@section('scripts')
    {{-- for ajax request csrf token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {!! Html::script('js/metaphor.js') !!}
    {!! Html::script('js/jquery.min.js') !!}



    {{-- javascript for validation of youtube link --}}
    <script type="text/javascript">
        // on focus out
        $("#youtube").focusout(function() {
            // find variables
            var yturl = $(this).val();
            var element = $(this);
            var message = $("#youtubemsg");

            if (yturl.length == 0) { // input is empty: don't show message
                element.css('border-color', '#ccc');
                message.attr("hidden", "true");
            }
            else { // there is input: ajax to validate
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                  method: "POST",
                  url: '{{ route('validateYoutube') }}',
                  data: {url: yturl},
                  success: function(data) {
                    if (data == "true") {
                        element.css('border-color', '#ccc');
                        message.attr("hidden", "true");
                    } else {
                        element.css('border-color', '#ff0011');
                        message.removeAttr("hidden");
                    }
                },
            });
        }
      });
    </script>

    {{-- Checks to see if the project variable exists --}}
    @if (isset($project))
      {{-- This will provide the url for the delete modal, similar to the project show page --}}
      @can('is-owner', $project)
        <script type="text/javascript">
            $(document).ready(function() {
                $('.delete-modal-btn').on('click', function () {
                    $('#deleteModal form').attr({
                        action: $('html').data('url') + '/project/' + $(this).data('id') + '/delete',
                        method: 'GET'
                    });
                    $('#deleteModal .modal__content h3').text($(this).data('title'));
                });
            });
        </script>
      @endcan
    @endif
@stop
