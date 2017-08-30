<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lab extends Model
{
    //
    protected $fillable = [
      'lab_name','background_img','left_img','center_img','right_img',
      'font_style','font_size','font_color','font_weight'
    ];

    protected $hidden = [
      'created_at','updated_at'
    ];
}
