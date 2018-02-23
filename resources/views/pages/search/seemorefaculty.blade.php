{{-- This is the search results for searching facutly by Research Interests and Themes --}}

@extends('layouts.search-layout')

@section('search-title')
    @yield('search-kind-title','Explore Research Interests')
  @if(request()->has('query'))
    for
    <span class="type--thin">{{'"'.request()->get('query'). '"'}}</span>
  @endif
@endsection
@section('results-members-research-interests')
  @include('layouts.partials.people-search-results-section', [
        'people'            => $people,
        'sectionHeading'    => "Faculty",
        'buttonHref'        => null,
    ])
@endsection
@section('pagination-links')
  <div class="row">
    <div class="col-sm-8">
      <div class="list--unstyled">
        {!! $people->appends(request()->except('page'))->links() !!}
      </div>
    </div>
  </div>
@endsection
