<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Product;
use App\Http\Model\Protocol;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class CommonController extends Controller
{

    public function update1(){
        $data = Protocol::first();
        return view('admin.protocol',compact('data'));
    }
    public function store(){
        $data = Input::except('_token');
        $date = [];
        $date['content'] = $data['content'];
        $rel = Protocol::where('id',$data['id'])->update($date);
        if ($rel){
            return back()->with('msg','修改成功');
        }

    }
}
