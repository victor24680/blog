<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use Request as Input;
use Validator;
use App\Http\Controllers\Controller;
use App\Http\Model\Links;
class LinksController extends CommonController
{
	//友情链接管理【测试远程管理】
	public function index(){
        $data=Links::orderBy('link_id','desc')->paginate(5);
        return view('admin.links.index')->with('data',$data);
    }

    /**
     *@author:victor
     *@desc:创建新的友情连接
     */
    public function create(){
        return view('admin.links.add');
    }

    /*【添加链接提交】*/
    public function store(){
    	$data=Input::except('_token');
    	$rules=[
    		'link_name'=>'required',
    		'link_title'=>'required',
    		'link_url'=>'required',
    	];
    	$message=[
    		'link_name.required'=>'链接名称必需填写',
    		'link_title.required'=>'链接标题必需填写',
    		'link_url.required'=>'链接地址必需填写',
    	];
    	$validator=Validator::make($data,$rules,$message);
    	if(!$validator->passes()){
    		return redirect()->back()->withErrors($validator);
    	}
    	$res=Links::create($data);
    	if(!$res){
    		return redirect()->back()->withErrors(['msg'=>'添加友情链接失败']);
    	}
    	return redirect('admin/links');
    }

    //修改链接
    public function edit($link_id){
		$data=Links::find($link_id);
		return view('admin.links.edit',compact('data'));
    }

    //PUT提交
    public function update($link_id){
    	$data=Input::except(['_token','_method']);
    	 $rules=[
            'link_name'=>'required',
    		'link_title'=>'required',
    		'link_url'=>'required',
        ];
        $message=[
            'link_name.required'=>'链接名称必需填写',
    		'link_title.required'=>'链接标题必需填写',
    		'link_url.required'=>'链接地址必需填写',
        ];
        $validator=Validator::make($data,$rules,$message);
        if(!$validator->passes()){
            return redirect()->back()->withErrors($validator);
        }
        $checkData=Links::find($link_id);
        if(!$checkData){
        	return redirect()->back()->withError(['msg'=>'找不到相关数据']);
        }
        $res=Links::where(['link_id'=>$link_id])->update($data);
        if($res){
        	return redirect('admin/links');
        }else{
        	return redirect()->back()->withErrors(['msg'=>'数据修改成功']);
        }
    }

    //删除单个链接
    public function destroy($link_id){
		$res=Links::where(['link_id'=>$link_id])->delete();
		if($res){
			return array('error'=>0);
		}else{
			return array('error'=>1);
		}
    }
}
