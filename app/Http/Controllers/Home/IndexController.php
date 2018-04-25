<?php

namespace App\Http\Controllers\Home;
use App\Http\Model\Article;
use Mockery\Exception;
use Request;
use App\Http\Model\Links;
class IndexController extends CommonController
{
    public function index()
    {
        //http://www.jb51.net/article/106653.htm[路由模式方法使用]

        //点击最高的篇文章
        $viewArticleList=$this->viewArticle();

        //最新发布的八篇文章
        $newArticleList=$this->newsArticle();
        
        //友情链接
        $linkList=$this->linkList();

        //文章列表
        $articleList=Article::orderBy('art_order','desc')->orderBy('art_time','desc')->paginate(10);
        foreach($articleList as $key => $value){
            $value->art_description=str_limit($value->art_description,200,'. . . . . .');
        }

        //多种传值方式
        return view('home.index',['articleList'=>$articleList],compact('viewArticleList','linkList'))->with('newArticleList',$newArticleList);
    }

    //最新的八篇文章
    public function viewArticle()
    {
        $list=Article::orderBy('art_view','desc')->take(8)->get();
        return $list;
    }

    //最新的八篇文章
    public function newsArticle()
    {
        $list=Article::orderBy('art_time','desc')->take(5)->get();
        return $list;
    }

    //友情链接
    public function linkList()
    {
        $list=Links::orderBy('link_order','desc')->take(2)->get();
        return $list;
    }

    
    public function lists()
    {
        //文章列表
        $articleList=Article::orderBy('art_order','desc')->orderBy('art_time','desc')->paginate(2);
        foreach($articleList as $key => $value){
            $value->art_description=str_limit($value->art_description,200,'. . . . . .');
        }
        return view('home.list')->with('articleList',$articleList);
    }
    
    public function detail()
    {
        $idInfos=Request::get('id');
        $data=Article::find($idInfos);
        if(!$data){
            return  redirect('/');
        }
        return view('home.new',['data'=>$data]);
    }
}
