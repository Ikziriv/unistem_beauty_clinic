{{-- @auth --}}
  <comment-form
      post_id="{{ $post->id }}"
      placeholder="Your comment"
      button="Comment">
  </comment-form>
{{-- @else
    <small>You must be signed in to comment.</small>
@endauth --}}
