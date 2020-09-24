<div class="card text-left">
    <div class="card-body">
      <h4 class="card-title">{{ $title }}</h4>
      <ul class="list-group list-group-flush">
        @foreach ($items as $item)
            <li class="list-group-item">
                @if($item->comments_count)
                <p class="badge badge-success float-right">Comments {{ $item->comments_count }}</p>
                @else
                <p class="badge badge-warning float-right">No comments yet</p>
                @endif
                <a href="{{ route('posts.show', ['post' => $item->id]) }}" class="card-text">{{ $item->title }}</a>
            </li>
        @endforeach
        </ul>
    </div>
</div>

{{-- <div class="card text-left">
    <div class="card-body">
      <h4 class="card-title">Most Posts Commented</h4>
      <ul class="list-group list-group-flush">
        @foreach ($mostCommented as $commented)
            <li class="list-group-item">
                @if($commented->comments_count)
                <p class="badge badge-success float-right">Comments {{ $commented->comments_count }}</p>
                @else
                <p class="badge badge-warning float-right">No comments yet</p>
                @endif
                <a href="{{ route('posts.show', ['post' => $commented->id]) }}" class="card-text">{{ $commented->title }}</a>
            </li>
        @endforeach
        </ul>
    </div>
</div> --}}