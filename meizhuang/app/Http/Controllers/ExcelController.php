<?php

namespace App\Http\Controllers;

use App\Http\Model\Student;
use App\Http\Requests;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use Excel;

class ExcelController extends Controller

{

    public function export(){
        $cellData = Student::get();
        $date = [];
        $date[0] = ['姓名','学号','班级','性别','电话','邮箱','微信'];
        foreach ($cellData as $k=>$v){
            $date[$k+1]['姓名'] = $v->stu_name;
            $date[$k+1]['学号'] = $v->stu_no;
            $date[$k+1]['班级'] = $v->stu_class;
            $date[$k+1]['性别'] = $v->stu_sex;
            $date[$k+1]['电话'] = $v->stu_tel;
            $date[$k+1]['邮箱'] = $v->stu_email;
            $date[$k+1]['微信'] = $v->stu_wei;
        }
        $name = '学生信息表';

        Excel::create($name,function($excel) use ($date){

            $excel->sheet('score', function($sheet) use ($date){

                $sheet->rows($date);

            });

        })->store('xlsx')->export('xlsx');

    }

    public function import(){

        $filePath = 'public/exports/学生信息'.'.xlsx';

        Excel::load($filePath, function($reader) {
            $date = [];
            $data = json_decode($reader->all());

            foreach($data as $k=>$v){
                $date[$k]['stu_name'] = $data[$k]->姓名;
                $date[$k]['stu_no'] = $data[$k]->学号;
                $date[$k]['stu_class'] = $data[$k]->班级;
                $date[$k]['stu_sex'] = $data[$k]->性别;
                $date[$k]['stu_tel'] = $data[$k]->电话;
                $date[$k]['stu_email'] = $data[$k]->邮箱;
                $date[$k]['stu_wei'] = $data[$k]->微信;
                $rel =Student::create($date[$k]);
                if ($rel){
                    echo 'success';
                }else{
                    echo 'fail';
                }
            }
        });

        exit;

    }

}