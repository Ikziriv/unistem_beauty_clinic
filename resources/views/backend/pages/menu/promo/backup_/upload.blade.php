@extends('admin')

@section('style')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.1.1/dropzone.css">
@endsection

@section('content')
<section class="row">
  <div class="col-sm-12">
      <section class="row">
          @include('pages.menu._partials.nav-pills')
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
                <form action="{{route('promo-transfer')}}" method="POST" 
                      class="dropzone"
                      id="my-awesome-dropzone"
                      enctype="multipart/form-data">
                      {{csrf_field()}}      
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
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.1.1/dropzone.js"></script>
<script type="text/javascript">
  $('#bs-example-navbar-collapse-1').on('show.bs.collapse', function() {
    $('.nav-pills').addClass('nav-stacked');
  });

  //Unstack menu when not collapsed
  $('#bs-example-navbar-collapse-1').on('hide.bs.collapse', function() {
      $('.nav-pills').removeClass('nav-stacked');
  });
</script>
<script type="text/javascript">
        Dropzone.options.imageUpload = {
            maxFilesize         :       1,
            acceptedFiles: ".jpeg,.jpg,.png,.gif"
        };
</script>
@endsection