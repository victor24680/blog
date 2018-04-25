<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\URL;
use Request as Input;
use Validator;
class UploadyController extends Controller
{
    //上传图片
    public function upload(){

        $file=Input::file('fileImage');
        $realPath=$file->getRealPath();//临时文件名的绝对路径
        $entension=$file->getClientOriginalExtension();//上传文件的后缀
        $newName=date('YmdHis').mt_rand(100,999).'.'.$entension;//app_path(),base_path()
        $path=$file->move(base_path().'/public/uploads',$newName);
        $data=[
            'code'=>0,
            'msg'=>'上传成功',
            'data'=>[
                'src'=>'http://'.$_SERVER['HTTP_HOST'].'/uploads/'.$newName,
                'no_http_src'=>'/uploads/'.$newName,
            ]
        ];
        return response()->json($data);
    }
}
