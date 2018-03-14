<noscript>
    <span class="alert alert--danger">Warning: Search function might be limited because JavaScript is disabled!</span>
</noscript>
@extends('layouts.master')
@section('content')
    {!! Form::open([
    'id'      => 'search-form',
    //Sends the form data to the appropriate place depending on the search type.
    'url'     => $formActions[$searchType],
    'method'  => 'GET'
    ]) !!}
    <div class="cd-header bg--white">
        <div class="row">
            <h2 class="page-header">
                @yield('search-title')
            </h2>
        </div>
        @include('layouts.partials.search-bar')

    </div>


    <div class="cd-main-content">
        @if(isset($filters) && $searchType == 'title')
        <div class="cd-tab-filter-wrapper">
            <div class="cd-tab-filter">
            </div>
        </div>
        @endif
        <div class="container">
            <section class="cd-gallery">
                @yield('session-flashes')
                @yield('filter-selection-and-new-project-button')
                @yield('featured-projects')
                @yield('recent-projects')
                @yield('results-titles-and-abstracts')
                @yield('results-projects-research-interests')
                @yield('results-members-research-interests')
                @yield('results-faculty-members')
                @yield('pagination-links')
                @yield('no-results-message')
            </section>
        </div>
    </div>
    {!! Form::close() !!}
@endsection

@section('scripts')
    {!! Html::script('js/metaphor.js') !!}
    {!! Html::script('js/jquery.min.js') !!}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <script type="text/javascript" src='{{asset('/js/sidebar.js')}}'></script>
    {!! Html::script('js/loadProfileImages.js') !!}
    {{--Set the dropdown box's on-change listener to update the form action.--}}
    @include('layouts.partials.scripts.dropdown-search-script')
    @yield('page-specific-scripts')
@endsection

