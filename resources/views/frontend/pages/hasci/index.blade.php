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
        @forelse($header as $v)
        <div class="col-md-12 pl-md-5 pb-2 pl-0 probootstrap-inside">
          <div class="jumbotron">
            <h1 class="display-4">{{$v->title}}</h1>
            <hr class="my-4">
            <p>{!!$v->content!!}</p>
          </div>
        </div>
        @empty
        <div class="col-md-12 pl-md-5 pb-2 pl-0 probootstrap-inside">
          <div class="jumbotron">
            <h1 class="display-4">Empty</h1>
            <hr class="my-4">
            <p class="text-danger">Not Found</p>
          </div>
        </div>
        @endforelse

        @forelse($body as $v)
        <div class="col-md-12 pl-md-5 pb-2 pl-0 probootstrap-inside">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title" style="color: black;">{{$v->title}}</h5>
              <div class="row">
                <div class="col-md-12">
                  <p class="card-text">
                  {!!$v->content!!}
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
        @empty
        <div class="col-md-12 pl-md-5 pb-2 pl-0 probootstrap-inside">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title" style="color: black;">Empty</h5>
              <div class="row">
                <div class="col-md-12">
                  <p class="card-text">
                  Not Found
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endforelse
        <div class="col-md-12 pl-md-5 pb-2 pl-0 probootstrap-inside">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title" style="color: black;">Perbedaan antara Metode Hair Stem cell Transplantation dengan metode Konvensional ( Strip , FUT , FUE, Laser )</h5>
              <table class="table table-sm">
                <thead>
                  <tr>
                    <th scope="col">KRITERIA</th>
                    <th scope="col">KONVENSIONAL</th>
                    <th scope="col">HAIR STEMCELL TRANSPLANTATION</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse($metode as $v)
                  <tr>
                    <td>{{$v->kriteria}}</td>
                    <td>{{$v->konvensional}}</td>
                    <td>{{$v->stemcell}}</td>
                  </tr>
                  @empty
                  <tr>
                    <td>Empty</td>
                    <td></td>
                    <td></td>
                  </tr>
                  @endforelse
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="col-md-12 pl-md-5 pb-5 pl-0 probootstrap-inside">
          <div class="row">
            <div class="col-md-4">
              <div class="card" style="width: 18rem;">
                <div class="card-body">
                  <h5 class="card-title">TVC HASCI at MNC TV</h5>
                  <div class="embed-responsive embed-responsive-1by1">
                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0" allowfullscreen></iframe>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card" style="width: 18rem;">
                <div class="card-body">
                  <h5 class="card-title">TVC HASCI at MNC TV</h5>
                  <div class="embed-responsive embed-responsive-1by1">
                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0" allowfullscreen></iframe>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card" style="width: 18rem;">
                <div class="card-body">
                  <h5 class="card-title">TVC HASCI at MNC TV</h5>
                  <div class="embed-responsive embed-responsive-1by1">
                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0" allowfullscreen></iframe>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection