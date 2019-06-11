<?php

namespace App\Http\Controllers\Admin;
use App\Http\Model\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class CategoryController extends CommonController
{
    //get:   admin/category ,全部分类列表
    public function index()
    {
        $data = Category::orderBy('id','desc')->paginate(8);
        return view('admin.category.index',compact('data'));
    }
    /**
     * 添加内容
     */
    //get:   admin/category/create ，添加分类
    public function create()
    {
        return view('admin.category.add');
    }

    //post:   admin/category/ 添加分类提交
    public function store()
    {
        $rules = [
            'typename'=>'required',
        ];

        $message=[
            'typename.required'=>'分类名称不能为空！',
        ];
        //  except('字段')将指定字段排除掉
        if ($input = Input::except('_token')){
            $validate = Validator::make($input,$rules,$message);
            if ($validate->passes()){
                $rel = Category::create($input);
                if ($rel){
                    return redirect('admin/category');
                }else{
                    return back()->with('errors','添加失败');
                }

            }else{
                return back()->withErrors($validate);
            }
        }else{
            return view('admin.category.add');
        }

    }
    /**
     * 修改内容
     */
    //get: admin/category/{category}/edit  编辑分类
    public function edit($id)
    {
        $data = Category::find($id);
        return view('admin.category.edit',compact('data'));
    }
    //put:  admin/category/{category} ，更新分类
    public function update($id)
    {
        $input = Input::except('_token','_method');
        $rel = Category::where('id',$id)->update($input);
        if ($rel){
            return redirect('admin/category');
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
        $rel = Category::where('id',$id)->delete();
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
