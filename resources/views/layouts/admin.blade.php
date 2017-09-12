<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="{{asset('style/css/ch-ui.admin.css')}}">
	<link rel="stylesheet" href="{{asset('style/font/css/font-awesome.min.css')}}">
	<script type="text/javascript" src="{{asset('style/js/jquery.js')}}"></script>
        <script type="text/javascript" src="{{asset('style/js/ch-ui.admin.js')}}"></script>
        <script type="text/javascript" src="{{asset('style/js/layer/layer.js')}}"></script>
        
        <script type="text/javascript" charset="utf-8" src="{{asset('../resources/extend/ueditor/ueditor.config.js')}}"></script>
        <script type="text/javascript" charset="utf-8" src="{{asset('../resources/extend/ueditor/ueditor.all.min.js')}}"> </script>
        <script type="text/javascript" charset="utf-8" src="{{asset('../resources/extend/ueditor/lang/zh-cn/zh-cn.js')}}"></script>
</head>
<body>
    @yield('content');
    
</body>
</html>