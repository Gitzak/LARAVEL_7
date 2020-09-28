@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <img class="img-fluid" src="{{ asset('simple_images/giphy.gif') }}" alt="">
                    <h1>Had page secret</h1>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
