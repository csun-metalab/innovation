@foreach($people as $person)
  @if ($person->primary_department)
    {{ $person->display_name }}
    <br />
    {{ $person->primary_department->department->display_name }}
    <br />
    <br />
  @endif
@endforeach
