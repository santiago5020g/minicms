<?php

namespace App\Models\Cr;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model
{
    use SoftDeletes;
    protected $table = 'cr_users';
    protected $primaryKey = 'id';
    protected $dates = ['created_at','deleted_at'];


    public function User()
    {
    	return belongsTo("App\Models\Cr\Statuses","id_status");
    }

}
