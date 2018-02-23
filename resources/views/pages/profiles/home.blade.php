
@extends('layouts.master')
@section('navTitle')
Profiles
@stop

@section('content')
@include('pages.profiles.profile')


<div class="section">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        @include('layouts.sub_nav')
      </div>
    </div>
    <div class="row section">
      <div class="col-md-3">
        <strong>Sidebar</strong>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ratione obcaecati enim labore animi nulla, ad amet possimus magni commodi, ipsam ipsa, saepe quibusdam ducimus, voluptatem necessitatibus molestias harum! Dignissimos, porro.</p>
      </div>
      <div class="col-md-9">
        <h2>Main Content
        <a href="edit" class="btn btn-primary-outline btn-sm pull-right"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
        </h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quisquam culpa rem quis beatae tempora, ullam assumenda iusto voluptates aliquam earum praesentium exercitationem similique, illo, fugiat accusamus ad odit impedit sequi.</p>
      </div>
    </div>
  </div>
</div>

@stop
