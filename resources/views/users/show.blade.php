@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-4">
            <h5>Avatar user</h5>
            <img src="{{ $user->image ? $user->image->url_image_path() : '' }}" alt="" class="img-thumbnail avatar">
        </div>
        <div class="col-md-8">
            <div class="form-group">
                <label for="name">Name : </label>
                <h3>{{ $user->name }}</h3>
            </div>
        </div>
    </div>
    @can('update', $user)
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('users.edit', ['user' => $user->id]) }}" class="btn btn-sm btn-dark">Update</a>
            </div>
        </div>
    @endcan
@endsection
