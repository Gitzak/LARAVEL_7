<div class="form-group">
    <label for="title">Title</label>
    <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $post->title ?? null) }}"> 
</div>
<div class="form-group">
    <label for="content">Content</label>
    <input type="text" class="form-control" id="content" name="content" value="{{ old('content', $post->content ?? null) }}"> 
</div>