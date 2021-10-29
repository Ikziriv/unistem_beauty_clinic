@extends('backend.admin')

@section('style')

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
                    <a class="nav-link active" href="{{route('promo')}}">Back</a>
                  </li>
                </ul>
              </div>
              
              <div class="card-block">
                <form action="{{route('promo-save')}}" method="POST" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <div class="form-group row">
                    <label for="Date" class="col-sm-2 col-form-label">Date</label>
                    <div class="col-sm-10">
                      <input type="date" name="promo_date" id="promo_date" class="form-control">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="Image" class="col-sm-2 col-form-label">Image</label>
                    <div class="col-sm-10">
                      <input type="file" name="img_promo" id="img_promo" class="form-control">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-12 widget-right no-padding">
                      <button type="submit" class="btn btn-primary btn-md float-right">Upload</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>

            <br>
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