<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Admin;
use App\HTTP\Model\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class GiveController extends Controller
{
    //get:   admin/category ,全部分类列表
    public function index()
    {
        $data = Admin::where('status',0)->orderBy('id','desc')->paginate(1);
        return view('admin.give.index',compact('data'));
    }
    /**
     * 修改内容
     */
    //put:  admin/category/{category} ，更新分类
    public function update($id)
    {
        $arr = [];
        $arr['status'] = 1;
        $rel = Admin::where('id',$id)->update($arr);

        if ($rel){
            $data=[
                'status'=>0,
                'msg'=>'授权成功'
            ];
        }else{
            $data=[
                'status'=>1,
                'msg'=>'授权失败'
            ];
        }
        return $data;
    }

}
