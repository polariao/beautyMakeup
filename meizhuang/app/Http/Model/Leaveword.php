<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Leaveword extends Model
{
    protected $table='tb_leaveword';
    protected $primaryKey='id';
    public $timestamps = false;
    protected $fillable=['id','userid','title','content','time'];
    protected $guarded=[];
}
