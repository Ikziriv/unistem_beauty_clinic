@extends('backend.admin')

@section('content')
<section class="row">
  <div class="col-sm-12">
      <section class="row">
          @include('backend.pages.menu._partials.nav-pills')
          <div class="col-sm-12">


            <div class="card text-center">
              <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                  <li class="nav-item">
                    <a class="nav-link active" href="{{route('promo-create')}}">Upload</a>
                  </li>
                </ul>
              </div>
              
              <div class="card-block">
                <div class="container">
                  <div class="row">
                    <div class="col-12">
                      <form class="form-inline justify-content-end">
                        <div class="form-group mb-2">
                          <input type="date" id="search_promo" name="search_promo" class="form-control w-100">
                        </div>
                        <button type="submit" class="btn btn-sm btn-primary ml-2 mb-2">Search</button>
                      </form>
                    </div>
                  </div><br>
                  <div class="row">
                    @forelse($promo as $value)
                    <div class="col-4">
                    <div class="card">
                      <div class="card-header">
                        <ul class="nav nav-tabs card-header-tabs">
                          <li class="nav-item dropdown">
                            <a class="nav-link active dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Action</a>
                            <div class="dropdown-menu">
                              <form id="delete-form-{{$value['id']}}" 
                                  method="post" 
                                  action="{{route('promo-delete', $value['id'])}}"
                                  style="display: none;">
                                {{csrf_field()}}
                                {{method_field('DELETE')}}
                              </form>
                              <a class="dropdown-item" href="" onclick="
                                if(confirm('Are You Sure?')) {
                                  event.preventDefault();
                                  document.getElementById('delete-form-{{$value['id']}}').submit();
                                } else {
                                  event.preventDefault();
                                }
                              ">
                              Delete</a>
                            </div>
                          </li>
                        </ul>
                        </div>
                        <div class="card-block" style="width: 100%;">
                          <img class="img-thumbnail img-responsive" src="{{asset('storage/'. $value['img_promo'] .'')}}">
                          <small class="text-center">{{$value['promo_date']}}</small>
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
                  </div>
                  </div>
                </div>
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