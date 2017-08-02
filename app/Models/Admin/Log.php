<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $table = 'log';
    public $primaryKey='id';
	public $timestamps = false;
	protected $fillable = ['user_id','log_time','log_ip','logoff_time'];

}
