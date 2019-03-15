@if($model->totalCommentsCount() < 1)
    <div class="notification is-warning">There are no comments yet.</div>
@endif

<ul class="list-unstyled">
    @foreach($model->comments as $comment)
        @include('vendor.laravel-comment._comment', [
            'comment' => $comment
        ])
    @endforeach
</ul>

@include('vendor.laravel-comment._form')