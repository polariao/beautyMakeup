<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table='category';
    protected $primaryKey='id';
    protected $fillable=['id','stu_name','stu_no','cate_no'];
    public $timestamps = false;
    protected $guarded=[];
}
