<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table='tb_shangpin';
    protected $primaryKey='id';
    public $timestamps = false;
    protected $fillable=['id','spmingcheng','spjianjie','time','spdengji','xinghao','tupian','shuliang','cishu','tupianurl','typeid','huiyuanjia','shichangjia','pinpai','update_at','chengben'];
    protected $guarded=[];
}
