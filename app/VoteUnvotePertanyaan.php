<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VoteUnvotePertanyaan extends Model
{
    protected $guarded = [];
    public $timestamps = false;


    public function vote_unvote_user()
    {
        return $this->belongsToMany('App\User', 'users', 'users_id', 'poin');
    }

    public function pertanyaans()
    {
        return $this->hasOne('App\Pertanyaan');
    }
}
