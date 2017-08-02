<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $table="answer";
    public $timestamps = false;
    public $primaryKey='id';
    protected $fillable = ['answer_img'];

}
