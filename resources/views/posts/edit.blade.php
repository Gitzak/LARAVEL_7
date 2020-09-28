@extends('layouts.app')

@section('content')
@if($errors->any())
<div class="row">
    <div class="col-12">
        <ul>
            @foreach ($errors->all() as $error)
            <li class="text-danger">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
</div>
@endif
<div class="row my-5">
    <div class="col-6">
        <h3 class="display-4">Update Post</h3>
            @if($post->image)
            <img class="img-fluid my-3" src="{{ $post->image->url_image_path() }}" alt="">
            @endif
            <form action="{{ route('posts.update', ['post' => $post->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                {{-- <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $post->title) }}"> 
                </div>
                <div class="form-group">
                    <label for="content">Content</label>
                    <input type="text" class="form-control" id="content" name="content" value="{{ old('title', $post->content) }}"> 
                </div> --}}

                @include('.posts.form')
                <button type="submit" class="btn btn-primary">Update Post</button>
            </form>
        </div>
    </div>
@endsection
