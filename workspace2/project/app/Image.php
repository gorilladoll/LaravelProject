<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    //
    protected $fillable = [
        'image_category','filename','board_id','goods_id','created_at','updated_at'
    ];


    protected $hidden = [
      'board_id','created_at','updated_at'
    ];
}
