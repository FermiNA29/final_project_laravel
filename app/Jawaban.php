<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jawaban extends Model
{
    //
    protected $table = "jawabans";
    protected $guarded = [];

    public function users()
    {
        return $this->belongsTo('App\User');
    }
    public function vote_unvote_jawaban()
    {
        return $this->belongsToMany('App\VoteUnvoteJawaban', 'vote_unvote_jawabans', 'users_id', 'jawabans_id');
    }
}
