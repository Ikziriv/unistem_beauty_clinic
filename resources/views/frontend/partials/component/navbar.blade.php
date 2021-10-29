  <nav class="navbar navbar-expand-lg navbar-dark bg-dark probootstrap-navbar-dark">
    <div class="container">
      <!-- <a class="navbar-brand" href="index.html">Health</a> -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#probootstrap-nav" aria-controls="probootstrap-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="probootstrap-nav">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item {{ Route::currentRouteName() == 'welcome' ? 'active' : '' }}">
            <a href="{{route('welcome')}}" class="nav-link pl-0">Home</a>
          </li>
          <li class="nav-item {{ Route::currentRouteName() == 'front-department' ? 'active' : '' }}">
            <a href="{{route('front-department')}}" class="nav-link">Service</a>
          </li>
          <li class="nav-item {{ Route::currentRouteName() == 'front-blog' ? 'active' : '' }}">
            <a href="{{route('front-blog')}}" class="nav-link">Blog</a>
          </li>
          <li class="nav-item {{ Route::currentRouteName() == 'front-gallery' ? 'active' : '' }}">
            <a href="{{route('front-gallery')}}" class="nav-link">Gallery</a>
          </li>
          <li class="nav-item {{ Route::currentRouteName() == 'front-about' ? 'active' : '' }}">
            <a href="{{route('front-about')}}" class="nav-link">About</a>
          </li>
          <li class="nav-item {{ Route::currentRouteName() == 'front-contact' ? 'active' : '' }}">
            <a href="{{route('front-contact')}}" class="nav-link">Contact</a>
          </li>
          <li class="nav-item {{ Route::currentRouteName() == 'front-appointment' ? 'active' : '' }}">
            <a href="{{route('front-appointment')}}" class="nav-link">Plan Schedule</a>
          </li>
        </ul>
        <div class="ml-auto">
          <form action="#" method="get" class="probootstrap-search-form mb-sm-0 mb-3">
            <div class="form-group">
              <button class="icon submit"><span class="icon-magnifying-glass"></span></button>
              <input type="text" class="form-control" placeholder="Search">
            </div>
          </form>
        </div>
      </div>
    </div>
  </nav>