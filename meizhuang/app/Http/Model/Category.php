<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table='tb_type';
    protected $primaryKey='id';
    public $timestamps = false;
    protected $fillable=['id','typename','content'];
    protected $guarded=[];
}
