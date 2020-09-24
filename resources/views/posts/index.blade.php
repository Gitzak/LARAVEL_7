@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item">
              <a class="nav-link @if($tab == 'list') active @endif" href="/posts">List</a>
            </li>
            @can('secret.page')
            <li class="nav-item">
              <a class="nav-link @if($tab == 'archive') active @endif" href="/posts/archive">Archive</a>
            </li>
            <li class="nav-item">
              <a class="nav-link @if($tab == 'all') active @endif" href="/posts/all">All</a>
            </li>
            @endcan
          </ul>
          <div>
              <p>{{ $posts->count() }} Post(s)</p>
          </div>
    </div>
</div>
    <div class="row">
        <div class="col-md-8 col-sm-12">
            {{-- component card_posts --}}
            <x-card_posts
            :items="collect($posts)">
            </x-card_posts>
        </div>
        <div class="col-md-4 col-sm-12">
            @include('posts.sidebar')
        </div>
    </div>
@endsection
