@forelse ($items as $item)
<div class="card mb-5" >
    <div class="card-body">
        <div class="float-right">
            @if($item->created_at->diffInHours() < 1)
                <x-badge type="primary">
                    New post
                </x-badge>
            @else
                <x-badge type="dark">
                    Old Post
                </x-badge>
            @endif
        </div>
        @if ($item->trashed())
        <del>
            <a href="{{ route('posts.show', ['post' => $item->id]) }}"><h5 class="card-title">{{ $item->title }}</h5></a>
            <p class="card-text">{{ $item->content }}</p>
            <p>{{ $item->created_at->diffForHumans() }}</p>
        </del>
        @else
        <a href="{{ route('posts.show', ['post' => $item->id]) }}"><h5 class="card-title">{{ $item->title }}</h5></a>
        <p class="card-text">{{ $item->content }}</p>
        <p>{{ $item->created_at->diffForHumans() }}</p>
        @endif
        <x-tags :tags="$item->tags"></x-tags>
        @if($item->comments_count)
        <p class="badge badge-success float-right">Comments {{ $item->comments_count }}</p>
        @else
        <p class="badge badge-warning float-right">No comments yet</p>
        @endif
        <x-updated :date="$item->created_at" :name="$item->user->name">Added </x-updated>
        <x-updated :date="$item->updated_at">Updated </x-updated>
        <a href="{{ route('posts.show', ['post' => $item->id]) }}" class="btn btn-primary">show</a>

    @auth
        @can('update',$item)
        <a href="{{ route('posts.edit', ['post' => $item->id]) }}" class="btn btn-warning">Edit</a>
        @endcan
        @cannot('delete',$item)
            <x-badge type="danger" float="float-right">
                Mat9adch tssuprimi had post !
            </x-badge>
        @endcannot
        @if (!$item->deleted_at)
        @can('delete',$item)
        <div class="form-group mt-1 float-right">
            <form action="{{ route('posts.destroy', ['post' => $item->id]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger mt-2">Delete</button>
            </form>
        </div>
        @endcan
        @else
        <div class="form-group mt-1 float-right">
            @can('delete',$item)
            <form class="form d-inline" action="{{ URL('/posts/' . $item->id . '/restore') }}" method="POST">
                @csrf
                @method('PATCH')
                <button type="submit" class="btn btn-success">Restore Post</button>
            </form>
            @endcan
            @can('forcedelete',$item)
            <form class="form d-inline" action="{{ URL('/posts/' . $item->id . '/forcedelete') }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Force Delete</button>
            </form>
            @endcan
        </div>
        @endif
    @endauth
    </div>
</div>
@empty
<div class="col-6">
    <p class="alert alert-danger">No Data</p>
</div>
@endforelse