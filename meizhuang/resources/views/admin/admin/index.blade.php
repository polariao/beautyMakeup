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
    <title>管理员列表</title>
    <link rel="stylesheet" href="{{asset('./hui/lib/zTree/v3/css/zTreeStyle/zTreeStyle.css')}}" type="text/css">
</head>
<body class="pos-r">

<div >
    <nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 管理员管理 <span class="c-gray en">&gt;</span> 管理员列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
    <div class="page-container">
        <div class="text-c">

        </div>
        <div style="margin-bottom:20px;background-color: yellow;color: red;text-align: center">
            @if(session('msg'))
                <p style="color:red ;text-align: center;margin-top: 10px">{{session('msg')}}</p>
            @endif
        </div>
        <div class="mt-20">
            <table class="table table-border table-bordered table-bg table-hover table-sort">
                <tr class="text-c">
                    <th width="30">ID</th>
                    <th width="50">姓名</th>
                    <th width="80">等级</th>
                    <th width="40">操作</th>
                </tr>
                <tbody>
                @foreach($data as $v)
                    <tr class="text-c">
                        <td>{{$v->id}}</td>
                        <td>{{$v->name}}</td>
                        @if($v->name=='admin')
                        <td style="color: red">超级管理员</td>
                            @else
                            <td>普通管理员</td>
                        @endif
                        <td class="td-manage"><a title="编辑" href="{{url('admin/admin/'.$v->id.'/edit')}}" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a> &nbsp;&nbsp;&nbsp;&nbsp;
                            <a title="删除" href="javascript:;" onclick="@if(Session::get('admin.name')!='admin')  alert('非超级管理员，权限不足'); @elseif(Session::get('admin.name')==$v->name&&$v->name=='admin')  alert('超级管理员用户，不可删除'); @else delCate({{$v->id}})@endif" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
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
    function admin_add(title,url,w,h){
        layer_show(title,url,w,h);
    }
    function delCate(id){
        layer.confirm('您确定删除吗？', {
            btn: ['确定','取消'] //按钮
        }, function(){
            $.post("{{url('admin/admin/')}}/"+id ,{'_method':'delete','_token':"{{csrf_token()}}"},function (data) {
                if ((data.status==0)) {
                    location.href=location.href;
                    layer.msg(data.msg,{icon:6});
                }else {
                    layer.msg(data.msg,{icon:5});
                } });
        }, function(){

        });
    }
    var setting = {
        view: {
            dblClickExpand: false,
            showLine: false,
            selectedMulti: false
        },
        data: {
            simpleData: {
                enable:true,
                idKey: "id",
                pIdKey: "pId",
                rootPId: ""
            }
        },
        callback: {
            beforeClick: function(treeId, treeNode) {
                var zTree = $.fn.zTree.getZTreeObj("tree");
                if (treeNode.isParent) {
                    zTree.expandNode(treeNode);
                    return false;
                } else {
                    //demoIframe.attr("src",treeNode.file + ".html");
                    return true;
                }
            }
        }
    };



    $(document).ready(function(){
        var t = $("#treeDemo");
        t = $.fn.zTree.init(t, setting, zNodes);
        //demoIframe = $("#testIframe");
        //demoIframe.on("load", loadReady);
        var zTree = $.fn.zTree.getZTreeObj("tree");
        //zTree.selectNode(zTree.getNodeByParam("id",'11'));
    });

    $('.table-sort').dataTable({
        "aaSorting": [[ 1, "desc" ]],//默认第几个排序
        "bStateSave": true,//状态保存
        "aoColumnDefs": [
            {"orderable":false,"aTargets":[0,7]}// 制定列不参与排序
        ]
    });
    /*产品-添加*/
    function product_add(title,url){
        var index = layer.open({
            type: 2,
            title: title,
            content: url
        });
        layer.full(index);
    }
    /*产品-查看*/
    function product_show(title,url,id){
        var index = layer.open({
            type: 2,
            title: title,
            content: url
        });
        layer.full(index);
    }
    /*产品-审核*/
    function product_shenhe(obj,id){
        layer.confirm('审核文章？', {
                btn: ['通过','不通过'],
                shade: false
            },
            function(){
                $(obj).parents("tr").find(".td-manage").prepend('<a class="c-primary" onClick="product_start(this,id)" href="javascript:;" title="申请上线">申请上线</a>');
                $(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已发布</span>');
                $(obj).remove();
                layer.msg('已发布', {icon:6,time:1000});
            },
            function(){
                $(obj).parents("tr").find(".td-manage").prepend('<a class="c-primary" onClick="product_shenqing(this,id)" href="javascript:;" title="申请上线">申请上线</a>');
                $(obj).parents("tr").find(".td-status").html('<span class="label label-danger radius">未通过</span>');
                $(obj).remove();
                layer.msg('未通过', {icon:5,time:1000});
            });
    }
    /*产品-下架*/
    function product_stop(obj,id){
        layer.confirm('确认要下架吗？',function(index){
            $(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="product_start(this,id)" href="javascript:;" title="发布"><i class="Hui-iconfont">&#xe603;</i></a>');
            $(obj).parents("tr").find(".td-status").html('<span class="label label-defaunt radius">已下架</span>');
            $(obj).remove();
            layer.msg('已下架!',{icon: 5,time:1000});
        });
    }

    /*产品-发布*/
    function product_start(obj,id){
        layer.confirm('确认要发布吗？',function(index){
            $(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="product_stop(this,id)" href="javascript:;" title="下架"><i class="Hui-iconfont">&#xe6de;</i></a>');
            $(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已发布</span>');
            $(obj).remove();
            layer.msg('已发布!',{icon: 6,time:1000});
        });
    }

    /*产品-申请上线*/
    function product_shenqing(obj,id){
        $(obj).parents("tr").find(".td-status").html('<span class="label label-default radius">待审核</span>');
        $(obj).parents("tr").find(".td-manage").html("");
        layer.msg('已提交申请，耐心等待审核!', {icon: 1,time:2000});
    }

    /*产品-编辑*/
    function product_edit(title,url,id){
        var index = layer.open({
            type: 2,
            title: title,
            content: url
        });
        layer.full(index);
    }

    /*产品-删除*/
    function product_del(obj,id){
        layer.confirm('确认要删除吗？',function(index){
            $.ajax({
                type: 'POST',
                url: '',
                dataType: 'json',
                success: function(data){
                    $(obj).parents("tr").remove();
                    layer.msg('已删除!',{icon:1,time:1000});
                },
                error:function(data) {
                    console.log(data.msg);
                },
            });
        });
    }
</script>
</body>
</html>