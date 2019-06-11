<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Category;
use App\Http\Model\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Product::orderBy('id','desc')->paginate(6);
        foreach ($data as $v){
            $cateName = Category::find($v['typeid']);
            $v['typeid']=$cateName['typename'];
        }
        return view('admin.product.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cate = Category::all();

        return view('admin.product.add',compact('cate'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //  $cate = Input::all();
        if ($request->isMethod('POST')) {
            $file = $request->file('tupian');
            if (!$file){
                return back()->with('msg','请选择要上传的图片');
            }
            //判断文件是否上传成功
            if ($file->isValid()) {
                //原文件名
                $originalName = $file->getClientOriginalName();
                $exists = Storage::disk('uploads')->exists($originalName);
                if ($exists){
                    return back()->with('msg','此文件已存在');
                }
                //扩展名
                $ext = $file->getClientOriginalExtension();

                //MimeType
                $type = $file->getClientMimeType();

                //临时绝对路径
                $realPath = $file->getRealPath();
                $filename = uniqid() . '.' . $ext;
                $bool = Storage::disk('uploads')->put($originalName, file_get_contents($realPath));

                //判断是否上传成功
                if ($bool) {
                    $fileData = Input::except('_token');
                    $fileData['tupianurl'] = './uploads/'.date('Ymd').'/'.$originalName;
                    $fileData['tupian'] = $originalName;
                    $fileData['time']=strtotime($fileData['time']);
                    $rel = Product::create($fileData);
                    if ($rel){
                        return redirect('admin/product');
                    }
                } else {
                    return back();
                }

            }
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editId = Product::find($id);
        $cate = Category::all();
        return view('admin.product.edit',compact('editId','cate'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        //
         $input = Input::except('_token','_method');
        $rel = Product::where('id',$id)->update($input);
        if ($rel){
            return redirect('admin/product');
        }else{
            return back()->with('msg','修改失败');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $res = Product::find($id);
        $exists = Storage::disk('uploads')->exists($res['tupian']);
        if ($exists){
            // 取到磁盘实例
            $disk = Storage::disk('uploads');

            // 删除单条文件
            $re = $disk->delete($res['tupian']);
            if ($re){
                $rel = Product::where('id',$id)->delete();
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
        }

    }


    /**
     * 搜索全部商品
     */
    public function select(){
        $id = Input::all();
        $data = Product::where('spmingcheng','like','%'.$id['id'].'%')->get();
        return view('admin.product.select',compact('data'));
    }
    /**
    * 搜索等待上架的商品
    */
    public function selectReady(){
        $id = Input::all();
        $data = Product::where('spmingcheng','like','%'.$id['id'].'%')->where( 'time','>',time()+8*60*60)->where('status',1)->get();
        return view('admin.product.selectready',compact('data'));
    }
    /**
     * 搜索已上架的商品
     */
    public function selectUp(){
        $id = Input::all();
        $data = Product::where('spmingcheng','like','%'.$id['id'].'%')->where( 'time','<',time()+8*60*60)->where('status',1)->get();
        return view('admin.product.selectup',compact('data'));
    }
    /**
     * 搜索已上架的商品
     */
    public function selectDown(){
        $id = Input::all();
        $data = Product::where('spmingcheng','like','%'.$id['id'].'%')->where('status',0)->get();
        return view('admin.product.selectdown',compact('data'));
    }
}
