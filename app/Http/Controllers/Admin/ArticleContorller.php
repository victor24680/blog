<?php

namespace App\Http\Controllers\Admin;
use App\Http\Model\Category;
use App\Http\Model\Article;
use Request as Input;
use Validator;
class ArticleContorller extends CommonController
{
    //文章列表页；
    public function index(){
        $data=Article::orderBy('art_id','desc')->paginate(1);
        return view('admin.article.index')->with('data',$data);
    }
    //get|head 添加分类/img/123.png
    public function create(){
        $data=(new Category)->tree();
        return view('admin.article.add',compact('data'));
    }
    
    //post-添加文章提交
    public function store(){
        $data=Input::except('_token');
        //dd($data);
        $rules=[
            'art_title'=>'required',
            'art_content'=>'required',
        ];
        $message=[
            'art_title.required'=>'文章标题是必须的',
            'art_content.required'=>'文章内容是必须的',
        ];
        $validator=Validator::make($data,$rules,$message);
        if(!$validator->passes()){
            return redirect()->back()->withErrors($validator);
        }
        //定义时间戳
        $data['art_time']=time();
        $res=Article::create($data);
        if(!$res){
            return redirect()->back()->withError(['msg'=>'添加文章失败请重新，请稍后再尝试']);
        }
        return redirect('admin/article');
    }
    
    //PUT方式提交
    public function edit($art_id){
        $item=Article::find($art_id);
        $data=(new Category)->tree();
        //dd($item);
        return view('admin.article.edit',compact('item','data'));
    } 
    
    //更新文章
    public function update($art_id){
        $input=Input::except(['_method','_token']);
        $rules=[
            'art_title'=>'required',
            'art_content'=>'required',
        ];
        //确认一致匹配字段：confirmed;长度：between
        //官方密码确认名：password_confirmation
        $message=[
            'art_title.required'=>'文章标题不能为空',
            'art_content.required'=>'文章内容不能为空',
        ];
        $validator=Validator::make($input,$rules,$message);
        if(!$validator->passes()){
            return redirect()->back()->withErrors($validator);
        }
        $data=Article::find($art_id);
        if(!$data){
            return redirect()->back()->withErrors(['msg'=>'找不到相关数据，请核对后再修改']);
        }
        $res=Article::where(['art_id'=>$art_id])->update($input);
        if($res){
            return redirect('admin/article');
        }else{
            return redirect()->back()->withErrors(['msg'=>'修改失败，请稍后再尝试']);
        }
    }
    
    //delete 删除单个文章
    //方法一:$res=Category::destroy($input->cate_id);
    public function destroy($art_id){
        //$input=Input::all();
        //$res=Category::destroy($input->cate_id); //方法一
        $res=Article::where(['art_id'=>$art_id])->delete();
        if($res){
            return ['error'=>0];
        }else{
            return ['error'=>1];
        }
    }
}
