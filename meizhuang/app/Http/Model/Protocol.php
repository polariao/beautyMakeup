<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Protocol extends Model
{
    protected $table='tb_xieyi';
    protected $primaryKey='id';
    public $timestamps = false;
    protected $fillable=['id','content'];
    protected $guarded=[];
}
