@extends('frontend.home')

@section('header')
  <header role="banner" class="probootstrap-header py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-3 mb-4">
          <a href="#" class="mr-auto"><img src="{{url('_frontend/img/logo_text.png')}}" width="268" height="68" class="hires" alt="Unistem"></a>
        </div>  
        <div class="col-md-9">
          <div class="float-md-right float-none">
          <div class="probootstrap-contact-phone d-flex align-items-top mb-3 float-right text-right">
            <span class="probootstrap-text"> +6221 29629111 
              <small class="d-block"><a href="/appointment" class="arrow-link">Appointment <i class="icon-chevron-right"></i></a></small>
            </span><span class="icon ml-2"><a href="https://api.whatsapp.com/send?phone=15551234567"><i class="icon-phone"></i></a></span>
          </div>
          </div>
        </div>
      </div>
    </div>
  </header>

  <section class="probootstrap-features-1">
    <div class="container">
      <div class="row">
        <div class="col-md probootstrap-feature-item" style="background-image: url({{url('_frontend/img/model/model2.png')}});">
          <div class="probootstrap-feature-item-text">
            <span class="icon"><i class="flaticon-first-aid-kit display-4"></i></span>
            <h2>Beauty <span>Treatment</span></h2>
          </div>
        </div> 
        <div class="col-md probootstrap-opening">
          <h2 class="text-uppercase mb-3">Opening Hour <span>Medical Center</span></h2>
          <ul class="list-unstyled probootstrap-schedule">
            @forelse($open_hour as $v)
            <li>{{$v->days}} <span>{{$v->time}}</span></li>
            @empty
            <li>Mon-Fri <span>Not Set</span></li>
            <li>Sat <span>Not Set</span></li>
            <li>Sun <span>Not Set</span></li>
            @endforelse
          </ul>
        </div> 
        <div class="col-md probootstrap-feature-item" style="background-image: url({{url('_frontend/img/model/model1.png')}});">
          <div class="probootstrap-feature-item-text">
            <span class="icon"><i class="flaticon-gym-control-of-exercises-with-a-list-on-a-clipboard-and-heart-beats display-4"></i></span>
            
            <h2>Rejuvenation <span>Treatment</span></h2>
          </div>
        </div> 
      </div>
    </div>
  </section>
@endsection

@section('content')
  <section class="probootstrap-services" {{-- style="background-image: url({{url('img/gold-hclinic-2.jpg')}})" --}}>
    <div class="container">
      <div class="row no-gutters">
        <div class="col-md-3 pb-5 probootstrap-aside-stretch-left probootstrap-inside">
          <div class="mb-3 pt-5">
            <h2 class="h6">Appointment</h2>
            <ul class="list-unstyled probootstrap-light mb-4">
              <li class="active"><a href="/appointment">List</a></li>
            </ul>
          </div>
        </div>
        <div class="col-md-9 pl-md-5 pb-5 pl-0 probootstrap-inside">
          <h1 class="mt-4 mb-4">Appointment</h1><hr>
          <div class="row no-gutters">
          @php $doctor = App\Modules\Doctor\DoctorSub::all()->take(4); @endphp
          @forelse($doctor as $v)
            <a href="{{route('front-appointment-register', $v->id)}}" class="col-lg-3 col-md-3 col-sm-6 col-6 mr-2 prbootstrap-team">
              {{-- {{url('_frontend/images/person_1.jpg')}} --}}
              <img src="{{Storage::url($v['img_head'])}}" alt="Free Template by uicookies.com" class="img-fluid">
              <div class="probootstrap-person-text">
                <span class="title">{{$v->spesialis}}</span>
                <span class="name">{{$v->name}}</span>
              </div>
            </a>
          @empty
            <a href="#" class="list-group-item list-group-item-action">
              NOT FOUND
            </a>
          @endforelse
{{--           <div class="list-group">
          @forelse($doctor as $v)
            <a href="#" class="list-group-item list-group-item-action">
              {{$v->name}} / {{$v->spesialis}}
            </a>
          @empty
            <a href="#" class="list-group-item list-group-item-action">
              NOT FOUND
            </a>
          @endforelse
          </div> --}}
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection