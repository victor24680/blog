<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Crypt;
use DB;
use Request as Input;
use Validator;
require_once(__DIR__.'/../../../../resources/org/Code.class.php');
class LogRegister extends Controller
{
    public function login(Request $request){
    	$check_user=session('user');
    	if($check_user){
            return redirect('admin/index');
    	}
        //var_dump(Crypt::encrypt('123123'));
    	return view('admin.login');
    }

    public function sublogin(Request $request){
    	$username=$request->input('username');
    	$password=$request->input('password');
    	$verify_code=$request->input('code');
    	$verifyobj=new \Code();
    	$session_code=$verifyobj->get();
    	$request->flash();
    	if(strtolower($session_code)!=strtolower($verify_code)){
    		return redirect()->back()->withErrors(['msg'=>'验证码不正确'])->withInput($request->except(['password']));
    	}
    	//DB::connection()->enableQueryLog(); 
    	$userinfos=DB::table('admin')->where(['username'=>$username])->first();
    	if(!$userinfos){
    		return redirect()->back()->withErrors(['msg'=>'用户名不存在']);
    	}
    	$decry_code=Crypt::decrypt($userinfos->password);
    	if(trim($password)!=$decry_code){
    		return redirect()->back()->withErrors(['msg'=>'密码不正确']);
    	}
    	session(['user'=>$userinfos]);
    	return redirect('admin/index');
    }

    public function quit(){
    	session(['user'=>null]);
    	return redirect('admin/login');
    }

    public function code(){
    	$verifyobj=new \Code();
    	$verifyobj->make();
    }

    public function pass(Request $request){
        if($input=Input::all()){
            $password_o=$input['password_o'];
            $password=$input['password'];
            $passwrd_c=$input['password_confirmation'];
            $request->flash();
            $rules=[
                'password'=>'required|between:3,20|confirmed',
            ];
            //确认一致匹配字段：confirmed;长度：between
            //官方密码确认名：password_confirmation
            $message=[
                'password.required'=>'密码不能为空s',
                'password.between'=>'新密码必须在3-20位之间',
                'password.confirmed'=>'两次输入的密码不一致',
            ];
            $validator=Validator::make($input,$rules,$message);
            if(!$validator->passes()){
                return redirect()->back()->withErrors($validator);
            }
//            if(empty($password_o)){
//                return redirect()->back()->withErrors(['msg'=>'旧密码不能为空']);
//            }
//            if(empty($password)){
//                return redirect()->back()->withErrors(['msg'=>'密码不能为空']);
//            }
            
            if($password==$password_o){
                return redirect()->back()->withErrors(['msg'=>'新旧密码不能一致']);
            }
            if($password!=$passwrd_c){
                return redirect()->back()->withErrors(['msg'=>'两次密码不一致，请重新输入']);
            }
            $username=session('user')->username;
            $db_password=DB::table('admin')->where(['username'=>$username])->value('password');
            $decrypt_password=Crypt::decrypt($db_password);
            if($decrypt_password!=$password_o){
                return redirect()->back()->withErrors(['msg'=>'原密码错误']);
            }
            
            $encrypt_password=Crypt::encrypt($password);
            $id=DB::table('admin')->where(['username'=>$username])->update(['password'=>$encrypt_password]);
            if($id){
                return redirect()->back()->withErrors(['msg'=>'密码修改成功!']);
            }         
            return redirect()->back->whthErrors(['msg'=>'密码修改失败']);
        }else{
          return view('admin.pass');  
        }
    }
}
