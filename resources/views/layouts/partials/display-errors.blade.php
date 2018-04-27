@if($errors->any())
  <div class="alert alert--danger alert-padd">
    <a href="#" class="alert__close" data-alert-close>&times;</a>
    <ul>
      <h4 style="padding-top: 7px;">Please correct the following errors before submitting:</h5>
      @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif
