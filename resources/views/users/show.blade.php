@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-4">
            <h3>Avatar user <br><b>{{ $user->name }}</b></h3>
            <img src="{{ $user->image ? $user->image->url_image_path() : '' }}" alt="" class="img-thumbnail avatarX2">
            @can('update', $user)
                <a href="{{ route('users.edit', ['user' => $user->id]) }}" class="btn btn-sm btn-dark d-block mt-3">Update image avatar</a>
            @endcan
        </div>
        <div class="col-md-8 mt-5">
            <x-comment-form :action="route('users.comments.store',['user' => $user->id])"></x-comment-form>
            <hr>
            <x-comment-list :comments="$user->comments"></x-comment-list>
        </div>
    </div>

@endsection
