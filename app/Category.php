<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable=[
        'title', 'description',
    ];

    // protected $guarded =['id'];

    public function questions(){
        return $this->hasMany('App\Question');
    }

    public function lessons(){
        return $this->hasMany('App\Lesson');
    }
}