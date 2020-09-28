@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-8">
            <div class="card">
                <div class="card-body">
                    @if($post->image)
                    <img class="img-fluid my-3" src="{{ $post->image->url_image_path() }}" alt="">
                    @endif
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <x-tags :tags="$post->tags"></x-tags>
                    <p class="card-text mt-2">{{ $post->content }}</p>
                    <p>{{ $post->created_at->diffForHumans() }}</p>
                    {{-- <p>Status : {{ $post->active ? 'Active' : 'Inactive' }}</p> --}}
                    <p>Status :
                        @if( $post->active)
                        Active
                        @else
                        Inactive
                        @endif
                    </p>
                    <hr>
                    @include('comments.add_comment', ['id' => $post->id])
                    <h3>Comment(s)</h3>
                    @foreach($post->comments as $comment)
                        <p>{{ $comment->content }}</p>
                        <span>Added {{ $comment->created_at->diffForHumans() }} | By {{ $comment->user->name }}</span>
                        <hr>
                    @endForeach
                </div>
            </div>
        </div>
        <div class="col-4">
            @include('posts.sidebar')
        </div>
    </div>
@endsection
