<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'images';

    // relacion uno a muchos/one to many
public function comments(){

    return $this -> hasMany('App\Comment');
}
public function likes(){

    return $this -> hasMany('App\Like');
}

    //relacion muchos a uno/many to one
public function user(){

    return $this -> belongsTo('App\User', 'user_id');
}
}
