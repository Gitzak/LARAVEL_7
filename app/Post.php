<?php

namespace App;

use App\Scopes\AdminShopDeleteScope;
use App\Scopes\LatestScope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Cache;

class Post extends Model
{

    use SoftDeletes;
    
    protected $fillable = ['title','content','slug','active','user_id'];

    public function image(){
        return $this->hasOne(Image::class);
    }

    public function comments(){
        return $this->hasMany('App\Comment')->dernier();
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function tags(){
        return $this->belongsToMany('App\Tag')->withTimestamps();
    }

    public function scopeMostCommented(Builder $query){
        return $query->withCount('comments')->orderBy('comments_count','DESC');
    }

    public function scopePostWithUserCommentsTags(Builder $query){
        return $query->withCount('comments')->with(['user','tags']);
    }

    public static function boot(){
        
        static::addGlobalScope(new AdminShopDeleteScope);

        parent::boot();

        static::addGlobalScope(new LatestScope);

        // Deleting related model using model events
        static::deleting(function(Post $post){
            // dd('deleting');
            $post->comments()->delete();
        });

        // Restoring related model using model events
        static::restoring(function(Post $post){
            $post->comments()->restore();
        });

        // updating ---> clear cache with id post
        static::updating(function(Post $post){
            Cache::forget("post-show-{$post->id}");
        });
    }

    // 

}
