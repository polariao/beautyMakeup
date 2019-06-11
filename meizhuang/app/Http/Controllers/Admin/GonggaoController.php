<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Gonggao;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class GonggaoController extends Controller
{
    //get:   admin/category ,全部分类列表
    public function index()
    {
        $data = Gonggao::orderBy('id','desc')->paginate(10);
        return view('admin.gonggao.index',compact('data'));
    }
    /**
     * 添加内容
     */
    //get:   admin/category/create ，添加分类
    public function create()
    {
        return view('admin.gonggao.add');
    }

    //post:   admin/category/ 添加分类提交
    public function store()
    {

        $rules = [
            'title'=>'required',
        ];

        $message=[
            'title.required'=>'公告标题不能为空！',
        ];

        //  except('字段')将指定字段排除掉
        if ($input = Input::except('_token')){
            $validate = Validator::make($input,$rules,$message);
            if ($validate->passes()){
                $input['time']=date('Y-m-d H:i:s',time()+8*60*60);
                $rel = Gonggao::create($input);
                if ($rel){
                    return redirect('admin/gonggao');
                }else{
                    return back()->with('errors','添加失败');
                }

            }else{
                return back()->withErrors($validate);
            }
        }else{
            return view('admin.gonggao.add');
        }

    }
    /**
     * 修改内容
     */
    //get: admin/category/{category}/edit  编辑分类
    public function edit($id)
    {
        $data = Gonggao::find($id);
        return view('admin.gonggao.edit',compact('data'));
    }
    //put:  admin/category/{category} ，更新分类
    public function update($id)
    {
        $input = Input::except('_token','_method');
        $rel = Gonggao::where('id',$id)->update($input);
        if ($rel){
            return redirect('admin/gonggao');
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
        $rel = Gonggao::where('id',$id)->delete();
        if ($rel){
            $data=[
                'status'=>0,
                'msg'=>'分类删除成功'
            ];
        }else{
            $data=[
                'status'=>1,
                'msg'=>'分类删除失败'
            ];
        }
        return $data;
    }

}
