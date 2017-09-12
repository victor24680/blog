<?php

namespace App\Http\Controllers\Admin;
use App\Http\Model\Category;
class ArticleContorller extends CommonController
{
    //文章列表页；
    public function index(){
        return "OKOK";
    }
    //get|head 添加分类
    public function create(){
        $data=(new Category)->tree();
        return view('admin.article.add',compact('data'));
    }
}
