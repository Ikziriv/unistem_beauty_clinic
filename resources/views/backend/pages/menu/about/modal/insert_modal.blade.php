<!-- Modal About Partner -->
<div class="modal fade" id="about_partner_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add</h5>
        <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{route('about-partner-insert', $value['id'])}}" method="post">
        <div class="modal-body">
          {{ csrf_field() }}
          <div class="form-group{{ $errors->has('link_path') ? ' has-error' : '' }}">
              <label for="link_path" class="col-md-12 control-label">URL Site</label>
              <div class="col-md-12">
                  <input id="link_path" type="text" class="form-control" name="link_path" value="{{ old('link_path') }}" 
                          placeholder="http://www.example.co.id" required autofocus>

                  @if ($errors->has('link_path'))
                      <span class="help-block">
                          <strong>{{ $errors->first('link_path') }}</strong>
                      </span>
                  @endif
              </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-info btn-block text-light">Send</button>
        </div>
      </form>
    </div>
  </div>
</div>