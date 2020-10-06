<?php

namespace App\Providers;

use App\Comment;
use App\Http\Resources\CommentResource;
use App\Post;
use App\Http\ViewComposers\ActivityComposer;
use App\Observers\CommentObserver;
use App\Observers\PostObserver;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // view()->composer(['posts.index','posts.show'],ActivityComposer::class);
        // view()->composer('*',ActivityComposer::class);
        view()->composer('posts.sidebar',ActivityComposer::class);

        Post::observe(PostObserver::class);
        Comment::observe(CommentObserver::class);

        // disable wrapping in data returned
        // CommentResource::withoutWrapping();

        // disable wrapping in data returned in all json
        JsonResource::withoutWrapping();
    }
}
