<?php

namespace App;

use App\Scopes\LatestScope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{

    use SoftDeletes;

    public function Post(){
        return $this->belongsTo('App\Post');
    }

    public function scopeDernier(Builder $query){
        return $query->orderBy('updated_at','DESC');
    }
    
}
