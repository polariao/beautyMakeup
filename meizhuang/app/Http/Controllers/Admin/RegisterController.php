<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Model\Admin;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    //
    public function register(){
        return view('admin.register');
    }

    public function store(){

        $rules = [
            'name'=>'required',
            'password'=>'required|min:6',
        ];
        $message=[
            'name.required'=>'用户名为必填项！',
            'password.required|min'=>'密码不能少于六位！',
        ];
        //  except('字段')将指定字段排除掉
        if ($input = Input::except('_token')){
            $name = Admin::where('name',$input['name'])->first();
            if ($name){
                return back()->with('errors','用户名已存在');
            }else{
                if ($input['password']==$input['repass']){
                    $validate = Validator::make($input,$rules,$message);
                    if ($validate->passes()){
                        $arr = array();
                        $arr['name']=$input['name'];
                        $arr['password']=Crypt::encrypt($input['password']);
                        $rel = Admin::create($arr);
                        if ($rel){
                            return redirect('admin/login');
                        }else{
                            return back()->with('errors','添加失败');
                        }
                    }else{
                        return back()->withErrors($validate);
                    }
                }else{
                    return back()->with('errors','密码不一致');
                }

            }


        }else{
            return view('admin.register');
        }



    }
}
