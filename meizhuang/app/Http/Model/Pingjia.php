<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Pingjia extends Model
{
    protected $table='tb_pingjia';
    protected $primaryKey='id';
    public $timestamps = false;
    protected $fillable=['id','userid','spid','time','content'];
    protected $guarded=[];
}
