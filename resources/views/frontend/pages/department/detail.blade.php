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

  <section class="mb-2">
    <div class="container">
      <div class="row">
        <div class="col-md-6 mb-2">
          <h1 class="display-5">Service</h1>
          <p class="lead text-secondary">Beauty & Rejuvenation Treatment</p>
        </div>
      </div>
    </div>
  </section>
@endsection

@section('content')
  <section class="probootstrap-services">
    <div class="container">
      <div class="row no-gutters">
        <div class="col-md-3 pb-5 probootstrap-aside-stretch-left probootstrap-inside">
          <div class="mb-3 pt-5">
            <h2 class="h6">Services</h2>
            <ul class="list-unstyled probootstrap-light mb-4">
              @forelse($dept_list as $v)
              <li><a href="{{route('front-department-detail', $v->id)}}">{{$v->name}}</a></li>
              @empty
              <li><a href="#">Not Set</a></li>
              @endforelse
            </ul>
          </div>
        </div>
        <div class="col-md-9 pl-md-5 pb-5 pl-0 probootstrap-inside">
          <h1 class="mt-4 mb-4">{{$department->name}}</h1>
          <p>
            @forelse($dept_service as $v)
              @if($v->slug == 'hair-transplantation')
              <a style="padding: 0px 30px !important;" class="btn btn-primary" href="/hasci">{{$v->title}}</a>
              @else
              <button style="padding: 0px 30px !important;" class="btn btn-primary" type="button" data-toggle="collapse" data-target="#serv-{{$v->id}}" aria-expanded="false" aria-controls="multiCollapseExample2">{{$v->title}}</button>
              @endif
            @empty

            @endforelse
          </p>
          <div class="row">
            @forelse($dept_service as $v)
            <div class="col-12" id={{$v->dept_id}}>
              <div class="collapse" id="serv-{{$v->id}}" data-parent="#{{$v->dept_id}}">
                <div class="card card-body">
                  {!!$v->content!!}
                </div>
              </div>
            </div>
            @empty
            
            @endforelse
          </div>
          <p> 
            {!!$department->description!!}
          </p>
        </div>
      </div>
    </div>
  </section>
@endsection