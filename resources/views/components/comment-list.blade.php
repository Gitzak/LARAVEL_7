@forelse($comments as $comment)
    <p>{{ $comment->content }}</p>
    <span>Added {{ $comment->created_at->diffForHumans() }} | By <a href="{{ route('users.show',['user' => $comment->user->id]) }}">{{ $comment->user->name }}</a></span>
    <hr>
@empty
    <p>No comment yet</p>
@endforelse
