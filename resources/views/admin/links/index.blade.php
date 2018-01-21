@extends('layouts.admin')

@section('content')
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首页</a> &raquo;  友情链接
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
                    <a href="{{url('admin/links/create')}}"><i class="fa fa-plus"></i>添加链接</a>
                    <a href="{{url('admin/links')}}"><i class="fa fa-recycle"></i>友情链接</a>
                </div>
            </div>
            <!--快捷导航 结束-->
        </div>

        <div class="result_wrap">
            <div class="result_content">
                <table class="list_tab">
                    <tr>
                        <th class="tc" width="5%">ID</th>
                        <th class="tc" width="5%">名称</th>
                        <th>标题</th>
                        <th>链接地址</th>
                        <th>排序</th>
                        <th>操作</th>
                    </tr>

                    @foreach($data as $v)
                        <tr>
                            <td class="tc">
                                <input type="text" onchange="changeOrder(this,{{$v->link_id}})" value="{{$v->link_id}}" />
                            </td>
                            <td class="tc">{{$v->link_name}}</td>
                            <td>{{$v->link_title}}</td>
                            <td>{{$v->link_url}}</td>
                            <td>{{$v->link_order}}</td>
                            <td>
                                <a href="{{url('admin/links/'.$v->link_id.'/edit')}}">修改</a>
                                <a href="javascript:void(0)" onclick="promptDel({{$v->link_id}})">删除</a>
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
    function changeOrder(obj,cate_id){
        var cate_order=$(obj).val();
        $.post('{{url("admin/cate/changeOrder")}}',{'_token':'{{csrf_token()}}','cate_id':cate_id,'cate_order':cate_order},function(data){
            if(data.status==0){
                layer.alert('排序更新成功！');
            }else{
                layer.alert('排序更新失败');
            }
        });
    }
    
    function promptDel(link_id){
        layer.confirm('您确认要删除吗？', {
            btn: ['确认','取消'] //按钮
        }, function(){
            $.post("{{url('admin/links')}}/"+link_id,{'link_id':link_id,'_token':'{{csrf_token()}}','_method':'delete'},function(data){
                if(data.error==0){
                    layer.msg('删除成功', {icon: 6});
                    location.href="{{url('admin/links')}}";
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