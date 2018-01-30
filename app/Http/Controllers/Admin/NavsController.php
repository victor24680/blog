<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use Request as Input;
use Validator;
use App\Http\Controllers\Controller;
use App\Http\Model\Navs;
class navsController extends CommonController
{
	//导航管理【测试远程管理】
    public function index(){
        $data=Navs::orderBy('nav_order','desc')->orderBy('nav_id','desc')->paginate(5);
        return view('admin.navs.index')->with('data',$data);
    }

    /**
     *@author:victor
     *@desc:创建新的导航
     */
    public function create(){
        return view('admin.navs.add');
    }

    /*【添加导航提交】*/
    public function store(){
    	$data=Input::except('_token');

    	$rules=[
            'nav_name'=>'required',
            'nav_alias'=>'required',
            'nav_url'=>'required',
    	];
    	$message=[
    		'nav_name.required'=>'导航名称必需填写',
    		'nav_alias.required'=>'导航别名必需填写',
    		'nav_url.required'=>'导航地址必需填写',
    	];
    	$validator=Validator::make($data,$rules,$message);
    	if(!$validator->passes()){
            return redirect()->back()->withErrors($validator);
    	}
    	$res=Navs::create($data);
    	if(!$res){
    		return redirect()->back()->withErrors(['msg'=>'添加导航失败']);
    	}
    	return redirect('admin/navs');
    }

    //修改导航
    public function edit($nav_id){
        $data=Navs::find($nav_id);
        return view('admin.navs.edit',compact('data'));
    }

    //PUT提交
    public function update($nav_id){
    	$data=Input::except(['_token','_method']);
        $rules=[
            'nav_name'=>'required',
            'nav_alias'=>'required',
            'nav_url'=>'required',
        ];
        $message=[
            'nav_name.required'=>'导航名称必需填写',
            'nav_alias.required'=>'导航标题必需填写',
            'nav_url.required'=>'导航地址必需填写',
        ];
        $validator=Validator::make($data,$rules,$message);
        if(!$validator->passes()){
            return redirect()->back()->withErrors($validator);
        }
        $checkData=Navs::find($nav_id);
        if(!$checkData){
            return redirect()->back()->withError(['msg'=>'找不到相关数据']);
        }
        $res=Navs::where(['nav_id'=>$nav_id])->update($data);
        if($res){
            return redirect('admin/navs');
        }else{
            return redirect()->back()->withErrors(['msg'=>'数据修改成功']);
        }
    }

    //删除单个导航
    public function destroy($nav_id){
        $res=Navs::where(['nav_id'=>$nav_id])->delete();
        if($res){
                return array('error'=>0);
        }else{
                return array('error'=>1);
        }
    }
    
    public function changeOrder(Request $request){
        $navInfos=$request->only(['nav_id','nav_order']);
        $result=Navs::where(['nav_id'=>$navInfos['nav_id']])->update(['nav_order'=>$navInfos['nav_order']]);
        if($result){
            return response()->json(['status'=>0,'msg'=>'排序成功']);
        }else{
            return response()->json(['status'=>1,'msg'=>'排序失败，请稍后再尝试']);
        }
    }
}
