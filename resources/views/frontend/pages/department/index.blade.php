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

{{--   <section class="mb-2">
    <div class="container">
      <div class="row">
        <div class="col-md-6 mb-2">
          <h1 class="display-5">Departments</h1>
          <p class="lead text-secondary">Beauty & Rejuvenation Treatment</p>
        </div>
      </div>
    </div>
  </section> --}}
@endsection

@section('content')
  <section class="probootstrap-services">
    <div class="container">
      <div class="row no-gutters">
        <div class="col-md-3 pb-5 probootstrap-aside-stretch-left probootstrap-inside">
          <div class="mb-3 pt-5">
            <h2 class="h6">Services</h2>
            <ul class="list-unstyled probootstrap-light mb-4">
              @forelse($department as $v)
              <li><a href="{{route('front-department-detail', $v->id)}}">{{$v->name}}</a></li>
              @empty
              <li><a href="#">Not Set</a></li>
              @endforelse
            </ul>
          </div>
        </div>
        @forelse($service as $v)
        <div class="col-md-9 pl-md-5 pb-5 pl-0 probootstrap-inside">
          <h1 class="mt-4 mb-4">{{$v->title}}</h1>
          <p>{!!$v->content!!}</p>
        </div>
        @empty
        <div class="col-md-9 pl-md-5 pb-5 pl-0 probootstrap-inside">
          <h1 class="mt-4 mb-4">Empty</h1>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odio maxime vitae laudantium, temporibus voluptates! Quia quaerat, repudiandae illo dicta esse expedita, sit. Vero minus doloribus assumenda libero pariatur ea ad.</p>
        </div>
        @endforelse
      </div>
    </div>
  </section>
@endsection