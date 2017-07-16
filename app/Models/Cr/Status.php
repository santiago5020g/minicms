<?php

namespace App\Models\Cr;

use Illuminate\Database\Eloquent\Model;


class Status extends Model
{
    protected $table = 'cr_statuses';
    protected $primaryKey = 'id';
    public $timestamps = false;


    public function User()
    {
    	return hasMany("App\Models\Cr\User","id_status");
    }
}
