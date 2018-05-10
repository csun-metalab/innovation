@extends('layouts.master')
@section('content')

<div class="section">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <h1 class="type--header type--thin">Dashboard</h1>
      </div>
      <div class="col-sm-3 type--center">
        <a href="#" style="color: #4a4a4a; text-decoration:none;">
          <div class="panel">
            <div class="panel__content">
              <br>
              <p><img src="{{ asset('imgs/profiles-icon.png') }}" style="width:80px;" alt="Profiles Logo"></p>
              <p><strong>Profiles <i class="fa fa-angle-right" aria-hidden="true"></i></strong></p>
            </div>
          </div>
        </a>
      </div>
      <div class="col-sm-3 type--center">
        <a href="#" style="color: #4a4a4a; text-decoration:none;">
          <div class="panel">
            <div class="panel__content">
              <br>
              <p><img src="{{ asset('imgs/stories-icon.png') }}" style="width:80px;" alt="Stories Logo"></p>
              <p><strong>Stories <i class="fa fa-angle-right" aria-hidden="true"></i></strong></p>
            </div>
          </div>
        </a>
      </div>
      <div class="col-sm-3 type--center">
        <a href="{{ urlAppName('/project') }}" style="color: #4a4a4a; text-decoration:none;">
          <div class="panel">
            <div class="panel__content">
              <br>
              <p><img src="{{ asset('imgs/innovation-icon.png') }}" style="width:80px;" alt="Innovation Logo"></p>
              <p><strong>Innovation <i class="fa fa-angle-right" aria-hidden="true"></i></strong></p>
            </div>
          </div>
        </a>
      </div>
    </div>
  </div>
</div>
  <br><br><br><br><br><br><br><br><br><br><br>
@stop
