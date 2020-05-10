<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Relationship extends Model
{
    protected $guarded = ['id'];

    public function follower()
    {
        return $this->belongsTo(User::class, "id", "follower_id");
    }

    public function followed()
    {
        return $this->belongsTo(User::class, "id", "followed_id");
    }
}
