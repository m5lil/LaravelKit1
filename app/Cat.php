<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class Cat extends Model implements SluggableInterface
{
    protected $guarded = [];

    public function posts()
    {
    return $this->hasMany('App\Posts','cat_id');
    }
	use SluggableTrait;
    protected $sluggable = [
        'build_from' => 'name',
        'save_to'    => 'slug',
    ];
}
