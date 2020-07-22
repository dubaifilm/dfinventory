<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class df_checkouts extends Model
{
  protected $casts = [
    'o_subf' => 'array'
  ];
    //
}
