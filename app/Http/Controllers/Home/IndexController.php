<?php

namespace App\Http\Controllers\Home;
use App\Http\Model\Article;
use Mockery\Exception;
use Request;
class IndexController extends CommonController
{
    public function index()
    {
        //点击最高的篇文章
        $newArticle=$this->newArticle();

        //图文列表带分页；

        //最新发布的八篇文章

        //友情链接

        //文章列表
        $articleList=Article::orderBy('art_order','desc')->orderBy('art_time','desc')->paginate(10);
        foreach($articleList as $key => $value){
            $value->art_description=str_limit($value->art_description,200,'. . . . . .');
        }
        return view('home.index',compact('newArticle','articleList'));
    }

    //最新的八篇文章
    public function newArticle()
    {
        $list=Article::orderBy('art_view','desc')->take(8)->get();
        return $list;
    }

    
    public function lists()
    {
        return view('home.list');
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
