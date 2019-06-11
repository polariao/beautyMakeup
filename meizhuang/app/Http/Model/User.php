<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table='tb_user';
    protected $primaryKey='id';
    public $timestamps = false;
    protected $fillable=['id','name','password','dongjie','email','sfzh','tel','qq','tishi','huida','dizhi','youbian','time','true_name','password1'];
}
