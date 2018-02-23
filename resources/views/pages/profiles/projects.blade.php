@extends('layouts.master')
@section('navTitle')
Profiles
@stop

@section('content')

@include('pages.profiles.profile')
<div class="section">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          @include('layouts.sub_nav')
        </div>
      </div>

  <div class="section">
  
    <div class="container">
      <div class="row">
  
        <div class="col-md-3">
 

          <p class="header--sm"><strong>Role</strong></p>
          <form action="">
            <ul class="list--unstyled">
              <li>
                <label for="" style="font-weight: normal;"><input type="checkbox" checked> Lead Principal Investigator</label>
              </li>
              <li>
                <label for="" style="font-weight: normal;"><input type="checkbox" checked> Co-Principal Investigator</label>
              </li>
              <li>
                <label for="" style="font-weight: normal;"><input type="checkbox" checked> Principal Investigator</label>
              </li>
              <li>
                <label for="" style="font-weight: normal;"><input type="checkbox" checked> Investigator</label>
              </li>
            </ul>
          </form>

          <hr>

          <p class="header--sm"><strong>Project Type</strong></p>
          <form action="">
            <select>
              <option value="">-- Select Type --</option>
              <option value="1">Funded Projects</option>
              <option value="2">Active Projects</option>
              <option value="3">Graduate Projects</option>
            </select>
          </form>
          <br>

        </div>
        <div class="col-md-9">
          <div class="row">
          <?php for ($i=0; $i < 10; $i++) { ?>
            <div class="col-md-6 col-xl-4">
              <div class="panel">
                <div class="panel__img" style="background-color: #ccc;height: 150px;"></div>
                <div class="panel__content">
                  <p><strong>Project Title</strong></p>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam voluptatem harum cupiditate quae aliquid quia optio suscipit ex temporibus adipisci.</p>
                </div>
              </div>
            </div>
          <?php } ?>
            <div class="col-sm-12">
              <br>
              <ul class="pagination">
                <li class="disabled"><span>«</span></li>
                <li class="active"><span>1</span></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li class="disabled"><span>...</span></li>
                <li><a href="">20</a></li>
                <li><a href="#">21</a></li>
                <li><a href="#" rel="next">»</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  @stop
