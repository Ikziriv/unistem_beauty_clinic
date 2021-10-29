<!DOCTYPE html>
<html lang="en">
<head>
  <title>Unistem International</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="RID" />
  
  <link id="favicon" rel="shortcut icon" href="{{url('_frontend/img/logo.png')}}" type="image/png">
  <link href="https://fonts.googleapis.com/css?family=Work+Sans" rel="stylesheet">
  @include('frontend.partials.assets.css.index')
  
  @yield('style')
</head>
<body>
  @include('frontend.partials.component.navbar')
  <!-- END nav -->
  @include('frontend.pages.home.partials.header')

  @yield('content')

{{--   <section class="probootstrap-section overlay bg-image" style="background-image: url({{url('_frontend/images/bg_1.jpg')}})">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
          <h2 class="text-white display-4">Specialists in Family  Healthcare</h2>
          <p class="text-white mb-5 lead">Far far away, behind the word mountains, far from the countries Vokalia.</p>
          <div class="row justify-content-center mb-5">
            <div class="col-md-4"><a href="/appointment" class="btn btn-secondary btn-block">Appointment <span class="icon-arrow-right"></span></a></div>
          </div>
        </div>
      </div>
    </div>
  </section> --}}

{{--   <section class="probootstrap-section" id="section-counter">
      <div class="container">
        <div class="row">
          <div class="col-md probootstrap-animate">
            <div class="probootstrap-counter text-center">
              <span class="probootstrap-number" data-number="22">0</span>
              <span class="probootstrap-label">Founders</span>
            </div>
          </div>
          <div class="col-md probootstrap-animate">
            <div class="probootstrap-counter text-center">
              <span class="probootstrap-number" data-number="182">0</span>
              <span class="probootstrap-label">Number of Staffs</span>
            </div>
          </div>
          <div class="col-md probootstrap-animate">
            <div class="probootstrap-counter text-center">
              <span class="probootstrap-number" data-number="8921">0</span>
              <span class="probootstrap-label">Happy Patients</span>
            </div>
          </div>    
          <div class="col-md probootstrap-animate">
            <div class="probootstrap-counter text-center">
              <span class="probootstrap-number" data-number="252">0</span>
              <span class="probootstrap-label">Business Partner</span>
            </div>
          </div>    
        </div>
      </div>
      
    </section> --}}

  <section class="probootstrap-subscribe">
    <div class="container">
      <div class="row mb-5">
        <div class="col-md-12">
          <h2 class="h1 text-white">Subscribe Newsletter</h2>
          <p class="lead text-white">Far far away, behind the word mountains, far from the countries Vokalia.</p>
        </div>
      </div>
      <form action="#" method="post">
        <div class="row">
          <div class="col-md-4">
            <input type="text" class="form-control" placeholder="Name">    
          </div>
          <div class="col-md-4 mb-md-0 mb-3">
            <input type="text" class="form-control" placeholder="Email">
          </div>
          <div class="col-md-4">
            <input type="submit" value="Subscribe" class="btn btn-primary btn-block">
          </div>
        
        </div>
      </form>
    </div>
  </section>


  @include('frontend.partials.component.footer')
  <!-- loader -->
  <div id="probootstrap-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#e1b12c"/></svg></div>
  

  @include('frontend.partials.assets.js.index')
  <script type="text/javascript">
     $('#myCarousel').carousel({
        interval: 3000,
     })
  </script>
  
</body>
</html>