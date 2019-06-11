<?php

namespace App\Http\Controllers\Admin;

class IndexController extends CommonController
{
    public function index(){
        return view('admin.index');
    }
    public function welcome(){
        return view('admin.welcome');
    }
}
