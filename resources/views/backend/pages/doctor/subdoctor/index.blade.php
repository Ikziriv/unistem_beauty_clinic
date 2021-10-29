@extends('backend.admin')

@section('content')
<section class="row">
  <div class="col-sm-12">
      @include('backend.partials.notif.error')
      @include('backend.partials.notif.success')
      <section class="row">
          @include('backend.pages.doctor._partials.nav-pills')
          <div class="col-sm-12">
            <div class="card">
              <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                  <li class="nav-item">
                    <a class="nav-link active" href="{{route('subdoctor-create')}}"> Add</a>
                  </li>
                </ul>
              </div>
              
              <div class="card-block">
                <div class="row">
                  @forelse($subdoctor as $key => $value)
                  <div class="col-lg-4 mb-4">
                    <div class="card">
                      <div class="card-header">
                        <ul class="nav nav-tabs card-header-tabs">
                          <li class="nav-item dropdown">
                            <a class="nav-link active dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Action</a>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="{{route('subdoctor-view', $value['id'])}}">View</a>
                              <a class="dropdown-item" href="{{route('subdoctor-edit', $value['id'])}}">Edit</a>
                              <form id="delete-form-{{$value['id']}}" 
                                  method="post" 
                                  action="{{route('subdoctor-delete', $value['id'])}}"
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
                      <div class="card-block">
                        <h4 class="card-title">{{$value['name']}}</h4>
                        <small>{{$value['sub_title']}}</small>
                        <p>"{{$value['quote']}}"</p>
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