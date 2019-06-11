<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Input;
use think\Session;

class AdminController extends Controller
{
    //get:   admin/category ,全部分类列表
    public function index()
    {
        $data = Admin::where('status',1)->orderBy('id','desc')->paginate(10);
        return view('admin.admin.index',compact('data'));
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
        $data = Admin::find($id);
        if (session('admin.name')==$data['name']||session('admin.name')=='admin'){
            return view('admin.admin.edit',compact('data'));
        }else{
            return back()->with('msg','权限不足');
        }
//
    }
    //put:  admin/category/{category} ，更新分类
    public function update($id)
    {
        $input = Input::except('_token','_method');
        if ($input['password']==null||$input['password2']==null){
            return back()->with('msg','密码不为空');
        }
        if ($input['password']!=$input['password2']){
            return back()->with('msg','密码不一致');
        }
        $input['password'] = Crypt::encrypt($input['password']);

        $arr = [];
        $arr['name'] = $input['name'];
        $arr['password'] = $input['password'];
        $rel = Admin::where('id',$id)->update($arr);
        if ($rel){
            return redirect('admin/admin');
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
        $re = Admin::find($id);
        if ($re['name']=='admin'){
            return back()->with('msg','超级管理员用户不可删除');
        }
        $rel = Admin::where('id',$id)->delete();
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
    /*
     * 搜索学生信息
     */
    public function select(){
        $id = Input::all();
        $data = Student::where('stu_name',$id['id'])->orwhere('stu_class',$id['id'])->orwhere('stu_no',$id['id'])->get();
        return view('admin.student.select',compact('data'));
    }


}
