@extends('frontend.home')

@section('content')
  <section class="probootstrap-services">
    <div class="container">
      <div class="row no-gutters">
        <div class="col-md-3 probootstrap-aside-stretch-left" style="background: #fff !important;">
          <div class="mb-3">
            <h2 class="h6 text-black">Departments</h2>
            <ul class="list-unstyled probootstrap-light mb-4">
              @forelse($department as $v)
              <li><a href="{{route('front-department-detail', $v->id)}}"><b>{{$v->name}}</b></a></li>
              @empty
              <li><a href="#">Not Set</a></li>
              @endforelse
            </ul>
            <p><a href="/department" class="arrow-link text-black">More departments  <i class="icon-chevron-right"></i></a></p>
          </div>
        </div>
        <div class="col-md-9 pl-md-5 pl-0">
          <div class="row">
              
              <div class="col-lg-4 col-md-6">
                <div class="media d-block mb-4 text-left probootstrap-media">
                  <div class="probootstrap-icon mb-3"><span class="flaticon-price-tag display-4"></span></div>
                  <div class="media-body">
                    <h3 class="h5 mt-0 text-secondary">Medical Pricing</h3>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia.</p>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-6">
                <div class="media d-block mb-4 text-left probootstrap-media">
                  <div class="probootstrap-icon mb-3"><span class="flaticon-shield-with-cross display-4"></span></div>
                  <div class="media-body">
                    <h3 class="h5 mt-0 text-secondary">Quality &amp; Safety</h3>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia.</p>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-6">
                <div class="media d-block mb-4 text-left probootstrap-media">
                  <div class="probootstrap-icon mb-3"><span class="flaticon-first-aid-kit display-4"></span></div>
                  <div class="media-body">
                    <h3 class="h5 mt-0 text-secondary">Immidiate Service</h3>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia.</p>
                  </div>
                </div>
              </div>

              <div class="col-lg-4 col-md-6">
                <div class="media d-block mb-4 text-left probootstrap-media">
                  <div class="probootstrap-icon mb-3"><span class="flaticon-microscope display-4"></span></div>
                  <div class="media-body">
                    <h3 class="h5 mt-0 text-secondary">Cutting-Edge Equipment</h3>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia.</p>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-6">
                <div class="media d-block mb-4 text-left probootstrap-media">
                  <div class="probootstrap-icon mb-3"><span class="flaticon-gym-control-of-exercises-with-a-list-on-a-clipboard-and-heart-beats display-4"></span></div>
                  <div class="media-body">
                    <h3 class="h5 mt-0 text-secondary">Personalized Treatment</h3>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia.</p>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-6">
                <div class="media d-block mb-4 text-left probootstrap-media">
                  <div class="probootstrap-icon mb-3"><span class="flaticon-doctor display-4"></span></div>
                  <div class="media-body">
                    <h3 class="h5 mt-0 text-secondary">Experience Physicians</h3>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia.</p>
                  </div>
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>
  </section>
  
  <section class="probootstrap-blog-appointment">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-left">
          <h2 class="h1">Make an Appointment</h2>
          <p class="lead text-secondary">Let's booked your schedule with profesional doctor.</p>
        </div>
      </div>
      <div class="row no-gutters">
        <div class="col-md-6 probootstrap-aside-stretch-left" >
          <form action="{{route('front-appointment-send')}}" method="POST" class="probootstrap-form-appointment">
            {{ csrf_field() }}
            <div class="form-group">
              <input type="text" class="form-control" name="name" placeholder="Your Name">
            </div>
            <div class="form-group">
              <input type="email" class="form-control" name="email" placeholder="Your Email">
            </div>
            <div class="form-group">
              <span class="icon"><i class="icon-calendar"></i></span>
              <input type="text" id="probootstrap-date" class="form-control" name="scheduled_time" placeholder="Appointment Date">
            </div>
            <div class="form-group">
              <textarea class="form-control" name="message" id="" cols="30" rows="10" placeholder="Write your message"></textarea>
            </div>
            <div class="form-group mt-2">
              <input type="submit" value="Submit Form" class="btn btn-sm btn-block btn-primary">
            </div>
          </form>
        </div>
        <div class="col-md-6 pl-md-5 pl-0">
          <h2 class="h1 text-right">Testimonial</h2><hr>
          <ul class="list-unstyled">
            <li>
              <div class="clearfix">
                <div class="float-left">
                  <h3>Yully</h3>
                </div>
                <div class="float-right">
                  <small class="date"><small>November 15, 2017</small></small>
                </div>
              </div>
              <p>
                "Facial gold nya enak banget, kulit wajah terlihat lebih segar dan kencang seketika setelah perawatan facial ini. Wajib coba de Facial gold nya!"</p>
            </li>
            <li>
              <div class="clearfix">
                <div class="float-left">
                  <h3>Yully</h3>
                </div>
                <div class="float-right">
                  <small class="date"><small>November 15, 2017</small></small>
                </div>
              </div>
              <p>
                "Facial gold nya enak banget, kulit wajah terlihat lebih segar dan kencang seketika setelah perawatan facial ini. Wajib coba de Facial gold nya!"</p>
            </li>
          </ul>
          <hr>
          <p><a href="#" class="arrow-link">View All  <i class="icon-chevron-right"></i></a></p>
        </div>
      </div>
    </div>
  </section>

  <section class="probootstrap-section bg-light">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-left">
          <h2 class="h1">Our Blog</h2>
          <p class="lead text-secondary">Far far away, behind the word mountains, far from the countries Vokalia.</p>
        </div>
      </div>
      <div class="row no-gutters">
        <a href="{{route('front-blog')}}" class="col-lg-3 col-md-3 col-sm-6 col-6 prbootstrap-team">
          <div class="probootstrap-person-text text-left">
            <span class="name">Title Blog</span>
            <span class="title">Description</span>
          </div>
          <img src="{{url('_frontend/images/person_1.jpg')}}" alt="Free Template by uicookies.com" class="img-fluid">
        </a>
      </div>
    </div>
  </section>
@endsection