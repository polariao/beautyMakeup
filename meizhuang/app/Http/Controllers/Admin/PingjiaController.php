<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Pingjia;
use App\Http\Model\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class PingjiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $date = [];
        $data = Pingjia::orderby('id','desc')->paginate(6);
        foreach ($data as $k=>$v){
            $pro = Product::find($v->spid);
            $date[$k]['id']=$v['id'];
            $date[$k]['userid']=$v['userid'];
            $date[$k]['content']=$v['content'];
            $date[$k]['time']=$v['time'];
            $date[$k]['spmingcheng']=$pro['spmingcheng'];
            $date[$k]['tupianurl']=$pro['tupianurl'];

        }
        return view('admin.pingjia.index',compact('date','data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $rel = Pingjia::where('id',$id)->delete();
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
    public function select(){
        $id = Input::all();
        $data = Pingjia::where('userid',$id['id'])->get();
        foreach ($data as $k=>$v){
            $pro = Product::find($v->spid);
            $date[$k]['id']=$v['id'];
            $date[$k]['userid']=$v['userid'];
            $date[$k]['content']=$v['content'];
            $date[$k]['time']=$v['time'];
            $date[$k]['spmingcheng']=$pro['spmingcheng'];
            $date[$k]['tupianurl']=$pro['tupianurl'];

        }
        return view('admin.pingjia.select',compact('data','date'));
    }
}
