<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use Request as Input;
use Validator;
use App\Http\Controllers\Controller;
use App\Http\Model\config;
class ConfigController extends CommonController
{
	//配置项管理【测试远程管理】
    public function index(){
        $data=Config::orderBy('conf_order','desc')->orderBy('conf_id','desc')->paginate(5);
        return view('admin.config.index')->with('data',$data);
    }

    /**
     *@author:victor
     *@desc:创建新的配置项
     */
    public function create(){
        return view('admin.config.add');
    }

    /*【添加配置项提交】*/
    public function store(){
    	$data=Input::except('_token');

    	$rules=[
            'conf_name'=>'required',
            'conf_alias'=>'required',
            'conf_url'=>'required',
    	];
    	$message=[
    		'conf_title.required'=>'网站标题必需填写',
    		'conf_name.required'=>'变量名必需填写',
    		'conf_content.required'=>'变量值必需填写',
    	];
    	$validator=Validator::make($data,$rules,$message);
    	if(!$validator->passes()){
            return redirect()->back()->withErrors($validator);
    	}
    	$res=Config::create($data);
    	if(!$res){
    		return redirect()->back()->withErrors(['msg'=>'添加网站配置失败']);
    	}
    	return redirect('admin/config');
    }

    //修改配置项
    public function edit($conf_id){
        $data=Config::find($conf_id);
        return view('admin.config.edit',compact('data'));
    }

    //PUT提交
    public function update($conf_id){
    	$data=Input::except(['_token','_method']);
        $rules=[
            'conf_name'=>'required',
            'conf_alias'=>'required',
            'conf_url'=>'required',
        ];
        $message=[
            'conf_name.required'=>'配置项名称必需填写',
            'conf_alias.required'=>'配置项标题必需填写',
            'conf_url.required'=>'配置项地址必需填写',
        ];
        $validator=Validator::make($data,$rules,$message);
        if(!$validator->passes()){
            return redirect()->back()->withErrors($validator);
        }
        $checkData=config::find($conf_id);
        if(!$checkData){
            return redirect()->back()->withError(['msg'=>'找不到相关数据']);
        }
        $res=config::where(['conf_id'=>$conf_id])->update($data);
        if($res){
            return redirect('admin/config');
        }else{
            return redirect()->back()->withErrors(['msg'=>'数据修改成功']);
        }
    }


    //删除单个配置项
    public function destroy($conf_id){
        $res=config::where(['conf_id'=>$conf_id])->delete();
        if($res){
            return array('error'=>0);
        }else{
            return array('error'=>1);
        }
    }
    
    public function changeOrder(Request $request){
        $confInfos=$request->only(['conf_id','conf_order']);
        $result=Config::where(['conf_id'=>$confInfos['conf_id']])->update(['conf_order'=>$confInfos['conf_order']]);
        if($result){
            return response()->json(['status'=>0,'msg'=>'排序成功']);
        }else{
            return response()->json(['status'=>1,'msg'=>'排序失败，请稍后再尝试']);
        }
    }
}
