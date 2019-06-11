<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Lunbotu extends Model
{
    protected $table='tb_lunbotu';
    protected $primaryKey='id';
    public $timestamps = false;
    protected $fillable=['id','image','image_url','content'];
    protected $guarded=[];
}
