@extends('layouts.master')
@section('content')
    {{Form::open(array('url' => 'project/create', 'method' => 'post', 'class' => 'project-create-form'))}}
    <div class="section" style="background-color: #252525;">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="type--white type--thin type--marginless">{{$projectStatus?"Edit":"Create a"}}
                        Project</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <br>
        @include('layouts.partials.display-errors')
        <div class="row">
            <div class="col-xl-7">
                <div class="form__group">
                    {{Form::label('title','Project Title',['class'=>'label--required type--left '.($errors->first('title')?'label--error':'')] )}}
                    {{Form::text('title',$project->project_title?: '' , ['placeholder'=> "Enter a title..", 'id' => 'title', 'class' => $errors->first('title')?'form--error':''] )}}
                </div>
            </div>
            <div class="col-xl-5">
                <div class="form__group">
                    @if(isset($events) && count($events))
                        @if(env('APP_NAME')=='SeniorDesign')
                            {{Form::label('event_id','Term',['class'=>'label--required type--left type--thin'])}}
                        @else
                            {{Form::label('event_id','Event',['class'=>'label--required type--left type--thin'])}}
                        @endif
                        {{Form::select('event_id',$events)}}
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="form__group">
                    {{Form::label('description','Description',['class'=>'label--required type--left '.($errors->first('description')?'label--error':'')] )}}
                    {{Form::textArea('description',$project->abstract?: '',['placeholder'=>'Enter a description...', 'id'=>'description','class' => $errors->first('description')?'form--error':''])}}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-6">
                <label for="youtube" class="type--left"><span
                            class={{$errors->first('video')?'label--error':''}}>Video</span>
                    <div class="tooltip"><i class="fa fa-question-circle" aria-hidden="true"></i>
                        <span class="tooltiptext">
                      YouTube and Vimeo are the currently supported video-sharing web sites<br>
                  </span>
                    </div>
                </label>
                {!! Form::text('video', $project->video?$project->video->link:'', ['placeholder' => 'http://', 'id' => 'youtube','class'=>'form-control '. ($errors->first('video')?'form--error':'')]) !!}
                <small hidden="true" style="color:#ff0011" id="youtubemsg">* Video URL must be from YouTube or Vimeo
                </small>
            </div>
            <div class="col-xs-6">
                <div class="form__group">
                    {{Form::label('url','Website',['class'=>'type--left '.($errors->first('url')?'label--error':'')] )}}
                    {{Form::text('url',$project->url?$project->url->link:'',['placeholder'=>'https://','id'=>'website','class' => $errors->first('url')?'form--error':''])}}
                </div>
            </div>
        </div>
        <br>
        <hr>
        <div class="row">
            <div class="col-lg-6 col-md-5">
                <div class="form__group">
                    {{Form::label('collaborators','Team Members',['class'=>'type--left'])}}
                    {{Form::select('collaborators',[],null,['id'=>'collab','class'=>'select2-collaborator','placeholder'=>'Add a new member...'])}}
                </div>
            </div>
            <div class="col-xs-8 col-md-5">
                <div class="form__group">
                    {{Form::label('role','Title',['class'=>'type--left'])}}
                    {{ Form::select ('roles', $titles, null,['class'=>'roles select2-roles', 'id'=>'roleID'] ) }}
                    <div class="tooltip" style="float:right"><i class="fa fa-question-circle" aria-hidden="true"></i>
                        <span class="tooltiptext">You may use name, email or student ID to select team member.<br>
                    </span>
                    </div>
                </div>
            </div>
            <div class="col-xs-4 col-md-1 margin-top--25 type--center">
                <a href="#" title="Add Collaborator" class="btn btn-primary type--center btn-sm" id="addCollabBtn">
                    <i class="fa fa-plus" aria-hidden="true"></i> Add
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <table id="list" class="table table--padded table--bordered table--striped">
                    <thead>
                    <tr>
                        <th><strong>Team Member</strong></th>
                        <th><strong>Role</strong></th>
                        <th><strong>Status</strong></th>
                        <th><strong>Action</strong></th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(isset($invitations) && count($invitations))
                        @foreach($invitations as $invitation)
                            <tr data-id="{{ $invitation->invitee->display_name }},{{ $invitation->recipient_id }},{{ $invitation->role_position }}">
                                <td>{{ $invitation->invitee->display_name }}</td>
                                <td>{{ $invitation->role_position }}</td>
                                <td>Pending</td>
                                 <td class="text--center">
                                    @if(is_null($invitation->from_id))
                                        <a class="collaboratorActionBtn"
                                           data-url="{{ url('project/' . $project->project_id . '/invitation/' . $invitation->id . '/accept') }}">Approve</a>
                                    @else
                                        <a class="collaboratorActionBtn"
                                           data-url="{{ url('project/' . $project->project_id . '/invitation/' . $invitation->id . '/cancel') }}">Cancel
                                            Invite</a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
                {{--<div id="research-collabs">
                  <collaborators project_status="create"></collaborators>
                </div>--}}
            </div>
        </div>

         <div class="row">
            <div class="col-xs-8 col-md-11">
                <div class="form__group">

                    {{Form::label('seeking','Seeking Roles',['class'=>'type--left'])}}
                    {{--<input id="seeking" value="Some text..">--}}
                    {{ Form::text ('seeking','', array('id'=>'seeking')) }}
                    <div class="tooltip" style="display: inline-block"><i class="fa fa-question-circle"
                                                                          aria-hidden="true"></i>
                        <span class="tooltiptext">Looking for a specific role? Select the role you need or create your own.<br>
                    </span>
                    </div>
                </div>
            </div>
            <div class="col-xs-4 col-md-1 margin-top--25 type--center">
                <a href="#" title="Add Seeking Role" class="btn btn-primary type--center btn-sm" id="addSeekingBtn">
                    <i class="fa fa-plus" aria-hidden="true"></i> Add
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <table id="seek_list" class="table table--padded table--bordered table--striped">
                    <thead>
                    <tr>
                        <th><strong>Open Role</strong></th>
                        <th><strong>Action</strong></th>
                    </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
        <hr>

        <div class="row">
            <div class="col-xs-12">
                <div class="form__group">
                    {{Form::label('tags','Tags',['class'=>'type--left'])}}
                    {!!Form::select('tags[]', isset($tags)?$tags:[], isset($tagIds)?$tagIds:[], ['class' => 'select2-tags tags', 'multiple' => 'multiple'])!!}
                </div>
            </div>
        </div>
        <div class="type--center">
            {!!Form::submit('Submit',['class'=>'btn btn-primary'])!!}
        </div>
    </div>
    {!!Form::close()!!}

