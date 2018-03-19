{{--
This partial is for the section on the search results pages for projects. it shows each project and a button to see more
Requires the following variables:
Collection  $projects           - A collection of projects to show
string      $sectionHeading     - The title of the section for these projects
string      $buttonHref         - The URL that you go to when you click on the  "See More Projects" button.
--}}
<h2>{{ $sectionHeading }}</h2>
<div class="row">
    @if($projects->isEmpty())
        <p>
        No matching projects found.
        </p>
    @else
        <div class="pagination-total" style="padding-left: 15px">
            <small>{{$projects->total()}} Results Found</small>
        </div>
        <div class="row">
            @foreach($projects as $key=>$project)
                @include('layouts.partials.project-panel' )
            @endforeach
        </div>
        @if(!empty($buttonHref) && $projects->total() > $limit)
            <div class="col-sm-12">
                <div class="pull-right">
                    <a role="button"
                       href="{{ $buttonHref }}"
                       class="btn btn-primary">
                        See More Projects
                    </a>
                </div>
            </div>
        @endif
    @endif
</div>