@extends('backend.admin')

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
                    <a class="nav-link active" href="{{route('sosial_link')}}">Back</a>
                  </li>
                </ul>
              </div>
              
              <div class="card-block">
                <div class="card text-left" style="width: 100%; border-style: none;">
                  <div class="card-body">
                    <form class="form-horizontal" action="{{route('sosial_link-update', $sosial_link->id)}}" method="POST">
                    {{ csrf_field() }}
                    <fieldset>
                      <div class="form-group">
                        <label class="col-12 control-label no-padding" for="name">Name</label>
                        <div class="col-12 no-padding">
                          <input id="name" name="name" type="text" value="{{$sosial_link->name}}" value="" class="form-control">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-12 control-label no-padding" for="link">Link</label>
                        <div class="col-12 no-padding">
                          <input id="link" name="link" type="text" value="{{$sosial_link->link}}" value="" class="form-control">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-12 control-label no-padding" for="icon">Icon</label>
                        <div class="col-12 no-padding">
                          <input id="icon" name="icon" type="text" value="{{$sosial_link->icon}}" value="" class="form-control">
                          <p class="text-secondary">Contoh : icon-{nama icon} <a href="https://icomoon.io/#preview-free" target="_blank">klik</a></p>
                        </div>
                      </div>
                      <div class="form-group">
                          <div class="col-12 widget-right no-padding">
                            <button type="submit" class="btn btn-primary btn-md float-right">Edit</button>
                          </div>
                        </div>
                    </fieldset>
                    </form>
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