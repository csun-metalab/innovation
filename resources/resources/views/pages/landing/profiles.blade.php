@extends('layouts.master')

{{-- META DATA --}}
@section('title') Profiles @stop
@section('description')
Find & Discover People At CSUN
@stop

@section('content')
{{-- HEADER --}}
{{-- REFACTOR: NEED A BETTER SOLUTION FOR HEADERS... FINE FOR NOW --}}
<div class="section section--lg">
  <div class="container type--center">
    <img src="{{ asset('imgs/profiles-icon.png') }}" style="width:80px; margin-bottom: 25px;" alt="Faculty Profiles Logo">
    <h1 class="mega type--thin type--marginless">Profiles.</h1>
    <h2 class="type--thin type--gray">Start Discovering People At CSUN.</h2>
    <br>
    <form class="" action="index.html" method="post">
      <div class="row">
        <div class="col-sm-4 col-sm-offset-1">
          <div class="form__group">
            <input id="search" type="text" placeholder="Search For...">
          </div>
        </div>
        <div class="col-sm-4">
          <div class="form__group">
            <select name="" id="example1">
              <option value="">-- All Departments --</option>
              <option value="1">Art</option>
              <option value="2">Computer Science</option>
              <option value="3">Psychology</option>
            </select>
          </div>
        </div>
        <div class="col-sm-2"><a title="Search" class="btn btn-primary btn-block" href="#">Search</a></div>
      </div>
    </form>
    <br>
    <p class="milli type--uppercase type--gray type--marginless">"Bruce Lee", v2.7.7</p>
  </div>
</div>
{{-- HEADER ENDS --}}

<div id="main-content" class="main">

  {{-- CONTENT --}}
  <br><br><br>
  {{-- CONTENT ENDS --}}

</div>
@stop
