<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VoteUnvoteJawaban extends Model
{
    //

    protected $guarded = [];
    public $timestamps = false;


    public function vote_unvote_user()
    {
        return $this->belongsToMany('App\User', 'users', 'users_id', 'poin');
    }

    public function jawabans()
    {
        return $this->belongsTo('App\Jawaban');
    }

    public function users()
    {
        return $this->belongsTo('App\User');
    }
}
