@extends('layouts.admin')

@section('content')
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">文章页</a> &raquo; 添加文章
    </div>
    <!--面包屑导航 结束-->

	<!--结果集标题与导航组件 开始-->
	<div class="result_wrap">
        <div class="result_title">
            <h3>快捷操作</h3>
            <div class="mark">
            @if(!is_object($errors))
                {{$errors}}
            @else
                @if(count($errors)>0)
                    @foreach($errors->all() as $error)
                        <p>{{$error}}</p>
                    @endforeach
                @endif
            @endif
        </div>
        </div>
        <div class="result_content">
            <div class="short_wrap">
                <a href="#"><i class="fa fa-plus"></i>新增文章</a>
                <a href="#"><i class="fa fa-recycle"></i>批量删除</a>
                <a href="#"><i class="fa fa-refresh"></i>更新排序</a>
            </div>
        </div>
    </div>
    <!--结果集标题与导航组件 结束-->
    
    <div class="result_wrap">
        <form action="{{url('admin/category')}}" method="post">
            {{csrf_field()}}
            <table class="add_tab">
                <tbody>
                    <tr>
                        <th width="120"><i class="require">*</i>文章分类：</th>
                        <td>
                            <select name="cate_pid">
                                @foreach($data as $vo)
                                <option value="{{$vo->cate_id}}">{{$vo->_cate_name}}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    
                    <tr>
                        <th><i class="require">*</i>文章标题：</th>
                        <td>
                            <input type="text" name="art_title" value="{{old('art_title')}}">
                            <span><i class="fa fa-exclamation-circle yellow"></i>文章标题必须填写</span>
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require"></i>文章编辑：</th>
                        <td>
                            <input type="text" class="lg" name="art_editor" value="{{old('art_editor')}}">
                        </td>
                    </tr>
 
                    <tr>
                        <th><i class="require"></i>文章缩略图：</th>
                        <td>
                            <input type="text" class="lg" size="50" name="art_thumb" value="{{old('art_thumb')}}">
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require"></i>文章关键字：</th>
                        <td>
                            <input type="text" class="lg" name="art_tag" value="{{old('art_tag')}}">
                        </td>
                    </tr>
                    <tr>
                        <th>文章描述：</th>
                        <td>
                            <textarea name="art_description">{{old('art_description')}}</textarea>
                        </td>
                    </tr>
                    
                    
                    <tr>
                        <th>文章内容：</th>
                        <td>
                            <script type="text/javascript" charset="utf-8" src="{{asset('extend/ueditor/ueditor.config.js')}}"></script>
                            <script type="text/javascript" charset="utf-8" src="{{asset('extend/ueditor/ueditor.all.min.js')}}"> </script>
                            <script type="text/javascript" charset="utf-8" src="{{asset('extend/ueditor/lang/zh-cn/zh-cn.js')}}"></script>
                            <script id="editor" type="text/plain" style="width:1024px;height:500px;"></script>
                            <script>
                                var ue = UE.getEditor('editor');
                            </script>
                            <style>
                                .edui-default{line-height:28px;}
                                div .edui-combox,div .edui-button-body,div .edui-splitbutton-body{overflow:hidden;height:20px;}
                                div .edui-box{overflow:hidden;height:22px;}
                            </style>
                            <textarea name="art_content" >{{old('art_content')}}</textarea>
                        </td>
                    </tr>
                    <tr>
                        <th></th>
                        <td>
                            <input type="submit" value="提交">
                            <input type="button" class="back" onclick="history.go(-1)" value="返回">
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>

@endsection