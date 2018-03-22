<div class="row">
  <div class="container">
    <div class="row form__group">
      <div class="col-xs-5 col-md-4">
        {!! Form::label('searchType', 'Choose what to search for...', ['class'=>'sr-only']) !!}
        {!! Form::select('searchType',$dropdownTexts, $searchType,['id'=>'search-dropdown']) !!}
      </div>
      <div class="col-xs-5 col-md-7">
        {!! Form::text('query', request()->get('query') ?: null, [
          // Place holder text is different for different search types.
          'placeholder' => 'Type your search terms here...',
          'class'       => 'form-control',
          'style'       => 'margin-bottom: 20px'
        ]) !!}
      </div>

      <div class="col-xs-2 col-md-1">
        {!! Form::button('<i class="fa fa-search"></i>', ['title' => 'Submit Search','class' => 'btn btn-primary',
          'role' => 'button', 'type' => 'submit','style'=>'height:40px']) !!}
      </div>
    </div>
    <span class="pull-right">Browse All:
      <a class="btn-link" href="{{route('search.projects',['searchType'=>'title','collaborators'=>'student'])}}"> Student Opportunities</a>
      | <a class="btn-link" href="{{ route('browse.research-interests') }}">Research Interests and Themes</a>
    </span>
    <br>
    @include('layouts.partials.similar-search-terms')
    @yield('filter-tags')
  </div>
</div>
