<?php

namespace App\Models\Cr;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{
    use SoftDeletes;
    protected $table = 'cr_menus';
    protected $primaryKey = 'id';
    protected $dates = ['created_at','deleted_at'];


    public function status()
    {
    	return $this->belongsTo("App\Models\Cr\Statuses","id_status");
    }

    public function pages()
    {
    	return $this->hasMany("App\Models\Cr\Page","id_menu");
    }
}
