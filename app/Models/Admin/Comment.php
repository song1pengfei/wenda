<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = "comment";
	public $primaryKey='id';
	public $timestamps = false;
}
