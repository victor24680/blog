@extends('layouts.home')
@section('content')
    <div class="banner">
        <section class="box">
            <ul class="texts">
                <p>开启的博客的钥匙，迈向记忆之门。</p>
                <p>记忆之门，记录走过的路。</p>
                <p>记忆之门，为您开启崭新的旅程。</p>
            </ul>
            <div class="avatar"><a href="#"><span>程序人生</span></a></div>
        </section>
    </div>
    <!--热门文章-->
    <div class="template">
        <div class="box">
            <h3>
                <p><span></span>热门文章</p>
            </h3>
            <ul>
                @foreach($viewArticleList as $val)
                    <li><a href="/" target="_blank"><img src="{{asset('public/home/images/02.jpg')}}"></a><span>Green绿色小清新的夏天-个人博客模板</span>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    <article>
        <h2 class="title_tj">
            <p>文章<span>推荐</span></p>
        </h2>
        <div class="bloglist left">
            @foreach($articleList as $val)
                <h3>{{$val->art_title}}</h3>
                <figure><img src="{{$val->art_thumb}}"></figure>
                <ul>
                    {{$val->art_description}}
                    <a title="{{$val->art_description}}" href="{{url('detail')}}?id={{$val->art_id}}" target="_blank"
                       class="readmore">阅读全文>></a>
                </ul>
                <p class="dateview" style="padding-left:35px; ">
                    <span>{{date('Y-m-d',$val->art_time)}}</span>
                    <span>作者：{{$val->art_editor}}</span>
                    <span>个人博客：[<a href="/">程序人生</a>]</span>
                </p>
            @endforeach
            <div class="page">
                {{$articleList->links()}}
            </div>
        </div>


        <aside class="right">
            <!-- Baidu Button BEGIN -->
            <div id="bdshare" class="bdshare_t bds_tools_32 get-codes-bdshare">
                <a class="bds_tsina"></a>
                <a class="bds_qzone"></a>
                <a class="bds_tqq"></a>
                <a class="bds_renren"></a>
                <span class="bds_more"></span>
                <a class="shareCount">0</a>
            </div>
            <script type="text/javascript" id="bdshare_js" data="type=tools&amp;uid=6574585"></script>
            <script type="text/javascript" id="bdshell_js"></script>
            <script type="text/javascript">
                document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + Math.ceil(new Date() / 3600000)
            </script>
            <!-- Baidu Button END -->
            <!----分界线---->
            <div class="blank"></div>
            <div class="news">
                <h3>
                    <p>最新<span>文章</span></p>
                </h3>
                @include('layouts.newarticle')

                <h3 class="ph">
                    <p>点击<span>排行</span></p>
                </h3>
                @include('layouts.viewarticle')

                <h3 class="links">
                    <p>友情<span>链接</span></p>
                </h3>
                @include('layouts.linkarticle')
            </div>
        </aside>
    </article>
    @include('layouts.footer')
@endsection