<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Choice extends Model
{
    protected $fillable=[
        'question_id', 'text', 'is_correct'
    ];

    public function question(){
        return $this->belongsTo('App\Question');
    }

    public function answer(){
        return $this->hasMany('App\Answer');
    }
}
