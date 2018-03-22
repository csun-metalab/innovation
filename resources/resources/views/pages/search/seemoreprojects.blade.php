{{-- This is the search results for searching facutly by Research Interests and Themes --}}

@extends('layouts.search-layout')

@section('search-title')
  Explore Project Themes
  @if(request()->filled('query'))
    <span class="type--thin">{{': "'.request()->get('query'). '"'}}</span>
  @endif
@endsection

@section('results-members-research-interests')
  @include('layouts.partials.project-search-results-section', [
        'projects'          => $projects,
        'sectionHeading'    => "Projects with Themes matching \"${query}\"",
        'buttonHref'        => null,
    ])
@endsection

@section('pagination-links')
    <div class="row">
      <div class="col-sm-8">
        <div class="list--unstyled">
          {!! $projects->appends(request()->except('page'))->links() !!}
        </div>
      </div>
    </div>
@endsection
