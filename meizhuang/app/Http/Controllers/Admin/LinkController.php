<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Link;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class LinkController extends Controller
{
    //get:   admin/category ,全部分类列表
    public function index()
    {
        $data = Link::orderBy('id','desc')->paginate(10);
        return view('admin.links.index',compact('data'));
    }
    /**
     * 添加内容
     */
    //get:   admin/category/create ，添加分类
    public function create()
    {
        return view('admin.links.add');
    }

    //post:   admin/category/ 添加分类提交
    public function store()
    {

        $rules = [
            'link_name'=>'required',
            'link_url'=>'required',
        ];

        $message=[
            'link_name.required'=>'链接名称不能为空！',
            'link_url.required'=>'链接地址不能为空！',
        ];

        //  except('字段')将指定字段排除掉
        if ($input = Input::except('_token')){
            $validate = Validator::make($input,$rules,$message);
            if ($validate->passes()){
                $rel = Link::create($input);
                if ($rel){
                    return redirect('admin/link');
                }else{
                    return back()->with('errors','添加失败');
                }

            }else{
                return back()->withErrors($validate);
            }
        }else{
            return view('admin.links.add');
        }

    }
    /**
     * 修改内容
     */
    //get: admin/category/{category}/edit  编辑分类
    public function edit($id)
    {
        $data = Link::find($id);
        return view('admin.links.edit',compact('data'));
    }
    //put:  admin/category/{category} ，更新分类
    public function update($id)
    {
        $input = Input::except('_token','_method');
        $rel = Link::where('id',$id)->update($input);
        if ($rel){
            return redirect('admin/link');
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
        $rel = Link::where('id',$id)->delete();
        if ($rel){
            $data=[
                'status'=>0,
                'msg'=>'链接删除成功'
            ];
        }else{
            $data=[
                'status'=>1,
                'msg'=>'链接删除失败'
            ];
        }
        return $data;
    }

}
