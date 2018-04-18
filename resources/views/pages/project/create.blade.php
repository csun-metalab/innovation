@extends('layouts.master')
@section('content')
{{Form::open(['class' => 'project-create-form'])}}
    <div class="section" style="background-color: #252525;">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <h1 class="type--white type--thin type--marginless">Create a Project</h1>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <br>
      <div class="row">
          <div class="col-xl-7">
            <div class="form__group">
              {{Form::label('title','Project Title',['class'=>'label--required type--left type--thin'])}}
              {{Form::text('title','',['placeholder'=> "Enter a title..", 'id' => 'title'])}}
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
            {{Form::label('description','Description',['class'=>'label--required type--thin type--left'])}}
            {{Form::textArea('description','',['placeholder'=>'Enter a description...', 'id'=>'description'])}}
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-xs-6">
          <label for="youtube" class="type--thin type--left">Video
              <div class="tooltip"><i class="fa fa-question-circle" aria-hidden="true"></i>
                  <span class="tooltiptext">
                      YouTube and Vimeo are the currently supported video-sharing web sites<br>
                  </span>
              </div>
          </label>
          {!! Form::text('video', '', ['class'=>'form-control', 'placeholder' => 'http://', 'id' => 'youtube']) !!}
          <small hidden="true" style="color:#ff0011" id="youtubemsg">* Video URL must be from YouTube or Vimeo</small>
        </div>
        <div class="col-xs-6">
          <div class="form__group">
            {{Form::label('url','Website',['class'=>'type--thin type--left'])}}
            {{Form::text('url','',['placeholder'=>'https://','id'=>'website'])}}
          </div>
        </div>
      </div>
      <br>
      <hr>
        <div class="row">
          <div class="col-lg-6 col-md-5">
              <div class="form__group">
                {{Form::label('collaborators','Team Members',['class'=>'label--required type--left type--thin'])}}
                {{Form::select('collaborators',[],null,['id'=>'collab','class'=>'select2-collaborator','placeholder'=>'Add a new member...'])}}
              </div>
          </div>
          <div class="col-xs-8 col-md-5">
            <div class="form__group">
              {{Form::label('role','Role',['class'=>'label--required type--left type--thin'])}}
              {{ Form::select ('roles', ['roles'], null,['class'=>'roles select2-roles', 'id'=>'roleID'] ) }}
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
              <table id = "list" class="table table--padded table--bordered table--striped">
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
                          <a class="collaboratorActionBtn" data-url="{{ url('project/' . request()->route('projectId') . '/invitation/' . $invitation->id . '/accept') }}">Approve</a>
                          @else
                          <a class="collaboratorActionBtn" data-url="{{ url('project/' . request()->route('projectId') . '/invitation/' . $invitation->id . '/cancel') }}">Cancel Invite</a>
                          @endif
                        </td>
                      </tr>
                    @endforeach
                  @endif
                 </tbody>
               </table>
                {{-- <div id="research-collabs">
                  <collaborators project_status="create"></collaborators>
                </div> --}}
            </div>
        </div>
{{--      <hr>
          <div class="row">
            <div class="col-sm-12">
              <div class="uploader type--center" id="upload-image">
                <form class="type--center">
                  <span id="upload">
                  <h1 class="fa fa-upload mega"></h1>
                  <br>
                  <strong >Upload a cover photo</strong>
                  </span>
                  <!-- <img src="" id="hide"/> -->
                  <br>
                  <input id="photoLoad" type="file" accept="image/*" onload="fileName()">
                  <div id="filePreview"></div>
                </form>
              </div>
            </div>
          </div>
          <hr> --}}
        <div class="row">
          <div class="col-xs-12">
            <div class="form__group">
              {{Form::label('tags','Tags',['class'=>'type--left type--thin'])}}
              {!!Form::select('tags[]', ['',''], null, ['class' => 'select2-tags tags', 'multiple' => 'multiple'])!!}
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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    {!! Html::script('js/scripts.js') !!} 
    {!! Html::script('js/collaborators.js') !!} 
    <script type="text/javascript">
        $(".select2-tags").select2({
          allowClear: true,
          language: {
             noResults: function(){
                 return 'No results found. Create your own by typing the Project Theme and then pressing Enter...';
             }
          },
          placeholder: 'Enter a new tag...',
          tags: true,
        });
        $('.form-btn').on('click', function(e){
          $('input[name=action]').val($(this).attr('data-action'));
          return $('.project-create-form').submit();
        })
    </script>
    <script type="text/javascript">
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
  <script>
      //changes default upload button to the Upload text
      $(function () {
          $("#upload").on('click', function (e) {
              e.preventDefault();
              $("#photoLoad:hidden").trigger('click');
          });
      });

      //preview cover photo filename
      var input = document.getElementById('photoLoad');
      var infoArea = document.getElementById('filePreview');

      input.addEventListener('change', showFileName);

      function showFileName(event) {
          var input = event.srcElement;
          var fileName = input.files[0].name;
          infoArea.textContent = 'Uploaded ' + fileName + '!';
      }
  </script>
  <script>
    var collaborators = $(".select2-collaborator");
    var template, input;
    template = input = "";

    if(collaborators.length > 1)
    {
      collaborators.forEach(function(collaborator){
        var member = collaborator.split(','),
        displayName = member[1] == "{{ Auth::user()->user_id }}" ? member[0] + ' <span style="opacity: .5;">&#183 You</span>' : member[0];
        // 0 = name, 1 = membersId, 2 = role_position
        template += "<tr data-id='"+ member[0] + '|' + member[1] + '|' + member[2] +"'><td>" + displayName + "</td><td>" + member[2] + "</td><td>Active</td><td style='text-align: center'> <a class='removeCollabBtn btn btn-link'>Remove</a></td></tr>";

        input += "<input type='hidden' name='collaborators[]' value='"+ member[0] + '|' + member[1] + '|' + member[2] +"'>";
      });
    }
    else
    {
      template += '<tr data-id="{{ Auth::user()->display_name }}|{{ Auth::user()->user_id }}|Team Member"><td>{{ Auth::user()->display_name }} &#183 <span style="opacity: .5;">You</span></td><td>Team Member</td><td>Active</td><td style="text-align: center"> <a class="removeCollabBtn btn btn-link">Remove</a></td></tr>';
      input += "<input type='hidden' name='collaborators[]' value='{{ Auth::user()->display_name }}|{{ Auth::user()->user_id }}|Team Member'>";
    }
    $('#list tbody').append(template);
    $('.project-create-form').append(input);

    $('.form-btn').on('click', function(e){
      $('input[name=action]').val($(this).attr('data-action'));
      return $('.project-create-form').submit();
    });
    function spinMe(this1)
    {
      this1.disabled = true;
      this1.innerHTML = '<i class="fa fa-spinner fa-spin"></i> Submitting';
    }
    //Student qualificaitons box logic
    $('#seekingStudents').change(function(){
        $('#studentQualifications').toggle();
    });
  </script>
@stop