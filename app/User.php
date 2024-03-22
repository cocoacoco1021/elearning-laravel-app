<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

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
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function lessons(){
        return $this->hasMany('App\Lesson');
    }

    public function learnedWords(){
        $learnedWords = collect();

        foreach($this->lessons as $lesson){
            foreach($lesson->answers as $answer){
                $learnedWords->push($answer);
            }
        }
        return $learnedWords;
    }

    public function activities()
    {
        return $this->hasMany('App\Activity');
    }

    public function followers(){
        
        //Getting all followers of this User
        return $this->belongsToMany('App\User', 'relationships', 'followed_id', 'follower_id')->withTimestamps();
    }

    public function followedUsers(){

        //Getting all the users being followedby this User
        return $this->belongsToMany('App\User', 'relationships', 'follower_id' ,'followed_id')->withTimestamps();
    }

    public function isFollowing($followed_id){

        return $this->followedUsers()->where('followed_id', $followed_id)->exists();
        // return $this->followedUsers()->where('followed_id', $user->id)->exists();
    }
}
