<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{   
    protected $table = 'user';
    protected $primaryKey = 'user_id';
    public $timestamps = false;
    /**
    * 可被批量赋值的属性
    *
    * @var 
    */ 
    protected $fillable = ['name'];
}
