<?php

namespace App\Http\Controllers\Home;
use App\Http\Model\Navs;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use View;

class CommonController extends Controller
{
    //
    public function __construct()
    {
        $navlist=Navs::orderBy('nav_order','desc')->orderBy('nav_id','asc')->get();

        //点击最高的篇文章
        $viewArticleList=$this->viewArticle();

        //最新发布的八篇文章
        $newArticleList=$this->newsArticle();

        //友情链接
        $linkList=$this->linkList();

        //文章标题

        $data=[
            'navlist'=>$navlist,
            'newArticleList'=>$newArticleList,
            'viewArticleList'=>$viewArticleList,
            'linkList'=>$linkList,
        ];

        View::share($data);
    }
}
