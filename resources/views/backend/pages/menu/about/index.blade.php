@extends('backend.admin')

@section('style')
<style type="text/css">
  img { height: 120px;}
  .object-fit_fill { object-fit: fill }
  .object-fit_contain { object-fit: contain }
  .object-fit_cover { object-fit: cover }
  .object-fit_none { object-fit: none }
  .object-fit_scale-down { object-fit: scale-down }
  #img_fit{
    float: left;
    width: 40%;
    margin: 0 30px 20px 0; display: block;
  }
</style>
@endsection

@section('content')
<section class="row">
  <div class="col-sm-12">
      @include('backend.partials.notif.error')
      @include('backend.partials.notif.success')
      <section class="row">
          @include('backend.pages.menu._partials.nav-pills')
          @forelse($about as $value)
          <div class="col-sm-12">
            <div class="card text-center">
              <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                  <li class="nav-item">
                    <a class="nav-link active" href="{{route('about-edit', $value['id'])}}">Edit</a>
                  </li>
                </ul>
              </div>
            </div><br>
          </div>

          <div class="col-sm-12">
            <div class="card">
              <div class="card-block">
                <br>
                <img class="card-img-top object-fit_contain" id="img_fit" src="{{ Storage::url($value['img_head']) }}" data-holder-rendered="true">
                <div class="card-body">
                  <h4 class="card-title">{{str_limit($value['title'], 40)}}</h4>
                  <p class="card-text my_text">{!! str_limit($value['content'], 300) !!}</p>
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

          <div class="col-sm-12">
            <div class="card">
              <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                  <li class="nav-item">
                    <a class="nav-link active" href="{{route('about-upload')}}"">Partner Upload</a>
                  </li>
                </ul>
              </div>
              <div class="card-block">
                <h4 class="card-title">Partner</h4>
                <hr>
                <div class="row">
                  @forelse($partner as $value)
                  <div class="col-md-4">
                    <ul class="nav nav-tabs card-header-tabs">
                      <li class="nav-item dropdown">
                        <a class="nav-link active dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Action</a>
                        <div class="dropdown-menu">
                          @if($value['link_path']==NULL)
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#about_partner_modal">Insert URL</a>
                          @else
                            <a class="dropdown-item edit-modal" data-id="{{$value['id']}}" data-link="{{$value['link_path']}}">Edit URL</a>
                          @endif
                          <form id="delete-form-{{$value['id']}}" 
                              method="post" 
                              action="{{route('about-partner-delete', $value['id'])}}"
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
                    </ul><br>
                    <a href="{{$value['link_path']}}" target="_blank">
                      <img class="card-img-top img-thumbnail object-fit_contain" id="img_fit" src="{{asset('storage/'. $value['img_path'] .'')}}" data-holder-rendered="true">
                    </a>
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
      </section>
      <section class="row">
          {{-- <div class="col-12 mt-1 mb-4">Template by <a href="https://www.medialoot.com">Medialoot</a></div> --}}
      </section>
  </div>
</section>
{{-- Modal Partner --}}
@include('backend.pages.menu.about.modal.insert_modal')
@include('backend.pages.menu.about.modal.edit_modal')
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
<script type="text/javascript">
    $(document).on('click', '.edit-modal', function() {
        $('#edit_id').val($(this).data('id'));
        $('#edit_link').val($(this).data('link'));
        $('#about_partner_modal_edit').modal('show');
    });
    $('.my_text').editable({
        type: 'wysiwyg',
        editor: ed,
        onSubmit: function submitData(content) {
           alert(content.previous);
        },
        submit: 'save',
        cancel: 'cancel'
    });
</script>
@endsection