@extends('layouts.master')

@section('content')
	<div class="container error--container--margins">
		<div class="row">
			<div class="col-sm-12">
				<h1>500 Internal Server Error</h1>
			</div>
		</div>
		<div class="row">
			<br><br>
			<div class="col-sm-12">
				 <a title="Return Home" href="{{ url("/") }}" class="btn btn-primary">Return Home</a>
			</div>
		</div>
	</div>
@stop