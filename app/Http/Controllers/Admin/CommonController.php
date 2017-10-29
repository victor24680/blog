<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Redirect;
use Request as Input;
class CommonController extends Controller
{
    public function isLogin(){
        $check_session=session('user');
        if(!$check_session){
            return false;
        }else{
            return true;
        }
    }
    
    //上传图片
    public function upload(){
        $file=Input::file('Filedata');
        if($file->isValid()){
            $realPath=$file->getRealPath();//临时文件名的绝对路径
            $entension=$file->getClientOriginalExtension();//上传文件的后缀
            $newName=date('YmdHis').mt_rand(100,999).'.'.$entension;//app_path()
            $path=$file->move(base_path.'/uploads',$newName);
        }
    }
}



