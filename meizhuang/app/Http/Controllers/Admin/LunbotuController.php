<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Lunbotu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;

class LunbotuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Lunbotu::orderby('id','desc')->get();
        return view('admin.lunbotu.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.lunbotu.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->isMethod('POST')) {
            $file = $request->file('image');
            if (!$file){
                return back()->with('msg','请选择要上传的图片');
            }
            //判断文件是否上传成功
            if ($file->isValid()) {
                //原文件名
                $originalName = $file->getClientOriginalName();
                $exists = Storage::disk('uploads')->exists($originalName);
                if ($exists) {
                    return back()->with('msg', '此文件已存在');
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
                    $fileData['image_url'] = './uploads/' . date('Ymd') . '/' . $originalName;
                    $fileData['image'] = $originalName;;
                    $rel = Lunbotu::create($fileData);
                    if ($rel) {
                        echo "<script> window.parent.location=location; </script>";
                    }
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
        $res = Lunbotu::find($id);
        $exists = Storage::disk('uploads')->exists($res['image']);
        if ($exists){
            // 取到磁盘实例
            $disk = Storage::disk('uploads');

            // 删除单条文件
            $re = $disk->delete($res['image']);
            if ($re){
                $rel = Lunbotu::where('id',$id)->delete();
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

}
