<?php

namespace App\Http\Controllers\Admin;
use App\Http\Requests;
use App\Http\Model\Category;
use Request as Input;
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
        $input=Input::all();
        dd($input);
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
