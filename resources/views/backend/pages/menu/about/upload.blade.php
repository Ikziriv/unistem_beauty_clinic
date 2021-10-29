@extends('backend.admin')

@section('style')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.1.1/dropzone.css">
@endsection

@section('content')
<section class="row">
  <div class="col-sm-12">
      @include('backend.partials.notif.error')
      @include('backend.partials.notif.success')
      <section class="row">
          @include('backend.pages.menu._partials.nav-pills')
          <div class="col-sm-12">

            <div class="card text-center">
              <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                  <li class="nav-item">
                    <a class="nav-link active" href="{{route('about')}}">Back</a>
                  </li>
                </ul>
              </div>
              
              <div class="card-block">
                <div class="card text-left" style="width: 100%; border-style: none;">
                  <div class="card-body">
                    <form action="{{route('about-upload-store')}}" method="POST" 
                          class="dropzone"
                          id="my-awesome-dropzone"
                          enctype="multipart/form-data">
                          {{csrf_field()}}      
                    </form>
                    {{-- <form action="{{route('about-upload-store', $data->id)}}" method="POST" enctype="multipart/form-data">
                      {{ csrf_field() }}
                      <div class="form-group row">
                        <label for="Date" class="col-sm-2 col-form-label">Link URL</label>
                        <div class="col-sm-10">
                          <input type="text" name="link_path" id="link_path" class="form-control" placeholder="http://bamedskincare.co.id">
                          <input type="hidden" name="about_id" id="about_id" value="{{$data->id}}" class="form-control">
                          <small id="emailHelp" class="form-text text-danger">Image URL Site.</small>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="Image" class="col-sm-2 col-form-label">Image</label>
                        <div class="col-sm-10">
                          <input type="file" name="img_path" id="img_path" class="form-control">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-12 widget-right no-padding">
                          <button type="submit" class="btn btn-primary btn-md float-right">Upload</button>
                        </div>
                      </div>
                    </form> --}}
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
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.1.1/dropzone.js"></script>
<script type="text/javascript">
  $('#bs-example-navbar-collapse-1').on('show.bs.collapse', function() {
    $('.nav-pills').addClass('nav-stacked');
  });

  //Unstack menu when not collapsed
  $('#bs-example-navbar-collapse-1').on('hide.bs.collapse', function() {
      $('.nav-pills').removeClass('nav-stacked');
  });
</script>
{{-- Drop Box --}}
<script type="text/javascript">
  // Dropzone Option
    Dropzone.options.myDropzone = {
        paramName: 'file',
        maxFilesize: 5, // MB
        maxFiles: 20,
        acceptedFiles: ".jpeg,.jpg,.png,.gif",
        init: function() {
            this.on("success", function(file, response) {
                var a = document.createElement('span');
                a.className = "thumb-url btn btn-primary";
                a.setAttribute('data-clipboard-text','{{url('/about/upload')}}'+'/'+response);
                a.innerHTML = "copy url";
                file.previewTemplate.appendChild(a);
            });
        }
    };
    // Custom file input box
    $('.file-input').on('change', function(e) {
        var file = '';
        var name = '';
        file = $('input[type=file]').val();
        name = file.split('\\').pop();
        $('#filename').text(name);
    });
</script>
@endsection