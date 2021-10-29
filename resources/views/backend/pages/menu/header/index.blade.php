@extends('backend.admin')

@section('content')
<section class="row">
  <div class="col-sm-12">
      <section class="row">
          @include('backend.pages.menu._partials.nav-pills')
          <div class="col-sm-12">

            @foreach($header as $value)
            <div class="card text-center">
              <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                  <li class="nav-item">
                    <a class="nav-link active" href="{{route('header-edit', $value['id'])}}">Edit</a>
                  </li>
                </ul>
              </div>
              
              <div class="card-block">
                <div class="card text-left" style="width: 100%; border-style: none;">
                  <div class="card-body">
                    <br>
                      <h4 class="card-title">{{$value['title']}}</h4>
                      <p class="card-text">{!!$value['subtitle']!!}</p>
                      <p class="card-text">{!!$value['phone']!!}</p>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
            {{-- // Div --}}
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