<?php

namespace App\Http\Controllers\Home;

use App\Http\Model\Category;
use App\Http\Model\Dingdan;
use App\Http\Model\Gonggao;
use App\Http\Model\Leaveword;
use App\Http\Model\Link;
use App\Http\Model\Lunbotu;
use App\Http\Model\Pingjia;
use App\Http\Model\Product;
use App\Http\Model\Student;
use App\Http\Model\User;
use function Couchbase\defaultDecoder;
use Illuminate\Support\Facades\Input;

class IndexController extends CommonController
{
    public function index(){
        $link = Link::get();
        $image = Lunbotu::orderby('id','desc')->get();
        $cate = Category::orderby('id','desc')->get();
        $shangpin = Product::where( 'time','<',time()+8*60*60)->where('status',1)->orderby('cishu','desc')->take(3)->get();
        $new = Product::where( 'time','<',time()+8*60*60)->where('status',1)->orderby('id','desc')->take(3)->get();
        return view('home.index',compact('link','cate','shangpin','new','image'));
    }
    /**
     * 商品详情
     */
    public function goods($id){
        $link = Link::get();
        $good = Product::where('id',$id)->first();
        $like = Product::where('typeid',$good['typeid'])->where( 'time','<',time()+8*60*60)->where('status',1)->where('id','!=',$id)->orderby('cishu','desc')->first();
        if ($like==null){
            $like = Product::where('id','!=',$id)->orderby('cishu','desc')->where( 'time','<',time()+8*60*60)->where('status',1)->first();
        }
        $pingjia = Pingjia::where('spid',$id)->orderby('time','desc')->get();
        return view('home.goods',compact('good','like','pingjia','link'));
    }
    /**
     * 添加购物车
     */
    public function add(){
        $data=[];
        $input = Input::all();
        if ($input['number']>0){
            $pro = Product::where('id',$input['id'])->first();
            if ($pro['shuliang']<= $input['number']){
                return back()->with('msg','库存不足,你可以联系商家进行添货');
            }
            $user = User::where('name',session('user.name'))->first();
            $data['dingdanhao']=mt_rand(0,999999).time();
            $data['spc'] = $input['id'];
            $data['shouhuoren'] = $user['shouhuoren'];
            $data['dizhi'] = $user['dizhi'];
            $data['youbian'] = $user['youbian'];
            $data['tel'] = $user['tel'];
            $data['email'] = $user['email'];
            $data['time'] = time()+8*60*60;
            $data['xiadanren'] = $user['name'];
            $data['number'] = $input['number'];
            $rel = Dingdan::create($data);
            if ($rel){
                $number=[];
                $number['shuliang']=$pro['shuliang']-$input['number'];
                $res = Product::where('id',$input['id'])->update($number);
                if ($res){
                    return redirect('home/shopCar');
                }
            }

        }else{
            return back()->with('msg','数量为大于0的整数');
        }

    }
    /**
     * 我的购物车
     */
    public function shopCar(){
        $link = Link::get();
        $data = Dingdan::where('xiadanren',session('user.name'))->where('status',2)->get();
        foreach ($data as $v){
            $pro =  Product::where('id',$v->spc)->first();
            $v->spc = $pro->spmingcheng;
            $v->sex=$pro->tupianurl; // 图片地址
            $v->danjia=$pro->huiyuanjia;
        }
        return view('home.shopCar',compact('link','data'));
    }

    /**
     * 修改数量
     */
    public function updateNumber($id,$value){
        $input=[];
        $input['number']=$value;
        $rel = Dingdan::where('id',$id)->update($input);
        if ($rel){
            $data=[
                'status'=>0,
                'msg'=>'修改成功'
            ];
        }else{
            $data=[
                'status'=>1,
                'msg'=>'修改失败'
            ];
        }
        return $data;
    }
    /**
     * 付款
     */
    public function fukuan(){
        $input = Input::all();
        if (!isset($input['item'])){
            echo "<script>alert('请选择要付款的商品');window.location.href='/home/shopCar';</script>";
        }
        foreach ($input['item'] as $v){
           $shop = Dingdan::find($v);
           $sp = Product::find($shop['spc']);
          if ($shop['number']>$sp['shuliang']){
              echo "<script>alert(\"库存不足:".$sp['spmingcheng']."\");window.location.href='/home/shopCar';</script>";
          }else{
              echo "<script>alert('暂未开发');window.location.href='/home/shopCar';</script>";
          }
         }
    }
    /**
     * 删除购物车
     */
    public function shopCarDel($id){
        $rel = Dingdan::where('id',$id)->delete();
        if ($rel){
            return redirect('home/shopCar');
        }
    }
    /**
     * 查看订单
     */
    public function order(){
        $link = Link::get();
        $order = Dingdan::where('xiadanren',session('user.name'))->where('status','!=',2)->get();
        foreach ($order as $v){
            $pro =  Product::find($v->spc);
            $v->spc = $pro->spmingcheng;
            $v->sex=$pro->tupianurl; // 图片地址
            $v->danjia=$pro->huiyuanjia;
        }
        return view('home.order',compact('order','link'));
    }
    /**
     * 删除订单
     */
    public function orderDel($id){
        $rel = Dingdan::where('id',$id)->delete();
        if ($rel){
            return redirect('home/order');
        }
    }
    /**
     * 全部商品
     */
    public function all(){
        $link = Link::get();
        $data = Product::where( 'time','<',time()+8*60*60)->where('status',1)->orderBy('id','desc')->paginate(6);
        return view('home.all',compact('data','link'));
    }
    /**
     * 商品搜索
     */
    public function select(){
        $link = Link::get();
        $id = Input::all();
        $data = Product::where('spmingcheng','like','%'.$id['id'].'%')->where( 'time','<',time()+8*60*60)->where('status',1)->get();
        return view('home.select',compact('data','link'));
    }
    /**
     * 分类商品
     */
    public function cate($id){
        $link = Link::get();
        $data = Product::where('typeid',$id)->where( 'time','<',time()+8*60*60)->where('status',1)->paginate(6);
        return view('home.cate',compact('data','link'));
    }
    /**
     * 商品评价
     */
    public function pingjia(){
        $input = Input::all();
        $data = [];
        $data['spid'] = $input['id'];
        $data['userid'] = session('user.name');
        $data['content'] = $input['content'];
        $data['time'] = time()+8*60*60;
        $rel = Pingjia::create($data);

        if ($rel){
            return back()->with('ms','评价成功');
        }
    }
    /**
     * 留言板
     */
    public function liuyan(){
        $link = Link::get();
        return view('home.message',compact('link'));
    }
    /**
     * 留言储存
     */
    public function leaveWord(){
        $data = [];
        $input = Input::all();
        $data['title'] = $input['title'];
        $data['content'] = $input['content'];
        $data['userid'] = session('user.name');
        $data['time'] = time()+8*60*60;
        $rel = Leaveword::create($data);
        if ($rel){
            return back()->with('msg','留言成功，感谢你提出的宝贵意见');
        }
    }
    /**
     * 活动公告
     */
    public function action(){
        $link = Link::get();
        $data = Gonggao::orderby('id','desc')->paginate(5);
        return view('home.action',compact('data','link'));
    }

    /**
     * 活动公告详情
     */
    public function actionxq($id){
        $link = Link::get();
        $data = Gonggao::find($id);
        return view('home.actionxq',compact('data','link'));
    }

}
