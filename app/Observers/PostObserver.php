<?php

namespace App\Observers;

use App\post;
use Illuminate\Support\Facades\Cache;

class PostObserver
{
    /**
     * Handle the post "created" event.
     *
     * @param  \App\post  $post
     * @return void
     */
    public function created(post $post)
    {
        //
    }

    /**
     * Handle the post "updating" event.
     *
     * @param  \App\post  $post
     * @return void
     */
    public function updating(post $post)
    {
        Cache::forget("post-show-{$post->id}");
    }

    /**
     * Handle the post "deleting" event.
     *
     * @param  \App\post  $post
     * @return void
     */
    public function deleting(post $post)
    {
        $post->comments()->delete();
    }

    /**
     * Handle the post "restoring" event.
     *
     * @param  \App\post  $post
     * @return void
     */
    public function restoring(post $post)
    {
        $post->comments()->delete();
    }

    /**
     * Handle the post "force deleted" event.
     *
     * @param  \App\post  $post
     * @return void
     */
    public function forceDeleted(post $post)
    {
        //
    }
}
