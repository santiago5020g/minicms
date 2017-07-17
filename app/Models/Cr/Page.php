<?php

namespace App\Models\Cr;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model
{
    use SoftDeletes;
    protected $table = 'cr_pages';
    protected $primaryKey = 'id';
    protected $dates = ['created_at','deleted_at'];


    public function status()
    {
    	return belongsTo("App\Models\Cr\Statuses","id_status");
    }

    public function Menu()
    {
    	return belongsTo("App\Models\Cr\Menu","id_menu");
    }
}
