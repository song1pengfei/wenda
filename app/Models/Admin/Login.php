<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Login extends Model
{
    protected $table = 'login';
    public $primaryKey='id';
	public $timestamps = false;
	protected $fillable = ['login_name','login_email','login_phone','login_password','login_time','login_ip'];
}
