@extends('backend.admin')

@section('content')
<section class="row">
  <div class="col-sm-12">
      @include('backend.partials.notif.error')
      @include('backend.partials.notif.success')
      <section class="row">
          @include('backend.pages.doctor._partials.nav-pills')
          <div class="col-sm-12">
            <div class="card-header">
              <ul class="nav nav-tabs card-header-tabs">
                <li class="nav-item">
                   <a class="nav-link active" href="{{route('city-create')}}">Add</a>
                </li>
              </ul>
            </div>
            <div class="card-block">
              <div class="table-responsive">
                <table class="table" id="bs4_table">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Name</th>
                      <th scope="col">Latitude</th>
                      <th scope="col">Longitude</th>
                      <th scope="col">Phone</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse($city as $value)
                    <tr>
                      <th scope="row">{{$loop->iteration}}</th>
                      <td>{{$value['name']}}</td>
                      <td>{{$value['tlp']}}</td> 
                      <td>{{$value['lat']}}</td>
                      <td>{{$value['long']}}</td>
                      <td>
                        <div class="dropdown">
                          <button class="btn btn-outline-secondary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Action
                          </button>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="{{route('city-edit', $value['id'])}}">Edit</a>
                            <form id="delete-form-{{$value['id']}}" 
                                method="post" 
                                action="{{route('city-delete', $value['id'])}}"
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
                        </div>
                      </td>
                    </tr>
                    @empty
                    <div class="col-sm-12">
                      <div class="card">
                          <div class="card-block">
                            <h4 class="card-title">Not Found</h4>
                          </div>
                      </div>
                    </div><br>
                    @endforelse
                  </tbody>
                </table>
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