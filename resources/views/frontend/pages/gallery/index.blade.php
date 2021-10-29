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
          <h1 class="display-5">Contact Us</h1>
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
        <div class="col-md-12 pb-5 pl-0 probootstrap-inside">
          <div class="card-columns">
            <div class="card">
              <img class="card-img" src="{{asset('img/new/1/r1.jpeg')}}" alt="Card image">
            </div>
            <div class="card">
              <img class="card-img" src="{{asset('img/new/1/r2.jpeg')}}" alt="Card image">
            </div>
            <div class="card">
              <img class="card-img" src="{{asset('img/new/1/r4.jpeg')}}" alt="Card image">
            </div>
            <div class="card">
              <img class="card-img" src="{{asset('img/new/1/d1.jpg')}}" alt="Card image">
            </div>
            <div class="card">
              <img class="card-img" src="{{asset('img/new/1/d2.jpg')}}" alt="Card image">
            </div>
            <div class="card">
              <img class="card-img" src="{{asset('img/new/1/d3.jpg')}}" alt="Card image">
            </div>
            <div class="card">
              <img class="card-img" src="{{asset('img/new/1/d4.jpg')}}" alt="Card image">
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection