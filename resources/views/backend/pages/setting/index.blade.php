@extends('backend.admin')

@section('content')
<section class="row">
  <div class="col-sm-12">
      @include('backend.partials.notif.error')
      @include('backend.partials.notif.success')
      <section class="row">
        <div class="col-sm-12">
          <div class="card">
            <div class="card-block">
              <div class="card-body">
                <form action="{{route('setting-save')}}" method="POST">
                  {{ csrf_field() }}
                  <div class="form-group">
                    <label for="">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ Auth::user()->email }}" placeholder="Enter email">
                  </div>
                  <hr>
                  <div class="form-group">
                    <p class="text-danger">Change Password Account</p>
                  </div>
                  <div class="form-group">
                    <label for="">Current Password</label>
                    <input type="password" class="form-control" id="current_password" name="current_password">
                  </div>
                  <div class="form-group">
                    <label for="">New Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                  </div>
                  <div class="form-group">
                    <label for="">Re-enter Password</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                  </div>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </form>
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