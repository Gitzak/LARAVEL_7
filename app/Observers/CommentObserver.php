<?php

namespace App\Observers;

use App\comment;
use Illuminate\Support\Facades\Cache;

class CommentObserver
{
    /**
     * Handle the comment "creating" event.
     *
     * @param  \App\comment  $comment
     * @return void
     */
    public function creating(comment $comment)
    {
        Cache::forget("post-show-{$comment->commentable->id}");
    }

    /**
     * Handle the comment "updated" event.
     *
     * @param  \App\comment  $comment
     * @return void
     */
    public function updated(comment $comment)
    {
        //
    }

    /**
     * Handle the comment "deleted" event.
     *
     * @param  \App\comment  $comment
     * @return void
     */
    public function deleted(comment $comment)
    {
        //
    }

    /**
     * Handle the comment "restored" event.
     *
     * @param  \App\comment  $comment
     * @return void
     */
    public function restored(comment $comment)
    {
        //
    }

    /**
     * Handle the comment "force deleted" event.
     *
     * @param  \App\comment  $comment
     * @return void
     */
    public function forceDeleted(comment $comment)
    {
        //
    }
}
