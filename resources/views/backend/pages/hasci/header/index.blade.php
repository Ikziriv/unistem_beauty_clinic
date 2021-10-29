@extends('backend.admin')

@section('content')
<section class="row">
  <div class="col-sm-12">
      @include('backend.partials.notif.error')
      @include('backend.partials.notif.success')
      <section class="row">
          @include('backend.pages.hasci._partials.nav-pills')

          @forelse($hasci_header as $value)
          <div class="col-sm-12">
            <div class="card text-center">
              <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                  <li class="nav-item">
                    <a class="nav-link active" href="{{route('hasci-header-edit', $value['id'])}}">Edit</a>
                  </li>
                </ul>
              </div>
            </div><br>
          </div>

          <div class="col-sm-12">
            <div class="card">
              <div class="card-block">
                <img class="card-img-top object-fit_contain" width="250px" id="img_fit" src="{{Storage::url($value['img_head'])}}" data-holder-rendered="true">
                <div class="card-body">
                <br>
                  <h4 class="card-title">{{$value['title']}}</h4>
                  <p class="card-text">{!! str_limit($value['content'], 300) !!}</p>
                </div>
              </div>
              <div class="card-footer">
                {{$value['created_at']}}
              </div>
            </div>
          </div>
          @empty
          <div class="col-sm-12">
            <div class="card">
                <div class="card-block">
                  <h4 class="card-title">Not Found</h4>
                </div>
            </div>
          </div>
          @endforelse
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