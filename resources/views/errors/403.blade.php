@extends('layouts.master')

@section('content')
	<div class="container error--container--margins">
		<div class="row">
			<div class="col-sm-12">
				<h1>403 Forbidden</h1>
			</div>
			<br>
			<div class="col-sm-12">
				<p>You Don't Have Access.</p>			
			</div>
			<br><br><br><br>
			<div class="col-sm-12">
				 <a title="Return Home" href="{{ urlAppName("/") }}" class="btn btn-primary">Return Home</a>
			</div>
		</div>
	</div>
@stop

