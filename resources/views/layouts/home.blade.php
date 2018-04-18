<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>后盾个人博客—一个站在web前段设计之路的女技术员个人博客网站</title>
<meta name="keywords" content="个人博客,后盾个人博客,个人博客模板,后盾" />
<meta name="description" content="后盾个人博客，是一个站在web前端设计之路的女程序员个人网站，提供个人博客模板免费资源下载的个人原创网站。" />
<link href="{{asset('home/css/base.css')}}" rel="stylesheet">
<link href="{{asset('home/css/new.css')}}" rel="stylesheet">
<link href="{{asset('home/css/index.css')}}" rel="stylesheet">
<link href="{{asset('home/css/style.css')}}" rel="stylesheet">
</head>
<body>
<header>
  <div id="logo"><a href="/"></a></div>
  <nav class="topnav" id="topnav"><a href="index.blade.php.html"><span>首页</span><span class="en">Protal</span></a><a href="about.html"><span>关于我</span><span class="en">About</span></a><a href="newlist.html"><span>慢生活</span><span class="en">Life</span></a><a href="moodlist.html"><span>碎言碎语</span><span class="en">Doing</span></a><a href="share.html"><span>模板分享</span><span class="en">Share</span></a><a href="knowledge.html"><span>学无止境</span><span class="en">Learn</span></a><a href="6"><span>留言版</span><span class="en">Gustbook</span></a></nav>
  </nav>
</header>
   
    @yield('content')
    
<script src="{{asset('home/js/silder.js')}}"></script>
</body>
</html>

    
    
    
    