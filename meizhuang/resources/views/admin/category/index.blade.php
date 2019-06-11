<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <!--[if lt IE 9]>
    <script type="text/javascript" src="{{asset('./hui/lib/html5shiv.js')}}"></script>
    <script type="text/javascript" src="{{asset('./hui/lib/respond.min.js')}}"></script>
    <![endif]-->
    <link rel="stylesheet" type="text/css" href="{{asset('./hui/css/pull-right.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('./hui/static/h-ui/css/H-ui.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('./hui/static/h-ui.admin/css/H-ui.admin.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('./hui/lib/Hui-iconfont/1.0.8/iconfont.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('./hui/static/h-ui.admin/skin/default/skin.css')}}" id="skin" />
    <link rel="stylesheet" type="text/css" href="{{asset('./hui/static/h-ui.admin/css/style.css')}}" />
    <!--[if IE 6]>
    <script type="text/javascript" src="{{asset('./hui/lib/DD_belatedPNG_0.0.8a-min.js')}}" ></script>
    <script>DD_belatedPNG.fix('*');</script>
    <![endif]-->
    <title>分类管理</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 分类管理 <span class="c-gray en">&gt;</span> 分类列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
    <div class="mt-20">
        <table class="table table-border table-bordered table-bg table-sort">
            <thead>
            <tr class="text-c">
                <th width="30">ID</th>
                <th width="50">分类名称</th>
                <th width="200">简介</th>
                <th width="40">操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $v)
            <tr class="text-c">
                <td>{{$v->id}}</td>
                <td>{{$v->typename}}</td>
                <td>{{$v->content}}</td>
                <td class="td-manage"><a title="编辑" href="{{url('admin/category/'.$v->id.'/edit')}}" style="text-decoration:none"><i style="font-size: 20px" class="Hui-iconfont">&#xe6df;</i></a> &nbsp;&nbsp;&nbsp;
                    <a title="删除" href="javascript:;" onclick="delCate({{$v->id}})" class="ml-5" style="text-decoration:none"><i style="font-size: 20px" class="Hui-iconfont">&#xe6e2;</i></a></td>
            </tr>
                @endforeach
            </tbody>
        </table>
        <div id="pull_right">
            <div class="pull-right">
                {{$data->links()}}
            </div>
        </div>

    </div>
</div>
<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="{{asset('./hui/lib/jquery/1.9.1/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('./hui/lib/layer/2.4/layer.js')}}"></script>
<script type="text/javascript" src="{{asset('./hui/static/h-ui/js/H-ui.min.js')}}"></script>
<script type="text/javascript" src="{{asset('./hui/static/h-ui.admin/js/H-ui.admin.js')}}"></script> <!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="{{asset('./hui/lib/zTree/v3/js/jquery.ztree.all-3.5.min.js')}}"></script>
<script type="text/javascript" src="{{asset('./hui/lib/My97DatePicker/4.8/WdatePicker.js')}}"></script>
<script type="text/javascript" src="{{asset('./hui/lib/datatables/1.10.15/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript" src="{{asset('./hui/lib/laypage/1.2/laypage.js')}}"></script>
<script type="text/javascript">
    $('.table-sort').dataTable({
        "aaSorting": [[ 1, "desc" ]],//默认第几个排序
        "bStateSave": true,//状态保存
        "aoColumnDefs": [
            //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
            {"orderable":false,"aTargets":[0,6]}// 制定列不参与排序
        ]
    });
    /*用户-编辑*/
    function member_edit(title,url,id,w,h){
        layer_show(title,url,w,h);
    }
    /*密码-修改*/
    function change_password(title,url,id,w,h){
        layer_show(title,url,w,h);
    }
    /*用户-删除*/
    function delCate(id){
        layer.confirm('您确定删除吗？', {
            btn: ['确定','取消'] //按钮
        }, function(){
            $.post("{{url('admin/category/')}}/"+id ,{'_method':'delete','_token':"{{csrf_token()}}"},function (data) {
                if ((data.status==0)) {
                    location.href=location.href;
                    layer.msg(data.msg,{icon:6});
                }else {
                    layer.msg(data.msg,{icon:5});
                } });
        }, function(){

        });
    }
</script>
</body>
</html>