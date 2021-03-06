<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    public const LOCALES = [
        'en' => 'English',
        'fr' => 'French',
        'ar' => 'Arabic',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token','email_verified_at',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function image(){
        return $this->morphOne('App\Image','imageable');
    }

    public function posts(){
        return $this->hasMany(Post::class);
    }

    // public function Comments(){
    //     return $this->hasMany(Comment::class);
    // }

    public function Comments(){
        return $this->morphMany('App\comment','commentable');
    }

    public function scopeMostUserActive(Builder $query){
        return $query->withCount('posts')->orderBy('posts_count','DESC');
    }

    public function scopeMostUserActiveInLastMonth(Builder $query){
        return $query->withCount(['posts' => function(Builder $query){
            $query->whereBetween(static::CREATED_AT, [now()->subMonth(1),now()]);
        }])
        ->having('posts_count', '>=', '12')
        ->orderBy('posts_count', 'DESC');
    }
}
