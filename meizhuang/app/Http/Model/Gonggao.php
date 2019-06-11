<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Gonggao extends Model
{
    protected $table='tb_gonggao';
    protected $primaryKey='id';
    public $timestamps = false;
    protected $fillable=['id','title','content','time','update_time'];
    protected $guarded=[];
}
