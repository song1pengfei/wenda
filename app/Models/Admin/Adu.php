<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Adu extends Model
{
	use SoftDeletes;
    protected $table = "adu";
	public $primaryKey='id';
	public $timestamps = false;
	protected $fillable = ['adu_title','adu_img'];
	protected $dates = ['deleted_at'];
}
