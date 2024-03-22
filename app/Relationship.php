<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Relationship extends Model
{
    public function activity()
    {
        return $this->morphOne('App\Activity', 'action');
    }

    public function follower()
    {
        return $this->belongsTo('App\User', 'follower_id', 'id');
    }

    public function followed()
    {
        return $this->belongsTo('App\User', 'followed_id', 'id');
    }
}
