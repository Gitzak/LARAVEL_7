<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Image extends Model
{
    protected $fillable = ['path'];

    // public function Post(){
    //     return $this->belongsTo(Post::class);
    // }

    public function imageable()
    {
        return $this->morphTo();
    }

    public function url_image_path()
    {
        return Storage::url($this->path);
    }
}
