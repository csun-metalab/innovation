<div class="col-sm-6 col-md-6 col-lg-4 mw--250">
  <div class="panel bg--white">
        <div class="panel__content mh--400">
          <p><strong><a title="{{ ("$project->project_title") }}" class="color--grey"
                        href="{{ url("project/$project->slug") }}">{!! $project->project_title !!}</a></strong></p>
          {{-- This is an attempt to fill up the card as much as possible. --}}
          <p>{!! str_limit($project->abstract, 450 - strlen($project->project_title), '...') !!}</p>
          <div>
            @if(isset($project->relatedSearchTerms))
              {{-- Added this just in case there's a long word that exceeds the card's borders --}}
              <p style="overflow-wrap: break-word">
                Project {{ str_plural('Theme', $project->relatedSearchTerms->count()) }}:
                {{-- Display related research interests if there is a query --}}
                {!! str_limit($project->relatedSearchTerms->sortByDesc('count')->implode('title', ', ')) !!}
              </p>
            @endif
          </div>
        </div>
        <div class="panel__footer mh--58">
          @if($project->pi )
            <div class="dropdown footer-styling" style="height: 36px">
              <a title="&nbsp;&nbsp;{{$project->pi->display_name}}" class="color--grey nodeco"><img
                  {{-- Also there was a screwy thing here. Basically the id needs to be unique,
                  so I obfuscated the project id and appended its current context's index (because the same project
                  might appear twice, once in each list, but it probably won't). --}}
                  id="profile-img-{{obfuscateId($project->project_id).$key.'project'}}"
                  data-id="{{$project->pi->email}}"
                  class="load--icon profile--icon"
                  src=""
                  alt="{{$project->pi->display_name}}'s Profile Icon"
                  hidden
                />&nbsp;&nbsp;
                <i class="fa fa-spinner fa-spin fa-3x" style="color:#d00d2d"></i>
                {!!$project->pi->display_name!!}
              </a>
              <div class="dropdown-content">
                <li>
                  <a title="View projects by {{ $project->pi->display_name }}"
                     href="{{ route('search.projects', ['member' => $project->pi->user_id]) }}"
                     class="color--grey nodeco">View <b>{!! $project->pi->display_name !!}</b>'s Projects</a>
                </li>
                <li>
                  <a title="View Profile" href="{{$project->pi->profile_url()}}" class="color--grey nodeco">View
                    <b>{!! $project->pi->display_name !!}</b>'s Profile</a>
                </li>
              </div>
            </div>
          @endif
        </div>
    </div>
</div>

