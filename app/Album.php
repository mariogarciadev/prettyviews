<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $fillable = array('title', 'description', 'cover_picture');

    // Has Many Photos
    public function photos(){
        return $this->hasMany('App\Photo');
    }

    // Belongs to User
    public function user(){
        return $this->belongsTo('App\User');
    }
}
