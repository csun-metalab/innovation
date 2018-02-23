@extends('layouts.master')
@section('title',"Apply as a Student")
@section('page-specific-headers')
    <script src='https://www.google.com/recaptcha/api.js'></script>
@endsection
@section('content')
 <noscript>
    <span class="alert alert--danger">
        Warning: This page requires JavaScript to be enabled.
        Please enable it in your browser settings before continuing.
    </span>
</noscript>

<div class="section" style="background-color: #252525;">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <h1 class="type--white type--thin type--marginless">Request to Join:</h1>
        <h2 class="type--white type--thin type--marginless">{{ $project->project_title }}</h2>
      </div>
    </div>
  </div>
</div>

<div class="section">
  <div class="container">
    @if($project->attributes->getQualifications())
        <div class="row">
            <div class="col-sm-12">
                <h3>Required Qualifications</h3>
                <p>
                {!! nl2br(e($project->attributes->student_qualifications))  !!}
                </p>
            </div>
        </div>
    @endif
    <div class="row">
      <div class="col-sm-12">
        @include('layouts.partials.display-errors')
        @if(isset($requestToJoinEmailConfirmation))
          <div class="alert alert--success alert-padd">
            <a href="#" class="alert__close" data-alert-close>&times;</a>
            <ul>
              <h3>Success!</h3>
              <li>{{ $requestToJoinEmailConfirmation }}</li>
            </ul>
          </div>
        @endif
      </div>
    </div>
  </div>
</div>
<div class="section">
	<div class="container">
	  <div class="row">
			<div class="col-sm-12">
				{{ Form::open([
				  'method'  =>  'POST',
				  'url'     =>  route('student-request-sent',[$project->project_id])
        ]) }}
				<div class="form__group">
					{{Form::label('name','Name',['class'=>'label--required'])}}
					{{Form::text('name', NULL , ['placeholder' => 'First and Last Name'])}}
				</div>
				<div class="form__group">
					{{Form::label('email','CSUN Email',['class'=>'label--required'])}}
					{{Form::text('email', NULL , ['placeholder' => 'email@my.csun.edu or email@csun.edu'])}}
				</div>
				<div class="form__group">
					{{Form::label('subject','Subject',['class'=>'label--required'])}}
					{{Form::text('subject', NULL , ['placeholder' => 'Subject'])}}
				</div>
				<div class="form__group">
					{{Form::label('message','Message',['class'=>'label--required'])}}
					{{Form::textarea('message', NULL,['placeholder' => 'Why are you interested in joining this project?'])}}
				</div>
                <div class="g-recaptcha" data-sitekey="{{env('RE_CAP_SITE_KEY')}}"></div>
                <br />
                {{Form::submit('Submit',['class'=>'btn btn-primary'])}}

				{{Form::close()}}
			</div>
		</div>
	</div>
</div>
@endsection
