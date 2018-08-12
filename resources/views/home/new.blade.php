@extends('layouts.home')
@section('content')
<article class="blogs">
  <h1 class="t_nav">
      <span>
          当前位置：{{$field->cate_name}}
      </span>
      <a href="/" class="n1">网站首页</a><a href="{{route('artlist',['cate_id'=>$data->cate_pid])}}" class="n2">{{$field->cate_name}}</a>
  </h1>
  <div class="index_about">
    <h2 class="c_titile">{{$data->art_title}}</h2>
    <p class="box_c">
      <span class="d_time">发布时间：{{date('Y-m-d',$data->art_time)}}</span>
      <span>编辑：{{$data->art_editor}}</span>
      <span>查看次数：{{$data->art_view}}次</span>
    </p>
    <ul class="infos">
      {!! $data->art_content !!}
    </ul>
    <div class="keybq">
    <p><span>关键字词</span>：{{$data->art_tag}}</p>
    </div>
    <div class="ad"> </div>
    <div class="nextinfo">
      <p>上一篇：
        @if(empty($field->pref_art))
          没有上一篇了
        @else
            <a href="{{route('detail',['id'=>$field->pref_art->art_id])}}">{{$field->pref_art->art_title}}</a>
        @endif

      </p>
      <p>下一篇：
        @if(empty($field->next_art))
          没有下一篇了
        @else
          <a href="{{route('detail',['id'=>$field->next_art->art_id])}}">{{$field->next_art->art_title}}</a>
        @endif
      </p>
    </div>
    <div class="otherlink">
      <h2>相关文章</h2><!--可以获取次数最多的，或者类似的-->
      <ul>
          @foreach($field->relateionArt as $val)
              <li><a href="{{route('detail',['id'=>$val->art_id])}}" title="{{$val->tag}}">{{$val->art_title}}</a></li>
          @endforeach
      </ul>
    </div>
  </div>
  <aside class="right">
    <!-- Baidu Button BEGIN -->
    <div id="bdshare" class="bdshare_t bds_tools_32 get-codes-bdshare">
      <a class="bds_tsina"></a><!--分享微博-->
      <a class="bds_qzone"></a><!--分享QQ空间-->
      <a class="bds_tqq"></a><!--分享QQ-->
      <a class="bds_renren"></a><!--分享人人网-->
      <span class="bds_more"></span><a class="shareCount"></a></div>
    <script type="text/javascript" id="bdshare_js" data="type=tools&amp;uid=6574585" ></script> 
    <script type="text/javascript" id="bdshell_js"></script> 
    <script type="text/javascript">
      document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + Math.ceil(new Date()/3600000)
    </script>
    <!-- Baidu Button END -->
    <div class="blank"></div>
    <div class="news">
      <h3>
        <p>栏目<span>最新</span></p>
      </h3>
      @include('layouts.newarticle')
      <h3 class="ph">
        <p>点击<span>排行</span></p>
      </h3>
      @include('layouts.viewarticle')
    </div>
    <div class="visitors">
      <h3>
        <p>最近访客</p>
      </h3>
      <ul>
      </ul>
    </div>
  </aside>
</article>
@include('layouts.footer')
@endsection