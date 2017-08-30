<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Myshop extends Model
{
    //
    protected $fillable = [
        'title', 'introduce', 'jsonfile','max_sellpoint','min_sellpoint',
        'join_count','user_id','ticket','created_at','updated_at'
    ];


    protected $hidden = [
      'user_id','created_at','updated_at'
    ];
}
