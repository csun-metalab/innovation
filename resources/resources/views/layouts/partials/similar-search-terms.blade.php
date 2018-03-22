{{-- This checks if you are searching for research interests. --}}
@if (isset($similarSearchTerms))
  <div class="row">
    <div class="col-md-12">
      <ul class="list--inline">
        @if (count($similarSearchTerms) > 0)
          Similar Research Interests and Themes:
        @endif
        @foreach($similarSearchTerms as $term)
          {{-- This is the code to return it back to a state where number of search hits are not displayed--}}
          {{--<li><a href="{{Route::current()->uri."?query=".$term->first()->title}}">
            {{ $term->first()->title }}</a>
          </li>--}}
          {{-- Similar search terms with how many hits there are based on count in the the database--}}
          <li><a href="{{Route::current()->uri."?query=".$term->first()->title}}">{{ $term->first()->title."
            (".$term->sum('count').")" }}</a></li>
        @endforeach
      </ul>
    </div>
  </div>

@endif
