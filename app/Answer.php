<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable=[
        'lesson_id', 'question_id', 'choice_id'
    ];
    
    public function question(){
        return $this->belongsTo('App\Question');
    }

    public function choice(){
        return  $this->belongsTo('App\Choice');
    }

    public function lesson(){
        return $this->belongsTo('App\Lesson');
    }
}
