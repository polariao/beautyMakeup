<?php

namespace App\Http\Controllers\Admin;

use App\HTTP\Model\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    //get:   admin/category ,全部分类列表
    public function index()
    {
        $data = User::orderBy('id','desc')->paginate(6);
        return view('admin.user.index',compact('data'));
    }
    /**
     * 添加内容
     */
    //get:   admin/category/create ，添加分类
    public function create()
    {
    }

    //post:   admin/category/ 添加分类提交
    public function store()
    {


    }
    /**
     * 修改内容
     */
    //get: admin/category/{category}/edit  编辑分类
    public function edit($id)
    {
        $editId = User::find($id);
        return view('admin.user.edit',compact('editId'));
    }
    //put:  admin/category/{category} ，更新分类
    public function update($id)
    {
        $input = Input::except('_token','_method');
        $rel = User::where('id',$id)->update($input);
        if ($rel){
            return redirect('admin/user');
        }else{
            return back()->with('msg','修改失败');
        }


    }
    //get:  admin/category/{category} //展示分类
    public function show()
    {

    }

    //delete: admin/category/{category}  删除分类
    public function destroy($id)
    {
        $rel = User::where('id',$id)->delete();
        if ($rel){
            $data=[
                'status'=>0,
                'msg'=>'删除成功'
            ];
        }else{
            $data=[
                'status'=>1,
                'msg'=>'删除失败'
            ];
        }
        return $data;
    }
    //delete: admin/category/{category}  删除分类
    public function Dongjie($id)
    {
        $input = [];
        $res = User::find($id);
        if ($res['dongjie']==0){
            $input['dongjie'] = 1;
        }elseif ($res['dongjie']==1){
            $input['dongjie'] = 0;
        }
        $rel = User::where('id',$id)->update($input);
        if ($rel){
            $data=[
                'status'=>0,
                'msg'=>'冻结成功'
            ];
        }else{
            $data=[
                'status'=>1,
                'msg'=>'冻结失败'
            ];
        }
        return $data;
    }
    /*
     * 搜索学生信息
     */
    public function select(){
        $id = Input::all();
        $data = User::where('name','like','%'.$id['id'].'%')->get();
        return view('admin.user.select',compact('data'));
    }


}
