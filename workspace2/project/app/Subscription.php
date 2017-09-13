<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    //
    protected $fillable = [
      'user_id','myshop_id','created_at','updated_at'
    ];


    protected $hidden = [
      'user_id','myshop_id'
    ];
}
