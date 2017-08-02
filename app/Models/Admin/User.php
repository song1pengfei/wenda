<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'user';
    public $primaryKey='id';
	public $timestamps = false;
	protected $fillable = ['login_id','user_name','user_sex','user_img','user_address','user_age'];
}
