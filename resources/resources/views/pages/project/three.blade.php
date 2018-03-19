@extends('layouts.master')

@section('styles')
  <style>
    .select2-container {
      width: 100%;
    }
  </style>
@endsection

@section('content')
  {{-- Placing this hidden input to be able to grab auth user id in scripts js --}}
  <input type="hidden" value="{{ Auth::user()->user_id }}" id="auid">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <br><br>
        <h2 class="type--center type--thin">Add Collaborators</h2>
        <br>
        <div class="timeline type--center">
          <ul class="progressbar" >
          <li title="Create A Project" class="active form-btn"> Create A project </li>
          <li title="Project Research Theme" class="active form-btn" data-action="back">Project Theme</li>
          <li title="Add Collaborators" class="active form-btn hover" data-action="next">Add Collaborators</li>
          <li title="Finish" class="form-btn form-btn-check" data-action="next">Finish</li>
          </ul>
        </div>
        <br>
      @if(session('errors'))
      <div class="alert alert--danger alert-padd">
            <h3>Whoops, you have some errors.</h3>
            <ul>
              @foreach(session('errors') as $error)
              <li>{{ $error }}</li>
               @endforeach
            </ul>
            <a href="#" class="alert__close" data-alert-close>&times;</a>
      </div>
      @endif

      <br>
      <div class="col-sm-12">
        {!! Form::open(['class' => 'project-create-form' ]) !!}
        <div class="form__group">
          <h3 class="type--center type--thin">Seeking Collaborators</h3>
          <div class="row" style="margin-left: 0">
              <div class="pull-left">

                <label for="seekingCollaborators" class="sr-only">Checkbox: Seeking Faculty Collaborators</label>
                {{ Form::checkbox('seekingCollaborators', 1, $seekingCollaborators) }}
              </div> &nbsp;Faculty
              <div class="tooltip"><i class="fa fa-question-circle" aria-hidden="true"></i>
                  <span class="tooltiptext">
                      Checking this box will allow other faculty members to request to join this project.
                  </span>
              </div>
          </div>
          <div class="row" style="margin-left: 0">
            <div class="pull-left">
              <label for="seekingCollaborators" class="sr-only">Checkbox: Seeking Students</label>
              {{ Form::checkbox('seekingStudents', 1, $seekingStudents, ['id'=>'seekingStudents']) }}
            </div> &nbsp;Students
              <div class="tooltip"><i class="fa fa-question-circle" aria-hidden="true"></i>
                  <span class="tooltiptext">
                      Checking this box will allow students to apply to join this project. <br />
                      You may optionally specify additional information for students to include with their application.
                  </span>
              </div>
              {{ Form::textarea('studentQualifications', $studentQualifications , [
                    'id'         =>'studentQualifications',
                    'placeholder'=>'(Optional) Provide any specific qualifications or additional information that you would like students to include (e.g., major, graduation year, skills)',
                    'rows'       =>'4',
                    'style'      => $seekingStudents? '' : 'display: none;'
                ]
              ) }}
          </div>
        </div>
      </div>

      <div class="col-sm-12">
        <div class="row">
            <h3 class="type--center type--thin">Add Collaborators</h3>
            <div class="col-md-6 margin-top--20">
              {{ Form::select ('collaboratorDropdown',[],null,['class'=>'collaborators select2-collaborator', 'id' => 'collab'] ) }}
              <strong class="type--red"></strong>
            </div>

            <div class="col-md-5 margin-top--20">
              {{ Form::select ('roles', $roles, null,['class'=>'roles select2-roles', 'id'=>'roleID'] ) }}
              <div class="tooltip" style="float:right"><i class="fa fa-question-circle" aria-hidden="true"></i>
                  <span class="tooltiptext">Only <strong>Lead Principal Investigator</strong> and <strong>Principal Investigators</strong> can edit project information.<br>
                  </span>
              </div>
            </div>
              <div class="col-md-1 type--center margin-top--15">
              <a href="#" title="Add Collaborator" class="btn btn-primary type--center btn-sm" id="addCollabBtn"><i class="fa fa-plus" aria-hidden="true"></i> Add</a>
            </div>
        </div>
        <br>
        <br>
        <div >
          <table id = "list" class="table table--padded table--bordered table--striped">
             <thead>
               <tr>
                 <th><strong>Collaborator</strong></th>
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
          <div class="type--center width--290">
            <input type="hidden" value="" name="action">
            <a title="Previous Step" href="#" class="btn btn-default form-btn width--132L " data-action="back">Previous Step</a>

            <button title="Submit" href="#" class="btn btn-primary form-btn width--132R" data-action="next" onclick="spinMe(this)">Submit</button>

          </div>
          <br><br><br>
        {{ Form::close() }}
      </div>
    </div>
  </div>
  </div>
</div>
@stop

@section('scripts')
{!! Html::script('js/metaphor.js') !!}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script>
  (function(){
      $.getJSON("", function(collaborators){
        var template, input;
        template = input = "";

        if(collaborators.length > 0)
        {
          collaborators.forEach(function(collaborator){
            var member = collaborator.split(','),
            displayName = member[1] == "{{ Auth::user()->user_id }}" ? member[0] + ' <span style="opacity: .5;">&#183 You</span>' : member[0];
            // 0 = name, 1 = membersId, 2 = role_position
            template += "<tr data-id='"+ member[0] + ',' + member[1] + ',' + member[2] +"'><td>" + displayName + "</td><td>" + member[2] + "</td><td>Active</td><td style='text-align: center'> <a class='removeCollabBtn'>Remove</a></td></tr>";

            input += "<input type='hidden' name='collaborators[]' value='"+ member[0] + ',' + member[1] + ',' + member[2] +"'>";
          });
        }
        else
        {
          template += '<tr data-id="{{ Auth::user()->display_name }},{{ Auth::user()->user_id }},Lead Principal Investigator"><td>{{ Auth::user()->display_name }} &#183 <span style="opacity: .5;">You</span></td><td>Lead Principal Investigator</td><td>Active</td><td style="text-align: center"> <a class="removeCollabBtn">Cancel</a></td></tr>';
          input += "<input type='hidden' name='collaborators[]' value='{{ Auth::user()->display_name }},{{ Auth::user()->user_id }},Lead Principal Investigator'>";
        }
        $('#list tbody').append(template);
        $('.project-create-form').append(input);
      });
  })()

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
{!! Html::script('js/scripts.js') !!}
@stop
