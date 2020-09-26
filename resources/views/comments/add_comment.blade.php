@auth
<x-errors></x-errors>
<h5>Add Comment</h5>
<form class="mb-5" action="{{ route('posts.comments.store',['post' => $id]) }}" method="POST">
    @csrf
    <div class="form-group">
        <textarea class="form-control" id="content" name="content" rows="3"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Add Comment</button>
</form>

@else

<div class="alert alert-danger" role="alert">
    <h4><a href="/login">Login to comment</a></h4>
</div>

@endauth