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
                <button type="submit" class="btn btn-md btn-warning my-3">Save</button>
            </div>
            {{-- <div class="col-md-8">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" class="form-control"></div>
            </div> --}}
            <div class="col-md-4">
                <form action="">
                    <div class="form-group">
                        <label for="locale">Select lang</label>
                        <select class="form-control" name="locale" id="locale">
                            @foreach (App\User::LOCALES as $locale => $label)                    
                            <option value="{{ $locale }}" {{ $user->locale === $locale ? 'selected' : '' }}>{{ $label }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary mb-2">Save</button>
                </form>
            </div>
        </div>
    </form>
@endsection
