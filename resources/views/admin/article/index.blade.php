@extends('layouts.admin')

@section('content')
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首页</a> &raquo;  全部文章
    </div>
    <!--面包屑导航 结束-->

    <!--搜索结果页面 列表 开始-->
    <form action="#" method="post">
        <div class="result_wrap">
            <div class="result_title">
                <h3>快捷操作</h3>
            </div>
            <!--快捷导航 开始-->
            <div class="result_content">
                <div class="short_wrap">
                    <a href="{{url('admin/article/create')}}"><i class="fa fa-plus"></i>添加文章</a>
                    <a href="{{url('admin/article')}}"><i class="fa fa-recycle"></i>全部文章</a>
                </div>
            </div>
            <!--快捷导航 结束-->
        </div>

        <div class="result_wrap">
            <div class="result_content">
                <table class="list_tab">
                    <tr>
                        <th class="tc" width="5%">ID</th>
                        <th class="tc" width="5%">标题</th>
                        <th>编辑人</th>
                        <th>编辑时间</th>
                        <th>查看次数</th>
                        <th>操作</th>
                    </tr>
                    @foreach($data as $v)
                        <tr>
                            <td class="tc">
                                <input type="text" onchange="changeOrder(this,{{$v->art_id}})" value="{{$v->art_order}}">
                            </td>
                            <td class="tc">{{$v->art_title}}</td>
                            <td>
                                {{$v->art_editor}}
                            </td>
                            <td>{{date('Y-m-d H:i:s',$v->art_time)}}</td>
                            <td>{{$v->art_view}}</td>
                            <td>
                                <a href="{{url('admin/article/'.$v->art_id.'/edit')}}">修改</a>
                                <a href="javascript:void(0)" onclick="promptDel({{$v->art_id}})">删除</a>
                            </td>
                        </tr>
                    @endforeach
    
                </table>
                

<!--            <div class="page_nav">
                <div>
                <a class="first" href="/wysls/index.php/Admin/Tag/index/p/1.html">第一页</a> 
                <a class="prev" href="/wysls/index.php/Admin/Tag/index/p/7.html">上一页</a> 
                <a class="num" href="/wysls/index.php/Admin/Tag/index/p/6.html">6</a>
                <a class="num" href="/wysls/index.php/Admin/Tag/index/p/7.html">7</a>
                <span class="current">8</span>
                <a class="num" href="/wysls/index.php/Admin/Tag/index/p/9.html">9</a>
                <a class="num" href="/wysls/index.php/Admin/Tag/index/p/10.html">10</a> 
                <a class="next" href="/wysls/index.php/Admin/Tag/index/p/9.html">下一页</a> 
                <a class="end" href="/wysls/index.php/Admin/Tag/index/p/11.html">最后一页</a> 
                <span class="rows">11 条记录</span>
                </div>
            </div>-->



<!--            <div class="page_list">
                <ul>
                    <li class="disabled"><a href="#">&laquo;</a></li>
                    <li class="active"><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#">&raquo;</a></li>
                </ul>
            </div>-->
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
    function changeOrder(obj,art_id){
        var art_order=$(obj).val();
        $.post('{{url("admin/article/changeOrder")}}',{'_token':'{{csrf_token()}}','art_id':art_id,'art_order':art_order},function(data){
            if(data.status==0){
                layer.alert('文章排序更新成功！');
            }else{
                layer.alert('文章排序更新失败');
            }
        });
    }
    
    function promptDel(art_id){
        layer.confirm('您确认要删除吗？', {
            btn: ['确认','取消'] //按钮
        }, function(){
            $.post("{{url('admin/article')}}/"+art_id,{'art_id':art_id,'_token':'{{csrf_token()}}','_method':'delete'},function(data){
                if(data.error==0){
                    layer.msg('删除成功', {icon: 6});
                    location.href="{{url('admin/article')}}";
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