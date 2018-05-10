@section('title','Page Not Found')
@extends('layouts.master')

@section('content')
	<div class="container error--container--margins">
		<div class="row">
			<div class="col-sm-12">
				<h1>This page could not be found</h1>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-sm-12">
				<p>The desired resource could not be located on this server.</p>			
			</div>
			<br><br><br><br>
			<div class="col-sm-12">
				 <a title="Return Home" href="{{ urlAppName("/") }}" class="btn btn-primary">Return Home</a>
			</div>
		</div>
	</div>
@stop

@section('scripts')
{!! Html::script('js/metaphor.js') !!}
@stop