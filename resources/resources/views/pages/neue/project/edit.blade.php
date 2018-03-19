@extends('layouts.master')
@section('content')
<div class="container">
<br>
  <div class="row">
    <div class="col-sm-12">
      @if($errors->any())
        <div class="alert alert-danger">
          <ul>
            <h3>Whoops, you have some errors.</h3>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif
    </div>
  </div>
  <div class="row">
    <div class="col-sm-12">
      <h1 class="type--header"> Edit Project</h1>
      <br>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-12">
        <h2>Basic Info</h2>
        {!! Form::open(['url'=> request()->url()]) !!}
          <div class="row">
            <div class="col-sm-6">

              <div class="form__group">
                {!! Form::label('title', 'Project Title', ['class'=>'label--required']) !!}
                {!! Form::text('title', session('new-project')[0]['project_general']['title'] ?: NULL, ['class'=>'form-control','placeholder'=>'Project title...']) !!}
              </div>
              <div class="form__group">
                {!! Form::label('description', 'Project Description', ['class'=>'label--required']) !!}
                {!! Form::textarea('description', session('new-project')[0]['project_general']['description'] ?: NULL, ['rows'=>'4','cols'=>'','class'=>'form-control', 'placeholder'=>'Add Project Description...']) !!}
              </div>
            </div>
            <div class="col-sm-6">
              <div class="row">
                <div class="col-sm-6">
                  <div class="form__group">
                    {!! Form::label('start_date', 'Start Date', ['class'=>'label--required']) !!}
                    {!! Form::text('start_date', session('new-project')[0]['project_general']['start_date'] ?: NULL, ['class'=>'form-control col-sm-3 datepicker', 'placeholder'=>'mm/dd/yyyy']) !!}
                  </div>
                </div>

                <div class="col-sm-6">
                  <div class="form__group">
                    {!! Form::label('end_date', 'End Date', ['class'=>'label--required']) !!}
                    {!! Form::text('end_date', session('new-project')[0]['project_general']['end_date'] ?: NULL, ['class'=>'form-control datepicker', 'placeholder'=>'mm/dd/yyyy']) !!}
                  </div>
                </div>
              </div>
              <div class="form__group">
                {!! Form::label('url', 'Website') !!}
                {!! Form::text('url', session('new-project')[0]['project_general']['url'] ?: NULL, ['class'=>'form-control url-field', 'placeholder' => 'http://']) !!}
              </div>
            </div>
          </div>
          {!! Form::close() !!}
    </div>
  <div class="row">
    <div class="col-sm-12">
    {{-- Expertise --}}
    <h2> Edit Expertise </h2>
    {!! Form::open(['url'=> request()->url()]) !!}
    <div id="expertise">
      <div class="row" v-for="row in rows">
        <div class="repeater">
          <repeater :row="row" :uniques="s" :expertises=></repeater>
          <div class="repeater__links">
            <span class="label label--success" @click.prevent="addRow(row)"><i class="fa fa-plus-circle" aria-hidden="true"></i></span>
            <span class="label label--danger" @click.prevent="deleteRow(row)"><i class="fa fa-minus-circle" aria-hidden="true"></i></span>
          </div>
        </div>
      </div>
    </div>
    </div>
    {{-- End Expertise --}}
  </div>
  <div class="row">
  <div class="col-sm-12">
    {{-- Collab --}}
    <h2> Edit Collaborators</h2>
      <div id="research-collabs">
        <collaborators project_status="create"></collaborators>
    </div>
    <br><br><br>
    {{-- End Collab --}}
  </div>
  </div>
  <div class="pull-right">
  <a title="Cancel" href="" class="btn btn-default">Cancel</a>
  {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
  </div>
</div>
@stop

@section('scripts')
{!! Html::script('js/metaphor.js') !!}
{!! Html::script('js/collab.js') !!}
{!! Html::script('js/metaphor.js') !!}
{!! Html::script('js/expertise.js') !!}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script>
  (function(){
    $.getJSON("{{ request()->url() }}", function(expertise){
      $.each(expertise, function(i, val){
        //console.log('The expertise is ' + val);
      });
    });
  })()
</script>
@stop
