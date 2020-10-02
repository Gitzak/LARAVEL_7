<?php

namespace App;

use App\Scopes\LatestScope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Cache;

class Comment extends Model
{

    use SoftDeletes;

    protected $fillable = ['content','user_id'];

    public function Post(){
        return $this->belongsTo('App\Post');
    }

    public function commentable(){
        return $this->morphTo();
    }

    public function User(){
        return $this->belongsTo('App\User');
    }

    public function tags(){
        return $this->morphToMany('App\Tag', 'taggable')->withTimestamps();
    }

    public function scopeDernier(Builder $query){
        return $query->orderBy('updated_at','DESC');
    }

    public static function boot(){
        parent::boot();

        // creating ---> clear cache with id post
        // static::creating(function(Comment $comment){
        //     Cache::forget("post-show-{$comment->commentable->id}");
        // });
    }



}
