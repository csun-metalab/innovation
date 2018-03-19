{{-- we are going to need to get a project ID of some sort to associate the image --}}
@section('title', 'Project Photo Upload')
@extends('layouts.master')
@section('content')
  <div class="container">
    <br>
    <br>
    <div class="row">
      <div class="col-sm-8 col-sm-offset-2">
          <h2 class="type--center type--thin">Upload Project Photo</h2>
      </div>
    </div>
    <br>
    <div class="row">
      <div class="col-sm-8 col-sm-offset-2">
        <div class="col-sm-6">
          <label>Project Photo Preview</label>
          {{-- Checks if there's an image associated with this project --}}
          @if ($project->image)
            <img src="{{ env('IMAGE_VIEW_LOCATION').$project->image->src }}" class="img--fluid" alt="Project Photo Preview">
          @else
            No photo uploaded
          @endif
        </div>
        <div class="col-sm-6">
        {!! Form::open(array('url'=> route('project.photo-store', ['id' => $project->project_id]) ,'method'=>'POST', 'files'=>true)) !!}
          <div class="form__group">
            {!! Form::label('image', 'New Project Photo') !!}
            {!! Form::file('image', ['accept'=>'image/*']) !!}
             <p class="errors">{!!$errors->first('image')!!}</p>
          @if(Session::has('error'))
          <p class="errors">{!! Session::get('error') !!}</p>
          @endif

          </div>
          <div class="form__group">
            {!! Form::submit('Upload Image', ['class' => 'btn btn-primary']) !!}
          </div>
            {{-- this will be for checking if project photo exists --}}
            @if ($project->image)
                <button class="btn btn-primary-outline" data-modal="#delete-modal">Remove Project Photo</button>
            @endif
          {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>

    <div id="delete-modal" class="modal__outer">
    <div class="modal">
      <div class="modal__header">
        <strong>Delete Project Photo</strong>
      </div>
      <div class="modal__content">Are you sure you want to delete this photo?</div>
      <div class="modal__footer">
        <div class="pull-right">
          <button class="btn btn-default" data-modal-close="#delete-modal">Cancel</button>
          <a href="{{ route('project.photo-delete', ['id' => $project->project_id]) }}">
              <button class="btn btn-primary">Delete</button>
          </a>
        </div>
      </div>
      <div class="modal__close" data-modal-close="#delete-modal"><i class="fa fa-times" aria-hidden="true"></i></div>
    </div>
  </div>
@stop
@section('scripts')
{!! Html::script('js/metaphor.js') !!}
@stop
