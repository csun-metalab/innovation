<noscript>
    <span class="alert alert--danger">Warning: Search function might be limited because JavaScript is disabled!</span>
</noscript>

@if(request()->filled('query'))
    @section('title',request()->get('query'))
@elseif(request()->filled('member'))
    @section('title', $filters['member']."'s Projects")
@endif

@extends('layouts.search-layout')
@section('search-title')
    @if(request()->filled('query'))
        <h2 class="page-header">Search Results for "<span class="type--thin">{{request()->get('query')}}</span>"
        </h2>
    @elseif(request()->filled('member'))
        <h2 class="capitalize">{{ $filters['member']}}'s Projects</h2>
    @else
        <h2 class="page-header">Explore Projects</h2>
    @endif
@endsection
@section('filter-tags')
    @if($searchType=='title')
        <div class="row">
            @if(!empty($filters))
                <h5 class="text--center"><b>Filters set:</b>
                    @if(array_has($filters,'department'))
                        Department: <a class="tag tag--danger tag--removable"
                                       href="{{  url("project?".str_replace( "department=".urlencode(Request::input('department')),'', parse_url( $_SERVER['REQUEST_URI'], PHP_URL_QUERY )))  }}"
                                       title="Remove Department Filter">{{$filters['department']}}</a>
                    @endif
                    @if(array_has($filters,'sponsor'))
                        Sponsor: <a class="tag tag--danger tag--removable"
                                    href="{{  url("project?".str_replace( "sponsor=".urlencode(Request::input('sponsor')),'', parse_url( $_SERVER['REQUEST_URI'], PHP_URL_QUERY )))  }}"
                                    title="Remove Sponsor Filter">{{$filters['sponsor']}}</a>
                    @endif
                    @if(array_has($filters,'type'))
                        Type: <a class="tag tag--danger tag--removable"
                                    href="{{  url("project?".str_replace( "type=".urlencode(Request::input('type')),'', parse_url( $_SERVER['REQUEST_URI'], PHP_URL_QUERY )))  }}"
                                    title="Remove Type Filter">{{$filters['type']}}</a>
                    @endif
                    @if(array_has($filters,'collaborators'))
                        Collaborators: <a class="tag tag--danger tag--removable"
                                    href="{{  url("project?".str_replace( "collaborators=".urlencode(Request::input('collaborators')),'', parse_url( $_SERVER['REQUEST_URI'], PHP_URL_QUERY )))  }}"
                                    title="Remove Collaborator Filter">{{$filters['collaborators']}}</a>
                    @endif
                </h5>
            @endif
        </div>
    @endif
@endsection
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
@section('featured-projects')
    @if(isset($featuredProjects) && !$featuredProjects->isEmpty() && !request()->all())
        <h2>Featured Projects</h2>
        <div class="row">
            @each('layouts.partials.project-panel',$featuredProjects, 'project' )
        </div>
    @endif
@endsection

@if(count($projects))
    @if($projects instanceof \Illuminate\Pagination\AbstractPaginator)
        @section('results-titles-and-abstracts')
            <div class="pagination-total">
              <small>{{ $projects->total() }} Results Found</small>
            </div>
            <br>
            <div class="row">
                @each('layouts.partials.project-panel',$projects, 'project' )
            </div>
        @endsection
    @else
        @section('recent-projects')
        <h2>Recent Projects</h2>
        <br>
        <div class="row">
            @each('layouts.partials.project-panel',$projects, 'project' )
        </div>
        @endsection
    @endif
    @section('pagination-links')
        @if($projects instanceof \Illuminate\Pagination\AbstractPaginator)
            <br>
            <br>
            <div class="row">
                <div class="col-sm-8">
                    <div class="list--unstyled">
                        {!! $projects->appends(Request::except('page'))->links() !!}
                    </div>
                </div>
            </div>
        @endif
    @endsection

@else
    @section('no-results-message')
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1>Your search did not return any results</h1>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-sm-12">
                    <p>We recommend you broaden your search.</p>
                </div>
                <br><br><br><br>
                <div class="col-sm-12">
                    <a href="{{ url("project") }}" class="btn btn-primary">See all Projects</a>
                </div>
            </div>
        </div>
    @endsection
@endif
@section('filter-selection-and-new-project-button')
    {{-- Only show this section when we are explicitly searching titles and abstracts.
        At the time of writing this, we are using Laravel 5.2, but in the future, if we update,
        I would change this section to the following:
         @includeWhen($searchType=='title','layouts.partials.filter-selection-and-new-project-button')
    --}}
    @if($searchType=='title')
        @include('layouts.partials.filter-selection-and-new-project-button')
    @endif
@endsection

@section('page-specific-scripts')
    <script type="text/javascript" src='{{asset('/js/sidebar.js')}}'></script>
@endsection