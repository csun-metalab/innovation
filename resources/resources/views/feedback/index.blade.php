@extends('layouts.master')
@section('title',"Submit Feedback")

@section('content')
<div class="section" style="background-color: #252525;">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <h1 class="type--white type--thin type--marginless">Submit Public Beta Feedback</h1>
      </div>
    </div>
  </div>
</div>
        
<div class="section">
	<div class="container">
	  <div class="row">
		@if($errors->any())

		<div class="alert alert--danger alert-padd">
		<a href="#" class="alert__close" data-alert-close>&times;</a>
		<ul>
		  <h3>Whoops, you have some errors.</h3>
		  @foreach($errors->all() as $error)
		  <li>{{ $error }}</li>
		  @endforeach
		</ul>
		</div>
		@endif
			<div class="col-sm-10 col-sm-offset-1">
				{{Form::open()}}
				<div class="form__group">
					{{Form::label('name','Name',['class'=>'label--required'])}}
					{{Form::text('name', NULL , ['placeholder' => 'Name...'])}}
				</div>
				<div class="form__group">
					{{Form::label('email','CSUN Email',['class'=>'label--required'])}}
					{{Form::text('email', NULL , ['placeholder' => 'email@csun.edu'])}}
				</div>
				<div class="form__group">
					{{Form::label('title','Subject',['class'=>'label--required'])}}
					{{Form::text('title', NULL , ['placeholder' => 'Subject Line'])}}
				</div>
				<div class="form__group">
					{{Form::label('body','Message',['class'=>'label--required'])}}
					{{Form::textarea('body', NULL)}}
				</div>
					{{Form::submit('Submit Feedback',['class'=>'btn btn-primary'])}}

				{{Form::close()}}
			</div>
		</div>
	</div>
</div>
@endsection