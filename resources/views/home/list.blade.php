@extends('layouts.home')
@section('content')
<article class="blogs">
<h1 class="t_nav"><span>“慢生活”不是懒惰，放慢速度不是拖延时间，而是让我们在生活中寻找到平衡。
    </span><a href="/" class="n1">网站首页</a>
    <a href="{{route('artlist',['cate_id'=>$field->cate_id])}}" class="n2">
        {{$field->cate_name}}
    </a>
</h1>
<div class="newblog left">
    {{--<span>分类：[<a href="/news/life/">程序人生</a>]</span>--}}
    @foreach($articleList as $val)
        <h2>{{$val->art_title}}</h2>
        <p class="dateview">
            <span> &nbsp;发布时间：{{date('Y-m-d',$val->art_time)}}</span>
            <span>作者:{{$val->art_editor}}</span>
        </p>
        <figure><img src="{{$val->art_thumb}}"></figure>
        <ul class="nlist">
            <p>{{$val->art_description}}</p>
            <a title="{{$val->art_description}}" href="{{route('detail',['id'=>$val->art_id])}}" target="_blank" class="readmore">阅读全文>></a>
        </ul>
        <div class="line"></div>
    @endforeach
    <div class="blank"></div>
    <div class="page">
        {{$articleList->links()}}
    </div>
</div>
<aside class="right">

   <div class="rnav">
        <ul>
            @foreach($cateList as $key => $vo)
                <li
                    <?php
                        switch ($key) {
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
                        }
                    ?>
                ><a href="/artlist/{{$vo->cate_id}}" target="_blank">{{$vo->cate_name}}</a></li>
            @endforeach

            {{--<li class="rnav2"><a href="/newsfree/" target="_blank">程序人生</a></li>--}}
            {{--<li class="rnav3"><a href="/web/" target="_blank">欣赏</a></li>--}}
            {{--<li class="rnav4"><a href="/newshtml5/" target="_blank">短信祝福</a></li>--}}
        </ul>
    </div>

<div class="news">
<h3>
      <p>最新<span>文章</span></p>
    </h3>
    @include('layouts.newarticle')
    <h3 class="ph">
      <p>点击<span>排行</span></p>
    </h3>
    @include('layouts.viewarticle')
    </div>
    <div class="visitors">
      <h3><p>最近访客</p></h3>
      <ul>

      </ul>
    </div>
     <!-- Baidu Button BEGIN -->
    <div id="bdshare" class="bdshare_t bds_tools_32 get-codes-bdshare"><a class="bds_tsina"></a><a class="bds_qzone"></a><a class="bds_tqq"></a><a class="bds_renren"></a><span class="bds_more"></span><a class="shareCount"></a></div>
    <script type="text/javascript" id="bdshare_js" data="type=tools&amp;uid=6574585" ></script> 
    <script type="text/javascript" id="bdshell_js"></script> 
    <script type="text/javascript">
document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + Math.ceil(new Date()/3600000)
</script> 
    <!-- Baidu Button END -->   
</aside>
</article>
@include('layouts.footer')
@endsection