@stop
@section('scripts')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {!! Html::script('js/metaphor.js') !!}
    {!! Html::script('js/jquery.min.js') !!}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    {!! Html::script('js/scripts.js') !!}
    {!! Html::script('js/collaborators.js') !!}
    <script type="text/javascript">
        $(".select2-tags").select2({
            allowClear: true,
            language: {
                noResults: function () {
                    return 'No results found. Create your own by typing the Project Theme and then pressing Enter...';
                }
            },
            placeholder: 'Enter a new tag...',
            tags: true,
        });
        $('.form-btn').on('click', function (e) {
            $('input[name=action]').val($(this).attr('data-action'));
            return $('.project-create-form').submit();
        })
        $('.select2-tags option').each(function (index) {
            if(this.value.search('watson-stored:') > -1){
                $(this).addClass('watson');
            }
        });
    </script>
    <script type="text/javascript">
        $("#youtube").focusout(function () {
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
                    success: function (data) {
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
    <script>
        // //changes default upload button to the Upload text
        // $(function () {
        //     $("#upload").on('click', function (e) {
        //         e.preventDefault();
        //         $("#photoLoad:hidden").trigger('click');
        //     });
        // });
        //
        // //preview cover photo filename
        // var input = document.getElementById('photoLoad');
        // var infoArea = document.getElementById('filePreview');
        //
        // input.addEventListener('change', showFileName);
        //
        // function showFileName(event) {
        //     var input = event.srcElement;
        //     var fileName = input.files[0].name;
        //     infoArea.textContent = 'Uploaded ' + fileName + '!';
        // }
    </script>

    <script>

        document.getElementById("seeking").onkeypress = function(e) {
            var key = e.charCode || e.keyCode || 0;
            if (key == 13) {
                document.getElementById("addSeekingBtn").click();
                $('#seeking').val("");
                e.preventDefault();
            }
        }
    </script>

    <script>var collaborators = {!! json_encode($project->members)!!};</script>
    <script>var seeking = {!! json_encode($project->seeking)!!};</script>
    <script>
        //Team Members js
        var template, input;
        template = input = "";


            template += '<tr data-id="{{ Auth::user()->display_name }}|{{ Auth::user()->user_id }}|Team Member"><td>{{ Auth::user()->display_name }} &#183 <span style="opacity: .5;">You</span></td><td>Team Member</td><td>Active</td><td style="text-align: center"> <a class="removeCollabBtn btn btn-link">Remove</a></td></tr>';
            input += "<input type='hidden' name='collaborators[]' value='{{ Auth::user()->display_name }}|{{ Auth::user()->user_id }}|Team Member'>";

        $('#list tbody').append(template);
        $('.project-create-form').append(input);

        $('.form-btn').on('click', function (e) {
            $('input[name=action]').val($(this).attr('data-action'));
            return $('.project-create-form').submit();
        });



        function spinMe(this1) {
            this1.disabled = true;
            this1.innerHTML = '<i class="fa fa-spinner fa-spin"></i> Submitting';
        }

        //Student qualificaitons box logic
        $('#seekingStudents').change(function () {
            $('#studentQualifications').toggle();
        });
    </script>
@stop