<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = 'admin';
    public $primaryKey='id';
	public $timestamps = false;
	protected $fillable = ['admin_name','admin_password','admin_img','admin_email','admin_phone','admin_power','admin_first_time'];
}
