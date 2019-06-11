<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table='tb_admin';
    protected $primaryKey='id';
    public $timestamps = false;
    protected $fillable=['id','name','password','status'];
    protected $guarded=[];
}
