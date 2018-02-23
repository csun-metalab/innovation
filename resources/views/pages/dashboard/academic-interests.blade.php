@extends('layouts.master')

@section('styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
<div id="loading__screen"></div>
<div class="section">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
      <a class="btn btn-default" style="float:right;" href="{{ url('project/step-1') }}">Add a New Project</a>
        <h1 class="type--header type--thin">Scholarship Dashboard</h1>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-3">
        @include("layouts.partials.admin-sidebar")
      </div>
        <div class="col-lg-9">
            {{-- Displays flash messages associated with interests --}}
            <div class="flash-message">
                @foreach (['danger', 'success'] as $message)
                    @if(session()->has($message))
                        <div class="alert alert--{{ $message }}">
                            <strong>{{ session($message) }}</strong>
                            <a href="#" class="alert__close" data-alert-close>&times;</a>
                        </div>
                    @endif
                @endforeach
            </div>
            {{ Form::open(['class' => 'interests' , 'url' => route('academic-interest.store')]) }}
            <div class="row">
                <div class="form__group">
                    <div class="col-sm-12">
                        @if (count($currentInterests) > 0)
                            <h2 class="type--thin">Current Academic Interests</h2>
                            @foreach($currentInterests as $interest)

                                <a class="tag tag--danger tag--normal tag--removable interest"
                                   href="{{ route('academic-interest.destroy', ['id' => $interest->expertise_id ]) }}"
                                   title="{{ 'Remove '.$interest->research_interest->hierarchy.'-'.$interest->research_interest->title }}">
                                    {{ $interest->research_interest->title }}
                                </a>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <h2 class="type--thin">Add Academic Interests</h2>
                </div>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <div class="form__group">
                    {{ Form::label('Academic Discipline') }}
                    {{ Form::select('category', $categories , null, ['class' => 'category select2-category', 'data-type' => 'category'] ) }}
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form__group">
                    {{ Form::label('Sub-discipline') }}
                    {{ Form::select('subcategory', $subcategories, null, ['class' => 'subcategory select2-category', 'data-type' => 'subcategory']) }}
                </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
                <div class="form__group">
                    {{ Form::label('Add specific interests')}}
                    {{ Form::select('tags[]',$tags, null, ['class' => 'select2-tags tags form__group', 'multiple' => 'multiple']) }}
                </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-3">
              {{Form::submit('Add interests', ['class' => 'btn btn-primary'])}}
            </div>
          </div>
          {{ Form::close() }}
        </div>
      </div>
    </div>
  </div>
</div>

{!! Html::script('js/metaphor.js') !!}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script type="text/javascript">

    // when nothing happens
    $('.category').select2({
        placeholder: 'Select a category...'
    });

    $('.subcategory').select2({
        placeholder: 'Select a subcategory...'
    });

    @if(session('new-project.interests'))
        $.getJSON("{{ request()->url() }}", function(interests){
            if(interests.length > 0)
            {
                interests.forEach(function(interest){
                    $('.select2-tags').append($('<option/>', {
                        value: interest.value,
                        text: interest.text,
                        selected: true
                    }));
                })
            }
        });
    @endif

    // Select2 Options for interests
    $(".select2-tags").select2({
        allowClear: true,
        createTag: function(tag){
            var newTagText = $.trim(tag.term);
            return {
                id: newTagText + '--' + $('.subcategory option:selected').val() + '--' + $('.subcategory option:selected').text(),
                text: newTagText
            };
        },
        language: {
            noResults: function(){
                return 'No results found. Create your own by typing the Academic Interest and then pressing Enter...';
            }
        },
        placeholder: 'Select your Academic Interests...',
        tags: true,
    }).on('select2:selecting', function(event){
        $('<option/>', {
            id: event.params.args.data.id + '--' + event.params.args.data.text,
            value: event.params.args.data.id + '--' + event.params.args.data.text,
            text: event.params.args.data.text,
            selected: true
        }).appendTo(this);
        $(this).find('option[value="' + event.params.args.data.id + '"]').remove();
    }).on('change', function(){
        if(!$(this).siblings('ul').children('li:last-child').is(':visible'))
        {
            $(this).siblings('ul').children('li:last-child').show();
        }
        $(this).siblings('ul').children('li:last-child').html('&#183 Saving...');
        setTimeout($.proxy(function(){
            $(this).siblings('ul').children('li:last-child').html('&#183 Saved!').delay(100).fadeOut();
        }, this), 300);
    });

    // Prevent the user from clicking on everything
    $(".interest").click(function() {
        $(".interest").off("click").each(function() {
            $(this).click(function(e) {
                e.preventDefault();
            })
        });
        showDeleting($(this));
    });

    // This removes text and replaces with spinner
    function showDeleting(elem) {
        elem.html('<i class="fa fa-spinner fa-spin"></i> Deleting').removeClass('tag--removable');;
    }

</script>
{!! Html::script('js/scripts.js') !!}
@stop







