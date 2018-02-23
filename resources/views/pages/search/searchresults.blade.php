{{-- This is the search results for searching by Research Interests and Themes --}}

@extends('layouts.search-layout')

@section('search-title')
    Explore Research Interests and Themes
    @if(request()->has('query'))
        <span class="type--thin">{{': "'.request()->get('query'). '"'}}</span>
    @endif
@endsection
@section('results-members-research-interests')
    @if(!$people->isEmpty())
        @include('layouts.partials.people-search-results-section', [
        'people'            => $people,
        'sectionHeading'    => "Faculty by Research Interests",
        'buttonHref'        => route('see-more-faculty').'?'. http_build_query(request()->except('searchType')),
        ])
    @endif
@endsection
@section('results-projects-research-interests')
    @if(!$projects->isEmpty())
        @include('layouts.partials.project-search-results-section', [
            'projects'          => $projects,
            'sectionHeading'    => "Projects by Themes",
            'buttonHref'        => route('see-more-projects').'?'.http_build_query(request()->except('searchType')),
        ])
    @endif
@endsection
@section('no-results-message')
    @if($projects->isEmpty())
        @include('layouts.partials.project-search-results-section', [
            'projects'          => $projects,
            'sectionHeading'    => "Projects by Themes",
            'buttonHref'        => route('see-more-projects').'?'.http_build_query(request()->except('searchType')),
        ])
    @endif
    @if($people->isEmpty())
        @include('layouts.partials.people-search-results-section', [
        'people'            => $people,
        'sectionHeading'    => "Faculty by Research Interests",
        'buttonHref'        => route('see-more-faculty').'?'. http_build_query(request()->except('searchType')),
        ])
    @endif
@endsection