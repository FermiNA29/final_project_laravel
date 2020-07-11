<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pertanyaan extends Model
{
    //
    protected $table = "pertanyaans";
    protected $guarded = [];

    public function users()
    {
        return $this->belongsTo('App\User');
    }

    public function vote_pertanyaan()
    {
        return $this->belongsToMany('App\VoteUnvotePertanyaan');
    }

    // public function vote_unvote_pertanyaan()
    // {
    //     return $this->belongsToMany('App\VoteUnvotePertanyaan', 'vote_unvote_pertanyaans', 'users_id', 'pertanyaans_id');
    // }
}
