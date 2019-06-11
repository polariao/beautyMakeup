<?php
namespace App\Http\Controllers\Admin;
use App\Http\Model\Admin;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Input;
require_once './code/Code.class.php';
class LoginController extends CommonController
{
    public function login(){
        //间接判断是否为POST方发提交,如果$input为空,则为get提交
        if ($input = Input::all()){
            //获取验证码上的值
            $code = new \Code();
            $getCode = $code->get();
            if (strtoupper($input['code'])!=$getCode){
                return back()->with('msg','验证码错误!');
            }
            $user=Admin::where('name',$input['username'])->first();
            if (!$user){
                return back()->with('msg','用户名不存在!');
            }
            if ($user['status']==0){
                return back()->with('msg','未授权，请找管理员授权后，进行登录');
            }
            if ($input['password']!=Crypt::decrypt($user->password)){
                return back()->with('msg','密码错误!');
            }
            session(['admin'=>$user]);
            return redirect('admin');
        }else{
            return view('admin.login');
        }

    }

    public function code(){
        $code = new \Code;
        $code->make();
    }
    public function loginout(){
        session(['user'=>null]);
        return redirect('admin/login');
    }


}