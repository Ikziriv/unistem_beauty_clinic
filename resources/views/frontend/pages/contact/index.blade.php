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
        <div class="col-md-3 pb-5 probootstrap-aside-stretch-left probootstrap-inside">
          <div class="mb-3 pt-5">
            <h2 class="h6">Contact</h2>
            <ul class="list-unstyled probootstrap-light mb-4">
              <li class="active"><a href="#">Message</a></li>
            </ul>
          </div>
        </div>
        <div class="col-md-9 pl-md-5 pb-5 pl-0 probootstrap-inside">
          <h1 class="mt-4 mb-4">Get In Touch</h1>
          <div class="row">
            <div class="col-md-12">
              <form action="{{route('front-contact-send')}}" method="post" class="probootstrap-form">
                {{ csrf_field() }}
                <div class="form-group">
                  <label for="name" class="sr-only">Name</label>
                  <input type="text" class="form-control" name="name" id="name" placeholder="Enter your name">
                </div>
                <div class="form-group">
                  <label for="email" class="sr-only">Email</label>
                  <input type="text" class="form-control" name="email" id="email" placeholder="Enter your email">
                </div>
                <div class="form-group">
                  <label for="message" class="sr-only">Message</label>
                  <textarea name="message" id="message" cols="30" rows="10" class="form-control" placeholder="Write your message"></textarea>
                </div>
                <div class="form-group">
                  <input type="submit" class="btn btn-primary" value="Send Message">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection