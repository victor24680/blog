@extends('layouts.admin')

@section('content')
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">网站配置页</a> &raquo; 添加网站配置
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
                <a href="#"><i class="fa fa-plus"></i>新增网站配置</a>
            </div>
        </div>
    </div>
    <!--结果集标题与导航组件 结束-->
    
    <div class="result_wrap">
        <form action="{{url('admin/conf/'.$item->conf_id)}}" method="post">
            <input type="hidden" value="put" name='_method' />
            {{csrf_field()}}
            <table class="add_tab">
                <tbody>
                    <tr>
                        <th><i class="require">*</i>标题</th>
                        <td>
                            <input type="text" name="conf_title" value="{{$item->conf_title}}">
                            <span><i class="fa fa-exclamation-circle yellow"></i>标题必须填写</span>
                        </td>
                    </tr>

                    <tr>
                        <th><i class="require"></i>名称：</th>
                        <td>
                            <input type="text" class="lg" name="conf_name" value="{{$item->conf_name}}">
                        </td>
                    </tr>
 
    
                    <tr>
                        <th><i class="require"></i>类型：</th>
                        <td>
                            <input type="radio" class="field_type" name="field_type" value="input"  
                            @if($item->field_type=='input')
                                checked="checked"
                            @endif
                            />-input &nbsp;&nbsp;
                            <input type="radio" class="field_type" name="field_type" value="textarea" 
                                @if($item->field_type=='textarea')
                                    checked="checked"
                                @endif
                            />-textarea&nbsp;&nbsp;
                            <input type="radio" class="field_type" name="field_type" value="radio"
                                @if($item->field_type=='radio')
                                    checked="checked"
                                @endif
                             />-radio&nbsp;&nbsp;
                        </td>
                    </tr>
                    

                    <tr class="hide_field_value" style="display: none;">
                        <th><i class="require"></i>类型值：</th>
                        <td>
                            <input type="text" class="field_value" name="field_value" value="{{$item->field_value}}">
                            <span><i class="fa fa-exclamation-circle yellow"></i>类型值只有在在radio的情况下才需要配置，格式1|开启，0|关闭</span>
                        </td>
                    </tr>

                    <tr>
                        <th><i class="require"></i>排序：</th>
                        <td>
                            <input type="text" class="conf_order" name="conf_order" value="{{$item->conf_order}}">
                        </td>
                    </tr>

                    <tr>
                        <th><i class="require"></i>说明：</th>
                        <td>
                            <textarea name="conf_tips">{{$item->conf_tips}}</textarea>
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
<script type="text/javascript">
    
    $(function(){
        $('.field_type').click(function(){
            var value=$('.field_type:checked').val();
            if(value==='radio'){
                $('.hide_field_value').show();
            }else{
                $('.hide_field_value').hide();
            }
        })
    })

</script>
@endsection