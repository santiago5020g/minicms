<?php

namespace App\Models\Cr;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Section extends Model
{
    use SoftDeletes;
    protected $table = 'cr_sections';
    protected $primaryKey = 'id';
    protected $dates = ['created_at','deleted_at'];
    protected $fillable = ['name','content','number','id_status','id_page'];

    
    public function page()
    {
    	return $this->belongsTo("App\Models\Cr\Page","id_page");
    }

}
