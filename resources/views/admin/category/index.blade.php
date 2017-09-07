@extends('layouts.admin')

@section('content')
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首页</a> &raquo;  全部分类
    </div>
    <!--面包屑导航 结束-->

	<!--结果页快捷搜索框 开始-->
<!--    <div class="search_wrap">
        <form action="" method="post">
            <table class="search_tab">
                <tr>
                    <th width="120">选择分类:</th>
                    <td>
                        <select onchange="javascript:location.href=this.value;">
                            <option value="">全部</option>
                            <option value="http://www.baidu.com">百度</option>
                            <option value="http://www.sina.com">新浪</option>
                        </select>
                    </td>
                    <th width="70">关键字:</th>
                    <td><input type="text" name="keywords" placeholder="关键字"></td>
                    <td><input type="submit" name="sub" value="查询"></td>
                </tr>
            </table>
        </form>
    </div>-->
    <!--结果页快捷搜索框 结束-->

    <!--搜索结果页面 列表 开始-->
    <form action="#" method="post">
        <div class="result_wrap">
            <div class="result_title">
                <h3>快捷操作</h3>
            </div>
            <!--快捷导航 开始-->
            <div class="result_content">
                <div class="short_wrap">
                    <a href="{{url('admin/category/create')}}"><i class="fa fa-plus"></i>新增父级分类</a>
                    <a href="#"><i class="fa fa-recycle"></i>批量删除</a>
                    <a href="#"><i class="fa fa-refresh"></i>更新排序</a>
                </div>
            </div>
            <!--快捷导航 结束-->
        </div>

        <div class="result_wrap">
            <div class="result_content">
                <table class="list_tab">
                    <tr>
                        <th class="tc" width="5%">排序</th>
                        <th class="tc" width="5%">ID</th>
                        <th>分类名称</th>
                        <th>标题</th>
                        <th>查看次数</th>
                        <th>操作</th>
                    </tr>
                    @foreach($data as $v)
                        <tr>
                            <td class="tc">
                                <input type="text" onchange="changeOrder(this,{{$v->cate_id}})" value="{{$v->cate_order}}">
                            </td>
                            <td class="tc">{{$v->cate_id}}</td>
                            <td>
                                <a href="#">{{$v->_cate_name}}</a>
                            </td>
                            <td>{{$v->cate_title}}</td>
                            <td>{{$v->cate_view}}</td>
                            <td>
                                <a href="{{url('admin/category/'.$v->cate_id.'/edit')}}">修改</a>
                                <a href="javascript:void(0)" onclick="promptDel({{$v->cate_id}})">删除</a>
                            </td>
                        </tr>
                    @endforeach
    
                </table>

            <div class="page_nav">
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
            </div>



            <div class="page_list">
                <ul>
                    <li class="disabled"><a href="#">&laquo;</a></li>
                    <li class="active"><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#">&raquo;</a></li>
                </ul>
            </div>
        </div>
    </div>
</form>
    <!--搜索结果页面 列表 结束-->

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
    function promptDel(cate_id){
        layer.confirm('您确认要删除吗？', {
            btn: ['确认','取消'] //按钮
        }, function(){
            $.post("{{url('admin/category')}}/"+cate_id,{'cate_id':cate_id,'_token':'{{csrf_token()}}','_method':'delete'},function(data){
                if(data.error==0){
                    layer.msg('删除成功', {icon: 6});
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
        });
    }
</script>

@endsection