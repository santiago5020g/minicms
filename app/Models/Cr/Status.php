<?php

namespace App\Models\Cr;

use Illuminate\Database\Eloquent\Model;


class Status extends Model
{
    protected $table = 'cr_statuses';
    protected $primaryKey = 'id';
    public $timestamps = false;


    public function Users()
    {
    	return hasMany("App\Models\Cr\User","id_status");
    }

    public function Menus()
    {
    	return hasMany("App\Models\Cr\Menu","id_status");
    }

    public function Pages()
    {
    	return hasMany("App\Models\Cr\Page","id_status");
    }

}
