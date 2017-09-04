<?php

namespace App\Http\Controllers\Admin;
use App\Http\Requests;
use App\Http\Model\Category;
use Request as Input;
use Validator;
class CategoryController extends CommonController
{
    //get/head,全部分类列表
    public function index(){
        $data=(new Category)->tree();
        return view('admin.category.index')->with('data',$data);
    }
    public function changeOrder(){//修改提交测试
        $input= Input::all();
        $cate=  Category::find($input['cate_id']);
        $cate->cate_order=$input['cate_order'];
        $re=$cate->update();
        if($re){
            $data=[
                'status'=>0,
                'msg'=>'排序更新成功',
            ];
        }else{
            $data=[
                'status'=>1,
                'msg'=>'排序更新失败，请稍后再试',
            ];
        }
        return $data;
    }

    
    //get|head 添加分类
    public function create(){
        //输出父级分类
        $data=Category::where(['cate_pid'=>0])->get();
        return view('admin.category.add')->with('lists',$data);
    }
    
    //post-添加文章分类
    public function store(){
        $input=Input::except('_token');
        Input::flash();
        $rules=[
            'cate_name'=>'required',
            'cate_title'=>'required',
        ];
        //确认一致匹配字段：confirmed;长度：between
        //官方密码确认名：password_confirmation
        $message=[
            'cate_name.required'=>'分类名称不能为空',
            'cate_title.required'=>'分类标题',
        ];
        $validator=Validator::make($input,$rules,$message);
        if(!$validator->passes()){
            return redirect()->back()->withErrors($validator);
        }
        $res=Category::create($input);
        if(!$res){
            return redirect()->back()->withErrors(['msg'=>'添加父级分类失败，请稍后再试']);
        }else{
            return redirect('admin/category');
        }
    }
    
    //get 单个显示
    public function show(){
        
    }
    //delete 删除单个分类
    public function destroy(){
        
    }
    //更新分类
    public function update(){
        
    }
    //编辑分类列表；
    public function edit(){
        
    }
    
}
