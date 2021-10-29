@extends('backend.admin')

@section('content')
<section class="row">
  <div class="col-sm-12">
      @include('backend.partials.notif.error')
      @include('backend.partials.notif.success')
      <section class="row">
          @include('backend.pages.doctor._partials.nav-pills')
          <div class="col-sm-12">

            <div class="card text-center">
              <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                  <li class="nav-item">
                    <a class="nav-link active" href="{{route('city')}}">Back</a>
                  </li>
                </ul>
              </div>
              
              <div class="card-block">
                <div class="card text-left" style="width: 100%; border-style: none;">
                  <div class="card-body">
                    <form class="form-horizontal" action="{{route('city-update', $city->id)}}" method="POST">
                    {{ csrf_field() }}
                    <fieldset>
                      <div class="form-group">
                        <label class="col-12 control-label no-padding" for="name">Name</label>
                        <div class="col-12 no-padding">
                          <input id="name" name="name" type="text" value="{{$city->name}}" class="form-control">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col">
                          <label class="col-12 control-label no-padding" for="name">Latitude</label>
                          <div class="col-12 no-padding">
                            <input id="lat" name="lat" type="text" value="{{$city->lat}}" class="form-control">
                          </div>
                        </div>
                        <div class="col">
                          <label class="col-12 control-label no-padding" for="name">Longitude</label>
                          <div class="col-12 no-padding">
                            <input id="long" name="long" type="text" value="{{$city->long}}" class="form-control">
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-12 control-label no-padding" for="name">Phone</label>
                        <div class="col-12 no-padding">
                          <input id="tlp" name="tlp" type="text" value="{{$city->tlp}}" class="form-control">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-12 control-label no-padding" for="address">Address</label>
                        <div class="col-12 no-padding">
                          <textarea class="form-control" id="address" name="address" rows="5">{{$city->address}}</textarea>
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