@extends('layouts.master')
@section('title',"Submit Feedback")

@section('content')
<div class="section" style="background-color: #252525;">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <h1 class="type--white type--thin type--marginless">Request Email Successfully Sent!</h1>
        <h3 class="type--white type--thin type--marginless">{{ $project->project_title }}</h2>
      </div>
    </div>
  </div>
</div>

<div class="section">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <p>
          Your request to join <strong>{{$project->project_title}}</strong>, has been sent.
          Please allow up to 24 hours for processing before making further arrangements with the Lead Principle Investigator:
          <strong>{{$project->pi->display_name}}</strong>.
          Click <a href="{{route('project.show',$project->project_id)}}">here</a> to return to the project page.
        </p>
      </div>
    </div>
  </div>
</div>

@endsection
