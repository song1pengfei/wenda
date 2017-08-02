<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Notice extends Model
{
	use SoftDeletes;
	
    protected $table = "notice";
	
	public $primaryKey='id';
	
	public $timestamps = false;
	
	protected $fillable = ['notice_title','notice_content','notice_time'];
	
	protected $dates = ['deleted_at'];
}
