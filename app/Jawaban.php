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
}
