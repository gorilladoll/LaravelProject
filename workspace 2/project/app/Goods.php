<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    //
    protected $fillable = [
        'name','myshop_id','user_id','category','image_id'
    ];


    protected $hidden = [
      'board_id','user_id','image_id'
    ];
}
