<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    //
    protected $fillable = [
        'content','myshop_id','created_at','updated_at'
    ];


    protected $hidden = [
      'myshop_id'
    ];
}
