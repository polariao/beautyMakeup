<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Dingdan;
use App\Http\Model\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class DingdanController extends Controller
{
    //get:   admin/category ,全部分类列表
    public function index()
    {
        $data = Dingdan::where('status',1)->orwhere('status',0)->orderBy('id','desc')->paginate(5);

        if ($data){
            foreach ($data as $v){
                $pro =  Product::find($v->spc);
                $v->spc = $pro->spmingcheng;
                $v->sex=$pro->tupianurl; // 图片地址
                $v->danjia=$pro->huiyuanjia;
            }
        }

        return view('admin.dingdan.index',compact('data'));
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
        $data = Dingdan::find($id);
        return view('admin.dingdan.edit',compact('data'));
    }
    //put:  admin/category/{category} ，更新分类
    public function update($id)
    {
        $input = Input::except('_token','_method');
        $rel = Dingdan::where('id',$id)->update($input);
        if ($rel){
            return redirect('admin/dingdan');
        }else{
            return back()->with('msg','修改失败');
        }


    }


    //get:  admin/category/{category} //展示分类
    public function show()
    {

    }

    public function destroy($id)
    {
        $rel = Dingdan::where('id',$id)->delete();
        if ($rel){
            $data=[
                'status'=>0,
                'msg'=>'订单删除成功'
            ];
        }else{
            $data=[
                'status'=>1,
                'msg'=>'订单删除失败'
            ];
        }
        return $data;
    }

    //delete: admin/category/{category}  删除分类
    public function fahuo($id)
    {
        $date=[];
        $ding = Dingdan::find($id);
        if ($ding['status']==0){
            $date['status']=1;
        }elseif ($ding['status']==1){
            $date['status']=0;
        }
        $rel = Dingdan::where('id',$id)->update($date);
        if ($rel){
            $data=[
                'status'=>0,
                'msg'=>'操作成功'
            ];
        }else{
            $data=[
                'status'=>1,
                'msg'=>'操作失败'
            ];
        }
        return $data;
    }

    /**
     * 搜索订单
     */
    public function select(){
        $id = Input::all();
        $data = Dingdan::where('dingdanhao',$id['id'])->orwhere('shouhuoren',$id['id'])->where('status','!=',2)->get();
        foreach ($data as $v){
            $pro =  Product::find($v->spc);
            $v->spc = $pro->spmingcheng;
            $v->sex=$pro->tupianurl; // 图片地址
            $v->danjia=$pro->huiyuanjia;
        }
        return view('admin.dingdan.select',compact('data'));
    }
}
