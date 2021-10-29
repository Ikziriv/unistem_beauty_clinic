@extends('backend.admin')

@section('content')
<section class="row">
  <div class="col-sm-12">
      <section class="row">
          <div class="col-sm-12">
              <div class="pull-left">
                  <div class="card" style="border-style: none;">
                    <div class="card-body">
                      <i class="fa fa-file-o fa-3x"></i> <span class="badge badge-primary badge-pill">Total</span>
                    </div>
                  </div>
                  <br>
              </div>
          </div>
      </section>
      <section class="row">
        <div class="col-sm-6">
          <a href="{{route('post')}}">
          <div class="card">
            <div class="card-block">
              <div class="card-body">
                <div class="clearfix">
                  <div class="p-2 ml-auto">
                    <h4 class="text-card lead">Blog</h4>
                  </div>
                  <div class="p-2 pull-right">
                    <b>{{$post}}</b>
                  </div>
                </div>
              </div>
            </div>
          </div>
          </a>
        </div>
        <div class="col-sm-6">
          <a href="{{route('subdoctor')}}">
          <div class="card">
            <div class="card-block">
              <div class="card-body">
                <div class="clearfix">
                  <div class="p-2 ml-auto">
                    <h4 class="text-card lead">Doctor Members</h4>
                  </div>
                  <div class="p-2 pull-right">
                    <b>{{$subdoc}}</b>
                  </div>
                </div>
              </div>
            </div>
          </div>
          </a>
        </div>
        <div class="col-sm-12"><br></div>
        <div class="col-sm-6">
          <a href="{{route('service')}}">
          <div class="card">
            <div class="card-block">
              <div class="card-body">
                <div class="clearfix">
                  <div class="p-2 ml-auto">
                    <h4 class="text-card lead">Main Service</h4>
                  </div>
                  <div class="p-2 pull-right">
                    <b>{{$subserv}}</b>
                  </div>
                </div>
              </div>
            </div>
          </div>
          </a>
        </div>
        <div class="col-sm-6">
          <a href="{{route('client')}}">
          <div class="card">
            <div class="card-block">
              <div class="card-body">
                <div class="clearfix">
                  <div class="p-2 ml-auto">
                    <h4 class="text-card lead">Client</h4>
                  </div>
                  <div class="p-2 pull-right">
                    <b>{{$client}}</b>
                  </div>
                </div>
              </div>
            </div>
          </div>
          </a>
        </div>
              
      </section>
      <section class="row">
          {{-- <div class="col-12 mt-1 mb-4">Template by <a href="https://www.medialoot.com">Medialoot</a></div> --}}
      </section>
  </div>
</section>
@endsection