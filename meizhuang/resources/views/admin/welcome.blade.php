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
    <link rel="stylesheet" type="text/css" href="{{asset('./hui/static/h-ui/css/H-ui.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('./hui/static/h-ui.admin/css/H-ui.admin.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('./hui/lib/Hui-iconfont/1.0.8/iconfont.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('./hui/static/h-ui.admin/skin/default/skin.css')}}" id="skin" />
    <link rel="stylesheet" type="text/css" href="{{asset('./hui/static/h-ui.admin/css/style.css')}}" />
    <!--[if IE 6]>
    <script type="text/javascript" src="{{asset('./hui/lib/DD_belatedPNG_0.0.8a-min.js')}}" ></script>
    <script>DD_belatedPNG.fix('*');</script>
    <![endif]-->
    <title>我的桌面</title>
</head>
<body>
<div class="page-container">
    <p class="f-20 text-success">欢迎 <a>{{Session::get('admin.name')}}</a> 进入后台管理系统</p>
    <span>服务器基本配置信息</span>
    <table class="table table-border table-bordered table-bg mt-20">
        <thead>
        <tr>
            <th colspan="2" scope="col">服务器信息</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>服务器IP地址</td>
            <td>{{$_SERVER['SERVER_ADDR']}}</td>
        </tr>
        <tr>
            <td>服务器域名</td>
            <td>{{$_SERVER['SERVER_NAME']}}</td>
        </tr>
        <tr>
            <td>服务器端口</td>
            <td>80</td>
        </tr>
        <tr>
            <td>服务器运行环境 </td>
            <td>{{$_SERVER['SERVER_SOFTWARE']}}</td>
        </tr>
        <tr>
            <td>服务器操作系统 </td>
            <td>{{PHP_OS}}</td>
        </tr>
        <tr>
            <td>服务器的语言种类 </td>
            <td>Chinese</td>
        </tr>
        <tr>
            <td>服务器当前时间 </td>
            <td>@include('admin/time')</td>
        </tr>
        <tr>
            <td>服务器HOST </td>
            <td>{{$_SERVER['SERVER_ADDR']}}</td>
        </tr>
        </tbody>
    </table>
</div>
<script type="text/javascript" src="{{asset('./hui/lib/jquery/1.9.1/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('./hui/static/h-ui/js/H-ui.min.js')}}"></script>
<!--此乃百度统计代码，请自行删除-->
<script>
    var _hmt = _hmt || [];
    (function() {
        var hm = document.createElement("script");
        hm.src = "https://hm.baidu.com/hm.js?080836300300be57b7f34f4b3e97d911";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hm, s);
    })();
</script>
<!--/此乃百度统计代码，请自行删除-->
</body>
</html>