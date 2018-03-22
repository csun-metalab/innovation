@if($errors->any())
  <div class="alert alert--danger alert-padd">
    <a href="#" class="alert__close" data-alert-close>&times;</a>
    <ul>
      <h3 style="padding-top: 7px;">Please correct the following errors before continuing:</h3>
      @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif
