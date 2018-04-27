@if(Request::is('home')) 
 <div class="tab-container">
  <ul class="tabs cf">
    <li class="tab__list">
      <a class="tab__link tab__link--active" href="home">Home</a>
    </li>
    <li class="tab__list">
      <a class="tab__link" href="projects">Projects</a>
    </li>
    <li class="tab__list">
      <a class="tab__link" href="publications">Publications</a>
    </li>
    <li class="tab__list">
      <a class="tab__link" href="committees">Committees</a>
    </li>
  </ul>
</div>
@endif
@if(Request::is('faculty_profile')) 
 <div class="tab-container">
  <ul class="tabs cf">
    <li class="tab__list">
      <a class="tab__link" href="home">Home</a>
    </li>
    <li class="tab__list">
      <a class="tab__link" href="projects">Projects</a>
    </li>
    <li class="tab__list">
      <a class="tab__link" href="publications">Publications</a>
    </li>
    <li class="tab__list">
      <a class="tab__link" href="committees">Committees</a>
    </li>
  </ul>
</div>
@endif

@if(Request::is('classes')) 
 <div class="tab-container">
  <ul class="tabs cf">
    <li class="tab__list">
      <a class="tab__link" href="home">Home</a>
    </li>
    <li class="tab__list">
      <a class="tab__link" href="projects">Projects</a>
    </li>
    <li class="tab__list">
      <a class="tab__link" href="publications">Publications</a>
    </li>
    <li class="tab__list">
      <a class="tab__link" href="committees">Committees</a>
    </li>
  </ul>
</div>
@endif

@if(Request::is('projects')) 
 <div class="tab-container">
  <ul class="tabs cf">
    <li class="tab__list">
      <a class="tab__link" href="home">Home</a>
    </li>
    <li class="tab__list">
      <a class="tab__link tab__link--active" href="projects">Projects</a>
    </li>
    <li class="tab__list">
      <a class="tab__link" href="publications">Publications</a>
    </li>
    <li class="tab__list">
      <a class="tab__link" href="committees">Committees</a>
    </li>
  </ul>
</div>
@endif

@if(Request::is('publications')) 
 <div class="tab-container">
  <ul class="tabs cf">
    <li class="tab__list">
      <a class="tab__link" href="home">Home</a>
    </li>
    <li class="tab__list">
      <a class="tab__link" href="projects">Projects</a>
    </li>
    <li class="tab__list">
      <a class="tab__link tab__link--active" href="publications">Publications</a>
    </li>
    <li class="tab__list">
      <a class="tab__link" href="committees">Committees</a>
    </li>
  </ul>
</div>
@endif


@if(Request::is('committees')) 
 <div class="tab-container">
  <ul class="tabs cf">
    <li class="tab__list">
      <a class="tab__link" href="home">Home</a>
    </li>
    <li class="tab__list">
      <a class="tab__link" href="projects">Projects</a>
    </li>
    <li class="tab__list">
      <a class="tab__link" href="publications">Publications</a>
    </li>
    <li class="tab__list">
      <a class="tab__link tab__link--active" href="committees">Committees</a>
    </li>
  </ul>
</div>
@endif




