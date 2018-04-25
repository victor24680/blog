@extends('layouts.admin')

@section('content')
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">文章页</a> &raquo; 修改文章
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
                <a href="{{route('admin.article.create')}}" target="_blank"><i class="fa fa-plus"></i>新增文章</a>
                <a href="{{url('admin/article')}}" target="_blank"><i class="fa fa-recycle"></i>批量删除</a>
                <a href="{{url('admin/article')}}" target="_blank"><i class="fa fa-refresh"></i>更新排序</a>
            </div>
        </div>
    </div>
    <!--结果集标题与导航组件 结束-->
    
    <div class="result_wrap">
        <form action="{{url('admin/article/'.$item->art_id)}}" method="post">
            {{csrf_field()}}
            <input type="hidden" name="_method" value="put" />
            <table class="add_tab">
                <tbody>
                    <tr>
                        <th width="120"><i class="require">*</i>文章分类：</th>
                        <td>
                            <select name="cate_pid">
                                @foreach($data as $vo)
                                <option value="{{$vo->cate_id}}"  @if($vo->cate_id == $item->cate_pid) selected @endif >
                                    {{$vo->_cate_name}}
                                </option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    
                    <tr>
                        <th><i class="require">*</i>文章标题：</th>
                        <td>
                            <input type="text" name="art_title" value="{{$item->art_title}}">
                            <span><i class="fa fa-exclamation-circle yellow"></i>文章标题必须填写</span>
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require"></i>文章编辑：</th>
                        <td>
                            <input type="text" class="lg" name="art_editor" value="{{$item->art_editor}}">
                        </td>
                    </tr>
 
                    <tr>
                        <th><i class="require"></i>文章缩略图：</th>
                        <td>
                            <input type="text" class="lg" id="slImg" size="50" name="art_thumb" value="{{$item->art_thumb}}">
                            <button type="button" class="layui-btn" id="test1">
                                <i class="layui-icon">&#xe67c;</i>上传图片
                            </button>
                            <div class="layui-upload-list">
                                <img src="{{$item->art_thumb}}"class="layui-upload-img" id="demo1" style="width:100px;height:100px;">
                                <p id="demoText"></p>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <th><i class="require"></i>文章关键字：</th>
                        <td>
                            <input type="text" class="lg" name="art_tag" value="{{$item->art_tag}}">
                        </td>
                    </tr>
                    <tr>
                        <th>文章描述：</th>
                        <td>
                            <textarea name="art_description">{{$item->art_description}}</textarea>
                        </td>
                    </tr>
                    
                    
                    <tr>
                        <th>文章内容：</th>
                        <td>
                            <script type="text/javascript" charset="utf-8" src="{{asset('extend/ueditor/ueditor.config.js')}}"></script>
                            <script type="text/javascript" charset="utf-8" src="{{asset('extend/ueditor/ueditor.all.min.js')}}"> </script>
                            <script type="text/javascript" charset="utf-8" src="{{asset('extend/ueditor/lang/zh-cn/zh-cn.js')}}"></script>
                            <script id="editor" name="art_content" type="text/plain" style="width:800px;height:500px;">{!! $item->art_content !!}</script>
                            <script>
                                var ue = UE.getEditor('editor');
                            </script>
                            <style>
                                .edui-default{line-height:28px;}
                                div .edui-combox,div .edui-button-body,div .edui-splitbutton-body{overflow:hidden;height:20px;}
                                div .edui-box{overflow:hidden;height:22px;}
                            </style>
                            <!--<textarea name="art_content" >{{old('art_content')}}</textarea>-->
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
    <script>
        layui.use('upload',function(){
            var upload=layui.upload;
            var uploadInst=upload.render({
                elem:'#test1',
                url:"{{route('upload')}}",
                method:'post',
                accept:'images',
                field:'fileImage',
                data:{
                    "_token":"{{csrf_token()}}"
                },
                before:function(obj){
                    obj.preview(function(index,file,result){
                        $('#demo1').attr('src',result);
                    });
                },
                done: function(res){
                    //如果上传失败
                    $('#slImg').val(res.data.no_http_src);
                    //上传成功
                },
                error: function(){
                    //演示失败状态，并实现重传
                    var demoText = $('#demoText');
                    demoText.html('<span style="color: #FF5722;">上传失败</span> <a class="layui-btn layui-btn-mini demo-reload">重试</a>');
                    demoText.find('.demo-reload').on('click', function(){
                        uploadInst.upload();
                    });
                }
            });
        });
    </script>
@endsection