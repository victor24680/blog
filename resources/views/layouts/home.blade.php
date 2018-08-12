<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>{{$field->title}}—{{Config::get('web.web_title')}}</title>
<meta name="keywords" content="个人博客,后盾个人博客,个人博客模板,后盾" />
<meta name="description" content="后盾个人博客，是一个站在web前端设计之路的女程序员个人网站，提供个人博客模板免费资源下载的个人原创网站。" />
<link href="{{asset('home/css/base.css')}}" rel="stylesheet">
<link href="{{asset('home/css/new.css')}}" rel="stylesheet">
<link href="{{asset('home/css/index.css')}}" rel="stylesheet">
<link href="{{asset('home/css/style.css')}}" rel="stylesheet">
</head>
<body>
<header>
  	<div id="logo">
  		<a href="/"></a>
  	</div>
  	<nav class="topnav" id="topnav">
		@foreach($navlist as $val)
			<a href="/">
				<span>{{$val->nav_name}}</span>
				<span class="en">{{$val->nav_alias}}</span>
			</a>
		@endforeach
  	</nav>
</header>
   
    @yield('content')
    
<script src="{{asset('home/js/silder.js')}}"></script>
</body>
</html>

    
    
    
    