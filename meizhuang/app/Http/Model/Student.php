<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table='student';
    protected $primaryKey='stu_id';
    protected $fillable=['stu_name','stu_no','stu_class','stu_sex','stu_tel','stu_email','stu_wei'];
    public $timestamps = false;
}
