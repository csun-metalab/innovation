<div class="cd-filter">
    <form>
{{--         <div class="cd-filter-block ">
            {!! Form::label('sponsor','Filter by Sponsor')!!}
            <div class="cd-filter-content">
                {!! Form::select('sponsor', $filters['sponsor'] , request()->get('sponsor') ?: null, ['placeholder'=> 'Sponsor...','class' => 'select2-sponsor' , 'style' => 'width: 100%'])!!}
            </div>
        </div> --}}
{{--         <div class="cd-filter-block">
            {!! Form::label('department','Filter by Department')!!}
            <div class="cd-filter-content">
                {!! Form::select('department', $filters['departments'] , request()->get('department') ?: null, ['placeholder' => 'Department...','class' => 'select2-departments' , 'style' => 'width: 100%'])!!}
            </div>
        </div>
        <div class="cd-filter-block">
            {!! Form::label('type','Filter by Type')!!}
            <div class="cd-filter-content">
                {{ Form::select ('type', $filters['purposes'], request()->get('type')?: null,['class'=>'members select2-types', 'placeholder' => 'Type...', 'style' => 'width: 100%'] ) }}
            </div>
        </div> --}}
        <div class="cd-filter-block">
            {!! Form::label('collaborators','Filter by Seeking Collaborators')!!}
            <div class="cd-filter-content">
                {{ Form::select ('collaborators', $filters['collaborators'], request()->get('collaborators')?: null,['class'=>'select2-collaborators', 'placeholder' => 'Collaborators...', 'style' => 'width: 100%'] ) }}
            </div>
        </div>

        <div class="cd-filter-block">
            {!! Form::button('Apply Filter', ['title' => 'Filter Projects','class' => 'btn btn-primary pull-right', 'role' => 'button', 'type' => 'submit']) !!}
            <a title="Clear Filters" class="pull-left" href="{{ url('/project') }}">Clear Filters</a>
        </div>
        <br><br>
    </form>
    <a title="Close" class="cd-close">Close</a>
</div>
@if( request()->filled('sponsor') || request()->filled('department') || request()->filled('member') || request()->filled('collaborators'))
    <a title="Filters Set" class="cd-filter-trigger cd-filter-on"><i class="fa fa-filter"></i> Filters
        Set</a>
@else
    <a title="Filters" class="cd-filter-trigger"><i class="fa fa-filter"></i> Filters</a>
@endif
<a title="Add New Project" href="{{ url('project/create') }}" class="cd-filter-trigger-right"><i
            class="fa fa-plus"></i> Add a new project</a>