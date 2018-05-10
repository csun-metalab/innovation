@extends('layouts.master')


@section('title') Innovation @stop
@section('description')
  Lorem ipsum dolor sit amet, consectetur adipiscing elit.
@stop

@section('content')

<div class="section section--lg">
  <div class="container type--center">
    {{--<img src="{{ asset('imgs/helix-icon.png') }}" style="width:80px; margin-bottom: 25px;" alt="HELIX Logo">--}}
    @if(getAppName()=='SeniorDesign')
      <h1 class="mega type--thin type--marginless">Senior Design</h1>
    @else
      <h1 class="mega type--thin type--marginless">Innovation</h1>
    @endif

    <!-- <h2 class="type--thin type--gray">Helping Everyone Link Interests &amp; Expertise.</h2> -->
    <h2 class="type--thin type--gray">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h2>
    <br>
    <p><a title="Explore Projects" href="{{ urlAppName('/project') }}" class="btn btn-primary-outline btn-lg">Explore Projects</a></p>
    {{--<p class="milli type--uppercase type--gray type--marginless">v1.6.1-Public-Beta</p>--}}
  </div>
</div>


<div id="main-content" class="main">

    <div class="container-fluid" style="background-image: url( {{ asset('imgs/communicate_bg2.jpg') }} );-webkit-background-size: cover;background-position: center;">
      <br><br><br><br><br>
      <div class="row">
        <div class="col-sm-6 col-sm-offset-1 " style="padding: 50px; border-radius:3px; background: rgba(255,255,255,0.85); max-width: 475px;">
          <p class="type--red">01.</p>
          <h2>Communicate </h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>
      </div>
      <br><br><br><br><br>
    </div>
    <br><br>
    <div class="section">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-4 col-sm-offset-1" style="padding-right: 50px;max-height: 400px">
            <p class="type--red">02.</p>
            <h2>Explore </h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
          </div>
          <div class="col-sm-6 col-sm-offset-1">
            <img class="img--fluid" src={{asset('imgs/explore_image2.jpg')}} alt="" style="border-radius: 3px;max-height: 400px; max-width: 550px">
          </div>
        </div>
      </div>
    </div>
    <br>

    <div class="container-fluid" style="background-image: url( {{ asset('imgs/indexbg4.jpg') }} );-webkit-background-size: cover;background-position: center;">
      <br><br><br><br><br>
      <div class="row">
        <div class="col-sm-7 col-sm-offset-1 " style="padding: 50px; border-radius:3px; background: rgba(255,255,255,0.85); max-width: 475px;">
          <p class="type--red">03.</p>
          <h2>Promote </h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>
      </div>
      <br><br><br><br><br>
    </div> 
    <br><br>
    <div class="section">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-4 col-sm-offset-1">
            <img class="img--fluid" src="{{ asset('imgs/facultyretreat2.jpg') }}" alt="" style="border-radius: 3px; max-height: 400px; max-width: 550px">
          </div>
          <div class="col-sm-6 col-sm-offset-1" style="padding-right: 50px;">
            <p class="type--red">04.</p>
            <h2>Engage </h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
          </div>
        </div>
      </div>
    </div>
    <br><br>

    <div class="container-fluid" style="background-image: url( {{ asset('imgs/students-3.jpg') }} );-webkit-background-size: cover;background-position: center;">
      <br><br><br><br><br>
      <div class="row">
        <div class="col-sm-6 col-sm-offset-1 " style="padding: 50px; border-radius:3px; background: rgba(255,255,255,0.85); max-width: 475px;">
          <p class="type--red">05.</p>
          <h2>Collaborate </h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>
      </div>
      <br><br><br><br><br>
    </div> 
    
      <!-- </div> -->

  <div class="section section--lg bg--f7">
    <div class="container">
      <div class="row type--center">
        <div class="col-sm-12">
          <br><br>
          <p><img src={{ asset('imgs/speech-bubble.png') }} alt=""></p>
          <h2>Be A Part Of The Collaboration.</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
          <p><a title="Explore Projects" href="{{ urlAppName('/project/create') }}" class="btn btn-primary-outline btn-lg">Create A Project</a></p>
          <br><br>
        </div>
      </div>
    </div>
  </div>

</div>

@stop

@section('scripts')
{!! Html::script('js/metaphor.js') !!}
@stop