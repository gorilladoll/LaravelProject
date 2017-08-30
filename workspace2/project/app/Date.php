<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Date extends Model
{
    //
    protected $fillable = [
        'user_id','title','start','end'
    ];


    protected $hidden = [];
}
