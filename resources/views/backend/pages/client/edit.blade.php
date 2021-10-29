@extends('backend.admin')

@section('content')
<section class="row">
  <div class="col-sm-12">
      @include('backend.partials.notif.error')
      @include('backend.partials.notif.success')
      <section class="row">
          <div class="col-sm-12">

            <div class="card text-center">
              <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                  <li class="nav-item">
                    <a class="nav-link active" href="{{route('client')}}">Back</a>
                  </li>
                </ul>
              </div>
              
              <div class="card-block">
                <div class="card text-left" style="width: 100%; border-style: none;">
                  <div class="card-body">
                    <form class="form-horizontal" action="{{route('client-update', $client->id)}}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <fieldset>
                      <div class="form-group">
                        <label class="col-12 control-label no-padding" for="name">Background Image</label>
                        <div class="col-12 no-padding">
                          <input id="bg_member" name="bg_member" type="file" class="form-control">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-12 control-label no-padding" for="name">Name</label>
                        <div class="col-12 no-padding">
                          <input id="name" name="name" type="text" value="{{$client->name}}" class="form-control">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-12 control-label no-padding" for="name">Email</label>
                        <div class="col-12 no-padding">
                          <input id="email" name="email" type="email" value="{{$client->email}}" class="form-control">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-12 control-label no-padding" for="title">Gender</label>
                        <div class="col-12 no-padding">
                          <select class="form-control" name="gender">
                            <option selected disabled>Select Gender</option>
                            <option value="Pria">Pria</option>
                            <option value="Wanita">Wanita</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-12 control-label no-padding" for="title">Phone Number</label>
                        <div class="col-12 no-padding">
                          <input id="phone_number" name="phone_number" type="text" value="{{$client->phone_number}}" class="form-control">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-12 control-label no-padding" for="title">Birth Date</label>
                        <div class="col-12 no-padding">
                          <input id="birth_date" name="birth_date" type="date" value="{{$client->birth_date}}" class="form-control">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-12 control-label no-padding" for="profile_picture">Image</label>
                        <div class="col-12 no-padding">
                          <input id="profile_picture" name="profile_picture" value="{{$client->profile_picture}}" type="file" class="form-control">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-12 control-label no-padding" for="address">Address</label>
                        <div class="col-12 no-padding">
                          <textarea class="form-control" id="address" name="address" rows="5">{{$client->address}}</textarea>
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