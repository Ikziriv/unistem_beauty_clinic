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
          <div class="probootstrap-contact-phone d-flex align-items-top mb-3 float-left">
            <span class="icon mr-2"><i class="icon-phone"></i></span>
            <span class="probootstrap-text"> +6221 29629111 <small class="d-block"><a href="/appointment" class="arrow-link">Appointment <i class="icon-chevron-right"></i></a></small></span>
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
            <h2 class="h6">Categories</h2>
            <ul class="list-unstyled probootstrap-light mb-4">
              @forelse($category as $v)
              <li><a href="{{route('front-blog-list', $v->id)}}">{{$v->name}}</a></li>
              @empty
              <li><a href="#">Not Set</a></li>
              @endforelse
            </ul>
          </div>
        </div>
        <div class="col-md-9 pl-md-5 pb-5 pl-0 probootstrap-inside">
          <h1 class="mt-4 mb-4">Blogs</h1> <small>Categories " - "</small><hr>
          <div class="row no-gutters">
          @forelse($blog as $v)
            <a href="{{route('front-blog-detail', $v->id)}}" class="col-lg-4 col-md-4 col-sm-6 col-6 prbootstrap-team">
              <img src="{{url('_frontend/images/person_1.jpg')}}" alt="Free Template by uicookies.com" class="img-fluid">
              <div class="probootstrap-person-text">
                <span class="title text-left">{{$v->title}}</span>
                <span class="name text-left"><small>{{$v->category->name}}</small></span>
              </div>
            </a>
          @empty
            <div class="col-lg-12 col-md-12 col-sm-6 col-6 prbootstrap-team">
              <div class="probootstrap-person-text">
                <span class="title">Not Set</span>
                <span class="name">404</span>
              </div>
            </div>
          @endforelse
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection