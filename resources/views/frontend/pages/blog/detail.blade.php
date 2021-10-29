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
          <h3 class="mt-4 mb-4">{{$blog->title}}</h3>
          <img src="{{Storage::url($blog['img_path'])}}" class="img-fluid">
          <p><small>{{$blog->sub_title}}</small>
            <br> {!!$blog->content!!} </p>
          <p class="mt-3">
            <like
              likes_count="{{ $post->likes_count }}"
              liked="{{ $post->isLiked() }}"
              item_id="{{ $post->id }}"
              item_type="posts"
              logged_in="{{ Auth::check() }}"
            ></like>
          </p>
          <hr>
          @include('frontend.pages.comment.list')
        </div>
      </div>
    </div>
  </section>
@endsection