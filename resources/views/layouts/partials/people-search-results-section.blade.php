{{--
This partial is for the section on the search results pages for faculty. it shows each member and a button to see more.
Requires the following variables:
Collection  $people             - A collection of members to show
string      $sectionHeading     - The title of the section for these people
string      $buttonHref         - The URL that you go to when you click on the  "See More Faculty" button.
--}}

<h2>{{ $sectionHeading }}</h2>
<div class="row">
    @if($people->isEmpty())
        <p>
        No matching faculty found.
        </p>
    @else
        <div class="pagination-total" style="padding-left: 15px">
            <small>{{$people->total()}} Results Found</small>
        </div>
        <div class="row">
            @foreach($people as $key=>$person)
                @include('layouts.partials.person-panel')
            @endforeach
        </div>
        @if(!empty($buttonHref) && $people->total() > $limit)
            <div class="col-sm-12">
                <div class="pull-right">
                    <a role="button"
                       href="{{ $buttonHref }}"
                       class="btn btn-primary">
                        See More Faculty
                    </a>
                </div>
            </div>
        @endif
    @endif
</div>