@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    <p class="mt-3">{{ __('messages.welcome') }}</p>
                    <p class="mt-3">@lang('messages.welcome')</p>
                    <p class="mt-3">@lang('messages.hello_name',['name' => "Zakaria"])</p>

                    <p class="mt-3">{{ trans_choice('messages.plural', 0) }}</p>
                    <p class="mt-3">{{ trans_choice('messages.plural', 1) }}</p>
                    <p class="mt-3">{{ trans_choice('messages.plural', 15) }}</p>

                    <hr>

                    <p>From Json</p>
                    <p class="mt-3">@lang('welcome')</p>



                </div>
            </div>
        </div>
    </div>
</div>
@endsection
