<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
          'trainer_id',
          'name',
          'email',
          'phone',
          'photo',
          'bd',
          'adress',
          'idcard',
          'graduate',
          'gender'
    ];    

    public function courses()
    {
    	return $this->belongsToMany('App\Course');
    }

    public function getCoursesListArrtibute()
    {
    	return $this->courses->lists('id');
    }
}
