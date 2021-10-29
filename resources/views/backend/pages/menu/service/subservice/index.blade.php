@extends('backend.admin')

@section('content')
<section class="row">
  <div class="col-sm-12">
      @include('backend.partials.notif.error')
      @include('backend.partials.notif.success')
      <section class="row">
          @include('backend.pages.menu._partials.nav-pills')
          <div class="col-sm-12">
            <div class="card">
              <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                  <li class="nav-item">
                    <a class="nav-link active" href="{{route('subservice-create')}}">Add</a>
                  </li>
                </ul>
              </div>
              
              <div class="card-block">
                @forelse($subservice as $key => $value)
                <div class="list-group">
                <ul class="nav nav-tabs justify-content-start">
                  <li class="nav-item dropdown">
                    <a class="nav-link active dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Action</a>
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="{{route('subservice-view', $value['id'])}}">View</a>
                      <a class="dropdown-item" href="{{route('subservice-edit', $value['id'])}}">Edit</a>
                      <form id="delete-form-{{$value['id']}}" 
                          method="post" 
                          action="{{route('subservice-delete', $value['id'])}}"
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
                <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1">{{$value['title']}}</h5>
                <small>{{$value['created_at']}}</small>
                </div>
                <small>{!!str_limit($value['content'], 100)!!}</small>
                </a>
                </div><br>
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