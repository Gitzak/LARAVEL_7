@extends('layouts.app')

@section('content')
    <form action="{{ route('users.update',['user' => $user->id]) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-md-4">
                <h5>Avatar User</h5>
                <img src="{{ $user->image ? $user->image->url_image_path() : '' }}" alt="" class="img-thumbnail avatarX2 mb-3">
                <input type="file" name="avatar" id="avatar" class="form-control-file">
            </div>
            {{-- <div class="col-md-8">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" class="form-control"></div>
            </div> --}}
            <div class="col-md-12">
                <button type="submit" class="btn btn-md btn-warning my-3">Save</button>
            </div>
        </div>
    </form>
@endsection
