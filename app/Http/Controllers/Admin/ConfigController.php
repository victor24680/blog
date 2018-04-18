<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use Request as Input;
use Validator;
use App\Http\Controllers\Controller;
use App\Http\Model\Config;
class ConfigController extends CommonController
{
	//配置管理【测试远程管理】
    public function index(){
        $data=Config::orderBy('conf_order','asc')->orderBy('conf_id','desc')->paginate(5);
        return view('admin.config.index')->with('data',$data);
    }

    /**
     *@author:victor
     *@desc:创建新的配置项
     */
    public function create(){
        return view('admin.config.add');
    }

    //修改网站配置内容
    public function changecontent(){
        $input=Input::except('_token');
        $conf_content=$input['conf_content'];
        foreach ($conf_content as $key =>$value){
            if(empty($value) && $value!==0 && $value!=='0'){
                return redirect()->back()->withErrors(["配置内容不能空"]);
            }
            $res=Config::find($key);
            if(!$res){
                return redirect()->back()->withErrors(["找不到ID号为".$key.'的记录']);
            }
            $res->conf_content=$value;
            $res->save();
        }
        $this->putFile();
        return redirect()->back()->withErrors("修改成功");
    }

    public function show(){

    }
    
    /**
     * 修改配置项时-修改配置文件
     */
    public function inputFile()
    {
        $config=Config::pluck("conf_content","conf_name")->all();
        $array_export=var_export($config,true);
        dump($array_export);
        $path=base_path().'\config\web.php';
        $str='<?php '."\r\n".'return '.$array_export.';'."\r\n".'?>';
        file_put_contents($path,$str);
    }

    /*【添加配置项提交】*/
    public function store(){
    	$data=Input::except('_token');;
    	$rules=[
            'conf_title'=>'required',
            'conf_name'=>'required',
    	];
    	$message=[
            'conf_title.required'=>'网站标题必需填写',
            'conf_name.required'=>'网站名必需填写',
    	];
    	$validator=Validator::make($data,$rules,$message);
    	if(!$validator->passes()){
            return redirect()->back()->withErrors($validator);
    	}
    	$res=Config::create($data);
    	if(!$res){
            return redirect()->back()->withErrors(['msg'=>'添加网站配置失败']);
    	}
        $this->putFile();
    	return redirect('admin/conf');
    }

    //修改配置
    public function edit($conf_id){
        $item=Config::find($conf_id);
        return view('admin.config.edit',compact('item'));
    }

    //PUT提交
    public function update($conf_id){
    	$data=Input::except(['_token','_method']);
        $rules=[
            'conf_title'=>'required',
            'conf_name'=>'required',
        ];
        $message=[
            'conf_title.required'=>'网站标题称必需填写',
            'conf_name.required'=>'网站配置必需填写',
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
            $this->putFile();
            return redirect('admin/conf');
        }else{
            return redirect()->back()->withErrors(['msg'=>'数据修改失败']);
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
