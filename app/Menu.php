<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class MenuController
 *
 * @author  The scaffold-interface created at 2016-04-09 04:44:41pm
 * @link  https://github.com/amranidev/scaffold-interfac
 */
class Menu extends Model
{

    public $timestamps = false;
    
    protected $table = 'menus';

    protected $fillable = array('parent_id','title','url','order');

    public function parent()
    {
        return $this->belongsTo('App\Menu', 'parent_id');
    }

	public function children()
    {
        return $this->hasMany('App\Menu', 'parent_id');
    }



}
