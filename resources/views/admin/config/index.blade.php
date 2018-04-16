@extends('layouts.admin')

@section('content')
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首页</a> &raquo;  网站配置
    </div>
    <!--面包屑导航 结束-->

    <!--搜索结果页面 列表 开始-->
        <div class="result_wrap">
            <div class="result_title">
                <h3>快捷操作</h3>
            </div>
            <!--快捷导航 开始-->
            <div class="result_content">
                <div class="short_wrap">
                    <a href="{{url('admin/navs/create')}}"><i class="fa fa-plus"></i>添加网站配置</a>
                </div>
            </div>
            <!--快捷导航 结束-->
        </div>

        <div class="result_wrap">
            <div class="result_content">
                 <form action="{{url('admin/conf/changecontent')}}" method="post" />
                    {{csrf_field()}}
                    <table class="list_tab">
                   
                        <tr>
                            <th class="tc" width="5%">排序</th>
                            <th class="tc" width="5%">ID号</th>
                            <th>标题</th>
                            <th>名称</th>
                            <th>内容</th>
                            <th>操作</th>
                        </tr>

                        @foreach($data as $v)
                            <tr>
                                <td class="tc">
                                    <input type="text" onchange="changeOrder(this,{{$v->conf_id}})" value="{{$v->conf_order}}" />
                                </td>
                                <td>{{$v->conf_id}}</td>
                                <td class="tc">{{$v->conf_title}}</td>
                                <td>{{$v->conf_name}}</td>
                                <td style="width:500px;">
                                    @if($v->field_type=='input')
                                        <input type="text" name="conf_content[{{$v->conf_id}}]" value="{{$v->content}}" style="width:500px;padding-left:10px;text-align: left;"/>
                                    @elseif($v->field_type=='textarea')
                                        <textarea name="conf_content[{{$v->conf_id}}]" rows="5" cols="4" style="width:500px;">{{$v->content}}</textarea>
                                    @elseif($v->field_type=='radio')
                                        <input type="radio" name="conf_content[{{$v->conf_id}}]" 
                                        @if($v->content===0)
                                            checked="checked"
                                        @endif
                                        value="0"
                                         />-关闭&nbsp;
                                        <input type="radio" name="conf_content[{{$v->conf_id}}]" 
                                        @if($v->content===1)
                                            checked="checked"
                                        @endif
                                        value="1"
                                         />-开启

                                    @endif
                                </td>
                                <td>
                                    <a href="{{url('admin/conf/'.$v->conf_id.'/edit')}}">修改</a>
                                    <a href="javascript:void(0)" onclick="promptDel({{$v->conf_id}})">删除</a>
                                    
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    <div class="btn_group">
                        <input type='submit' value="提交" />
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type='button' class="back" value="返回" /> 
                    </div>
                </form>
            <div class="page_list">
                {{$data->links()}}
            </div>
        </div>
    </div>
</form>
<!--搜索结果页面 列表 结束-->
<style>
    .result_content ul li span{
        font-size: 15px;
        padding:6px 12px;
    }
</style>

<script>
    function changeOrder(obj,nav_id){
        var nav_order=$(obj).val();
        $.post('{{url("admin/conf/changeOrder")}}',{'_token':'{{csrf_token()}}','conf_':conf_id,'conf_order':conf_order},function(data){
            if(data.status==0){
                layer.alert('排序更新成功！');
            }else{
                layer.alert('排序更新失败');
            }
        });
    }
    
    function promptDel(nav_id){
        layer.confirm('您确认要删除吗？', {
            btn: ['确认','取消'] //按钮
        }, function(){
            $.post("{{url('admin/conf')}}/"+nav_id,{'conf_id':conf_id,'_token':'{{csrf_token()}}','_method':'delete'},function(data){
                if(data.error==0){
                    layer.msg('删除成功', {icon: 6});
                    location.href="{{url('admin/conf')}}";
                }else{
                    layer.msg('删除失败', {icon: 5});
                }
            },'json');
        }, function(){
            /*
            layer.msg('您已经取消', {
                time: 1000, //20s后自动关闭
                btn: ['明白了']
            });*/
        })
    }
</script>

@endsection