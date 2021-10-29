@extends('backend.admin')

@section('style')
<style type="text/css">

</style>
@endsection

@section('content')
<section class="row">
  <div class="col-sm-12">
      @include('backend.partials.notif.error')
      @include('backend.partials.notif.success')
      <section class="row">
          @include('backend.pages.menu._partials.nav-pills')
          <div class="col-sm-12">

            <div class="card text-center">
              <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                  <li class="nav-item">
                    <a class="nav-link active" href="{{route('subservice')}}">Back</a>
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
                                <img class="img-fluid card-img-top" 
                                src="{{asset('storage/'. $subservice['img_head'] .'')}}" data-holder-rendered="true">
                            <div class="card-block">
                              <br>
                              <div class="card-body">
                                <h4 class="card-title">{{$subservice['title']}}</h4>
                                <p class="card-text">{!! $subservice['content'] !!}</p>
                              </div>
                            </div>
                            <div class="card-footer">
                              {{$subservice['created_at']}}
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