@extends('layouts.master')
@section('title')
What's New
@stop

@section('content')

<div class="container">
  <div class="row">
    <div class="col-sm-12">
      <h1 class="page-header">What's New in Helix</h1>
    </div>
    <div class="col-sm-3">
    <nav class="bs-docs-sidebar">
      <ul class="nav nav-stacked sidebar">
          <li class="{{ setActive(['about/whats-new','about/whats-new/*']) }}">
              <a title="What's New" href="{{ url('about/whats-new') }}">What's New</a>
          </li>
          <li class="{{ setActive(['about/api','about/api/*']) }}">
              <a title="API Documentation" href="{{ url('about/api') }}">API Documentation</a>
          </li>

      </ul>
    </nav>
    </div>
    <div class="col-sm-9">
      <h2>Helix v.0.1.0 <small>Release Date: 04/22/16</small></h2>
      <p>
        <strong>New Features:</strong>
        <ol>
          <li>Project API to Share on Profiles</li>
          <li>Add Collaborators to a Project</li>
          <li>Send Invitation to Collaborator Via Email </li>
          <li>Create New Poject</li>
        </ol>

        <strong>Improvements:</strong>
        <ol>
          <li>Search for People, Projects, or Resources</li>
          <li>Re-Designed Search Page Layout</li>
        </ol>

      </p>

    </div>
  </div>
</div>

@stop
