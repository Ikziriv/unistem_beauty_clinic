@extends('backend.admin')

@section('content')
<section class="row">
  <div class="col-sm-12">
      <section class="row">
        @include('backend.pages.post._partials.nav-pills')
        <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
              <ul class="nav nav-tabs card-header-tabs">
                <li class="nav-item">
                   <a class="nav-link active" href="{{route('post-create')}}">Add</a>
                </li>
              </ul>
            </div>

            <div class="card-block">
              <div class="table-responsive">
                <table class="table table-striped" id="bs4_table">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Title</th>
                      <th scope="col">Sub Title</th>
                      <th scope="col">Category</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse($post as $value)
                    <tr>
                      <td>{{$loop->iteration}}</td>
                      <td>{{$value['title']}}</td>
                      <td>{{$value['sub_title']}}</td>
                      <td>{{$value->category['name']}}</td>
                      <td>
                        <div class="dropdown">
                          <button class="btn btn-outline-secondary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Action
                          </button>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="{{route('post-view', $value['id'])}}">View</a>
                            <a class="dropdown-item" href="{{route('post-edit', $value['id'])}}">Edit</a>
                            <form id="delete-form-{{$value['id']}}" 
                                method="post" 
                                action="{{route('post-delete', $value['id'])}}"
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
          </div>
          </div>
      </section>
      <section class="row">
          {{-- <div class="col-12 mt-1 mb-4">Template by <a href="https://www.medialoot.com">Medialoot</a></div> --}}
      </section>
  </div>
</section>
@endsection