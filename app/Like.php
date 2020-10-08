<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $table = 'likes';
// relacion una imagen muchos comments
    public function images(){

        return $this->belongsTo('App\Image', 'image_id'); 
    }
// relacion con User muchos comments

    public function users(){

         return $this->belongsTo('App\User', 'user_id'); 
    }

}
