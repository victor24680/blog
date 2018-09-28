<?php

namespace App\Http\Controllers\Home;

use App\Http\Model\Article;
use App\Http\Model\Category;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;
use Request;
use App\Http\Model\Links;

class IndexController extends CommonController
{
    //https://blog.csdn.net/helongzhong/article/details/53216876
    //利用github搭建个人博客网址；
    public function index()
    {
        //http://www.jb51.net/article/106653.htm[路由模式方法使用]

        //点击最高的篇文章
        $viewArticleList = $this->viewArticle();

        //最新发布的八篇文章
        $newArticleList = $this->newsArticle();

        //文章列表
        $articleList = Article::orderBy('art_order', 'desc')->orderBy('art_time', 'desc')->paginate(4);
        foreach ($articleList as $key => $value) {
            $value->art_description = str_limit($value->art_description, 200, '. . . . . .');
        }


        //多种传值方式
        $field        = new \stdClass();
        $field->title = '首页';

        return view('home.index', ['articleList' => $articleList, 'field' => $field]);
    }


    //最新的八篇文章
    public function viewArticle()
    {
        $list = Article::orderBy('art_view', 'desc')->take(8)->get();

        return $list;
    }

    //最新的八篇文章
    public function newsArticle()
    {

        $list = Article::orderBy('art_time', 'desc')->take(5)->get();

        return $list;
    }

    //友情链接
    public function linkList()
    {

        $list = Links::orderBy('link_order', 'desc')->take(2)->get();

        return $list;
    }


    public function lists($cate_id = 3)
    {
        //文章列表

        $field = new \stdClass();

        //获取分类标题
        $cateInfos        = Category::find($cate_id);
        $field->title     = $cateInfos->cate_title;
        $field->cate_name = $cateInfos->cate_name;
        $field->cate_id   = $cate_id;
        $articleList      = Article::where('cate_pid', $cate_id)
            ->orderBy('art_order', 'desc')
            ->orderBy('art_time', 'desc')
            ->paginate(1);
        foreach ($articleList as $key => $value) {
            $value->art_description = str_limit($value->art_description, 200, '. . . . . .');
        }

        //dump($articleList);
        return view('home.list')
            ->with('articleList', $articleList)
            ->with('cateList', $this->getViewNums())
            ->with('field', $field);


        /* switch ($key) {
             case 0:
                 echo 'class="rnav1"';
                 break;
             case 1:
                 echo 'class="rnav2"';
                 break;
             case 2:
                 echo 'class="rnav3"';
                 break;
             case 3:
                 echo 'class="rnav4"';
                 break;
         }*/
    }

    public function getViewNums()
    {
        $list = Category::orderBy('cate_view', 'desc')->take(4)->get();

        return $list;
    }

    public function detail()
    {
        $art_id = Request::get('id');
        $data   = Article::find($art_id);
        //获取父集分类名称；
        $cateInfos = Category::find($data->cate_pid, ['cate_name']);
        if (!$data) {
            return redirect('/');
        }

        $field            = new \stdClass();
        $field->title     = $data->art_title;
        $field->cate_name = $cateInfos->cate_name;
        //添加文章读取次数
        $this->addViews($art_id);
        //获取前一篇，后一篇
        $nextPreArticle=$this->getArticleList($art_id,$data->cate_pid);
        $field->pref_art=$nextPreArticle['pref_art'];
        $field->next_art=$nextPreArticle['next_art'];
        //获取相关文章
        $field->relateionArt=$this->getRelation($data->cate_pid);
        return view('home.new', ['data' => $data, 'field' => $field]);
    }

    public function getArticleList($art_id, $cate_pid)
    {
        //DB::connection()->enableQueryLog();#开启执行日志
        $pref_art = Article::where(['cate_pid' => $cate_pid, ['art_id', '<', $art_id]])->orderBy('art_id', 'desc')->first();
        $next_art = Article::where(['cate_pid' => $cate_pid, ['art_id', '>', $art_id]])->orderBy('art_id', 'asc')->first();
        return ['pref_art'=>$pref_art,'next_art'=>$next_art];
        //print_r(DB::getQueryLog());
    }

    //添加查看次数
    private function addViews($art_id)
    {
        $artInfos = Article::find($art_id);
        if (!$artInfos) {
            return false;
        }
        Article::where(['art_id' => $art_id])->increment('art_view');
    }

    public function getRelation($cate_pid)
    {
        $artInfos=Article::where(['cate_pid'=>$cate_pid])->take(5)->orderBy('art_id','desc')->get();
        return $artInfos;
    }
}
