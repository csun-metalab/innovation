@extends('layouts.master')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <br><br>
        <h2 class="type--center type--thin">Create A Project</h2>
        <br>
        <div class="timeline type--center">

          <ul class="progressbar">
          <li title="Create A Project" class="active form-btn"> Create A project </li>
          <li title="Project Research Theme" class="active form-btn hover">Project Theme</li>
          <li title="Add Collaborators" class="active form-btn hover" data-action="back">Add Collaborators</li>
          <li title="Finish" class="active form-btn form-btn-check">Finish</li>
          </ul>

        </div>
        <br><br>
      </div>

      <div class="col-sm-8 col-sm-offset-2 type--center">
        <p>Congratulations Your Project Has Been Created!</p>
        <br>
        <a title="View Project" href="{{ url('project/' . $project->project_id) }}" class="btn btn-default">View Project</a>
       <a title="View Project" href="{{ route('project.photo-upload', ['id' => $project->project_id]) }}" class="btn btn-primary">Upload Image</a>

      </div>
    </div>
  </div>
@stop

@section('scripts')
{!! Html::script('js/metaphor.js') !!}
@stop
