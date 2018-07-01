<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cate extends Model
{
    protected $table = 'cate';
    protected $primaryKey = 'cate_id';
    public $timestamps = false;
    /**
    * 可被批量赋值的属性
    *
    * @var 
    */ 
    protected $fillable = ['cate_name','pid','path','cate_id'];
    // protected $fillable = ['pid'];
    // protected $fillable = ['path'];
    // protected $fillable = ['cate_id'];
    // protected $fillable = ['cate_name'];
}
