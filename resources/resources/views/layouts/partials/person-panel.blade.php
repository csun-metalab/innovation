<div class="col-md-6 col-lg-4">
  <div class="panel type--center" style="background-color: #fff; padding:30px; display: block; text-decoration: none;">
    <div class="panel__content" style="padding:0;">
      <div class="faculty-load-panel" style="height: 80px;">
        <img class="img--circle load--icon"
             alt="{{$person->display_name}}'s profile icon"
             width="80px"
             src=""
             data-id="{{ $person->email }}"
             id="{{ $person->escaped_email_uri }}"
             hidden
        />
        <i class="fa fa-spinner fa-spin fa-5x" style="color:#d00d2d"></i>
      </div>
      <p class="h5 type--marginless" style="color:#4a4a4a;"><strong> {{ $person->display_name }} </strong></p>
      <p class="type--red" style="height: 25px">
        {{-- This displays the user's primary department, if there is at least an academic department associated with the user. --}}
        @if ($person->primary_department)
          {{ $person->primary_department->department->display_name }}
        @endif
      </p>
      @if(isset($person->relatedSearchTerms))
        <p>
            {{-- Display related research interests if there is a query --}}
            {{ str_limit($person->relatedSearchTerms->sortByDesc('count')->implode('title', ', '), $RELATED_INTEREST_CHAR_LIMIT) }}
        </p>
      @endif
      <br>
      <a role="button" class="btn btn-default btn-sm" href="{{$person->profile_url()}}">
        View Profile
      </a>
      <a role="button" class="btn btn-default btn-sm" href="{{ route('search.projects', ['member' => $person->user_id]) }}">
        View Projects
      </a>
    </div>
  </div>
</div>
