<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    protected $table='tb_links';
    protected $primaryKey='id';
    public $timestamps = false;
    protected $fillable=['id','link_name','link_url'];
    protected $guarded=[];
}
