<h5 class="text-right">Comment : {{ $post->comments_count }}</h5>

@include('frontend.pages.comment.form')

<comment-list
    post_id="{{ $post->id }}"
    loading_comments="Load comments"
    data_confirm="Are you sure you want to delete this comment?">
</comment-list>
