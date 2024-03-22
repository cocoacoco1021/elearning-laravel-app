<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $fillable = [
        'user_id', 'category_id'
    ];

    public function answers()
    {
        return $this->hasMany('App\Answer');
    }

    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function activity()
    {
        return $this->morphOne('App\Activity', 'action');
    }

    public function correctAnswers()
    {
        $answers = $this->answers;
        $count = 0;

        foreach ($answers as $answer) {
            if($answer->choice->is_correct == 1) {
                $count++;
            }
        }

        return $count;
    }
}
