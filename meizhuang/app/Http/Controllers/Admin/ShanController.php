<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Category;
use App\Http\Model\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShanController extends Controller
{
    /**
     * 等待上架的商品
     */
    public function ready(){
        $data = Product::where( 'time','>',time()+8*60*60)->where('status',1)->orderBy('id','desc')->paginate(6);
        foreach ($data as $v){
            $cateName = Category::find($v['typeid']);
            $v['typeid']=$cateName['typename'];
        }
        return view('admin.product.ready',compact('data'));
    }
    /**
     * 已上架的商品
     */
    public function up(){
        $data = Product::where( 'time','<',time()+8*60*60)->where('status',1)->orderBy('id','desc')->paginate(6);
        foreach ($data as $v){
            $cateName = Category::find($v['typeid']);
            $v['typeid']=$cateName['typename'];
        }
        return view('admin.product.up',compact('data'));
    }
    /**
     * 已下架的商品
     */
    public function down(){
        $data = Product::where('status',0)->orderBy('id','desc')->paginate(6);
        foreach ($data as $v){
            $cateName = Category::find($v['typeid']);
            $v['typeid']=$cateName['typename'];
        }
        return view('admin.product.down',compact('data'));
    }
    /**
 * 下架操作
 */
    public function updateXia($id)
    {
        $input=[];
        $input['status']=0;
        $rel = Product::where('id', $id)->update($input);

        if ($rel) {
            $data = [
                'status' => 0,
                'msg' => '下架成功'
            ];
        } else {
            $data = [
                'status' => 1,
                'msg' => '下架失败'
            ];
        }
        return $data;
    }
    /**
     * 下架操作
     */
    public function updateShang($id)
    {
        $input=[];
        $input['status']=1;
        $rel = Product::where('id', $id)->update($input);

        if ($rel) {
            $data = [
                'status' => 0,
                'msg' => '上架成功'
            ];
        } else {
            $data = [
                'status' => 1,
                'msg' => '上架失败'
            ];
        }
        return $data;
    }

}
