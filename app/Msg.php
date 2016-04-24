<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Msg extends Model
{
    protected $fillable = [
          'name',
          'email',
          'phone',
          'content'
    ];        

    public $timestamps = false;
}
