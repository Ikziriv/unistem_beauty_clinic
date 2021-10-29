@extends('backend.admin')

@section('style')
<style type="text/css">
  img { height: 120px;}
  .object-fit_fill { object-fit: fill }
  .object-fit_contain { object-fit: contain }
  .object-fit_cover { object-fit: cover }
  .object-fit_none { object-fit: none }
  .object-fit_scale-down { object-fit: scale-down }
  #img_fit{
    float: left;
    width: 40%;
    margin: 0 30px 20px 0; display: block;
  }
</style>
@endsection

@section('content')
<section class="row">
  <div class="col-sm-12">
      @include('backend.partials.notif.error')
      @include('backend.partials.notif.success')
      <section class="row">
          <div class="col-sm-12">

            <div class="card text-center">
              <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                  <li class="nav-item">
                    <a class="nav-link active" href="{{route('client')}}">Back</a>
                  </li>
                </ul>
              </div>
              
              <div class="card-block">
                <div class="d-flex justify-content-center">
                  <div class="card text-left" style="border-style: none;">
                    <div class="card-body">
                      <section class="row">
                          <div class="col-sm-12">
                            <div class="card">
                              <img class="img-fluid card-img-top" style="height: 100%;" src="{{$client['profile_picture']}}" data-holder-rendered="true">
                              <div class="card-block">
                                <br>
                                <div class="card-body">
                                  <h4 class="card-title">{{$client['name']}}</h4>
                                  <h5 class="card-title">{{$client['phone_number']}}</h5>
                                  <p class="card-text">{{ $client['address'] }}</p>
                                </div>
                              </div>
                              <div class="card-footer">
                                {{$client['created_at']}}
                              </div>
                            </div>
                          </div>
                          
                      </section>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </section>
      <section class="row">
          {{-- <div class="col-12 mt-1 mb-4">Template by <a href="https://www.medialoot.com">Medialoot</a></div> --}}
      </section>
  </div>
</section>
@endsection

@section('javascript')
<script type="text/javascript">
  $('#bs-example-navbar-collapse-1').on('show.bs.collapse', function() {
    $('.nav-pills').addClass('nav-stacked');
  });

  //Unstack menu when not collapsed
  $('#bs-example-navbar-collapse-1').on('hide.bs.collapse', function() {
      $('.nav-pills').removeClass('nav-stacked');
  });
</script>
@endsection