@foreach($tags as $tag)
<h5 class="d-inline">
    <a href="{{ route('posts.tag.index',['id' => $tag->id]) }}"><span class="badge badge-info">{{ $tag->name }}</span></a>
</h5>
@endforeach