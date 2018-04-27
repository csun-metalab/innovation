{{-- This is the page that shows all search results --}}
@extends('layouts.search-layout')

@section('session-flashes')
    @if(session('success'))
        <div class="alert alert--warning">
            <b>{{session('success')}}</b>
            <a href="#" class="alert__close" data-alert-close>&times;</a>
        </div>
    @endif
    @if(session('error'))
        <div class="alert alert--danger">
            <b>{{session('error')}}</b>
            <a href="#" class="alert__close" data-alert-close>&times;</a>
        </div>
    @endif
@endsection

@section('filter-selection-and-new-project-button')
    {{--@include('layouts.partials.filter-selection-and-new-project-button')--}}
@endsection

@section('search-title')
    All Search Results
    @if(request()->filled('query'))
        for
        <span class="type--thin"> {{'"' . request()->get('query') . '"'}} </span>
    @endif
@endsection
@section('results-titles-and-abstracts')
    @if(!$projects->isEmpty())
        @include('layouts.partials.project-search-results-section', [
            'projects'          => $projects,
            'sectionHeading'    => "Projects",
            'buttonHref'        => route('search.projects')
                                    .'?'
                                    // Force the search type on the destination page to be "Titles and abstracts"
                                    .http_build_query(['searchType'=>'title'] + request()->all()),
        ])
    @endif
@endsection
@section('results-projects-research-interests')
    @if(!$projectsByTheme->isEmpty())
        @include('layouts.partials.project-search-results-section', [
            'projects'          => $projectsByTheme,
            'sectionHeading'    => "Projects by Themes",
            'buttonHref'        => route('see-more-projects').'?'.http_build_query(request()->except('searchType')),
        ])
    @endif
@endsection
@section('results-faculty-members')
    @if(!$peoplesProjects->isEmpty())
        @include('layouts.partials.project-search-results-section', [
             'projects'            => $peoplesProjects,
             'sectionHeading'    => "Projects Members",
             'buttonHref'        => route('search.member-search')
                                     .'?'
                                     // Force the search type on the destination page to be "Members"
                                     .http_build_query(['searchType'=>'member'] + request()->all()),

         ])
    @endif
@endsection
@section('no-results-message')
    @if($projects->isEmpty())
        @include('layouts.partials.project-search-results-section', [
            'projects'          => $projects,
            'sectionHeading'    => "Projects",
            'buttonHref'        => route('search.projects')
                                    .'?'
                                    // Force the search type on the destination page to be "Titles and abstracts"
                                    .http_build_query(['searchType'=>'title'] + request()->all()),
        ])
    @endif
    @if($projectsByTheme->isEmpty())
        @include('layouts.partials.project-search-results-section', [
            'projects'          => $projectsByTheme,
            'sectionHeading'    => "Projects by Themes",
            'buttonHref'        => route('see-more-projects').'?'.http_build_query(request()->except('searchType')),
        ])
    @endif
    @if($peoplesProjects->isEmpty())
        @include('layouts.partials.project-search-results-section', [
             'projects'            => $peoplesProjects,
             'sectionHeading'    => "Projects Members",
             'buttonHref'        => route('search.member-search')
                                     .'?'
                                     // Force the search type on the destination page to be "Members"
                                     .http_build_query(['searchType'=>'member'] + request()->all()),

         ])
    @endif
@endsection