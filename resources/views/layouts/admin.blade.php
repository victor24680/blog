<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="{{asset('style/css/ch-ui.admin.css')}}">
	<link rel="stylesheet" href="{{asset('style/js/layui/css/layui.css')}}">
	<link rel="stylesheet" href="{{asset('style/font/css/font-awesome.min.css')}}">
	<script type="text/javascript" src="{{asset('style/js/jquery.js')}}"></script>
	<script type="text/javascript" src="{{asset('style/js/ch-ui.admin.js')}}"></script>
	<script type="text/javascript" src="{{asset('style/js/layer/layer.js')}}"></script>
	<script type="text/javascript" src="{{asset('style/js/layui/layui.js')}}"></script>

	<link rel="stylesheet" href="{{asset('markdown/editor/css/editormd.min.css')}}"/>
	<script src="{{asset('markdown/editor/editormd.min.js')}}"></script>  
</head>
<body>
    @yield('content')
    
</body>
</html>