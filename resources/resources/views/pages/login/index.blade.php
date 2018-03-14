@extends('layouts.master')

{{-- META DATA --}}
@section('title') Login @stop
@section('description')
Helping Experts Link Interests &amp; Expertise.
@stop

@section('content')

<div id="main-content" class="main">

  {{-- CONTENT --}}
  <div class="section section--lg">
    <div class="container">
			@if (Session::get('errors') || Session::get('error'))
				<div class="alert alert--danger">
				  Invalid username / password combination or invalid user account.
				  <a title="Close" href="#" class="alert__close" data-alert-close>×</a>
				</div>
			@endif

      <div class="row">
				<div class="col-lg-6">
					<h1>Login</h1>
					<br>
				{!! Form::open(['url' => url('login')]) !!}
					<div class="form__group">
						{!! Form::label('username','Username') !!}
						{!! Form::input('text', 'username') !!}
					</div>
					<div class="form__group">
						{!! Form::label('password','Password') !!}
						{!! Form::input('password', 'password') !!}
					</div>
					<div class="form__group">
						{!! Form::submit('Login', ['class'=>'btn btn-primary-outline btn-lg'])!!}
					</div>
				{!! Form::close() !!}
				<br><br>
				</div>
      </div>
    </div>
  </div>
  {{-- CONTENT ENDS --}}

</div>
@stop

@section('scripts')
	{!! Html::script('js/metaphor.js') !!}
@stop
