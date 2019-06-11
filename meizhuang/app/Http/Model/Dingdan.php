<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Dingdan extends Model
{
    protected $table='tb_dingdan';
    protected $primaryKey='id';
    public $timestamps = false;
    protected $fillable=['id','number','dingdanhao','spc','shouhuoren','sex','dizhi','youbian','tel','email','shff','zhhh','leaveword','status','xiadanren','total','time'];
    protected $guarded=[];
}
