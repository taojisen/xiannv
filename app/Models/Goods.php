<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    /**
    * 
    *
    * @var 
    */ 
    protected $table = 'goods';
    protected $primaryKey = 'goods_id';
    public $timestamps = true;

    /**
     * 不可被批量赋值的属性。
     *
     * @var array
     */
    protected $guarded = [];
    /**
    * 可被批量赋值的属性
    *
    * @var 
    */ 
    // protected $fillable = [];
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'update_at';

    /**
     * 模型的日期字段保存格式。
     *
     * @var string
     */
    protected $dateFormat = 'U';
}
