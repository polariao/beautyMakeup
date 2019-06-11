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
    <link href="{{asset('./hui/static/h-ui/css/H-ui.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('./hui/static/h-ui.admin/css/H-ui.login.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('./hui/static/h-ui.admin/css/style.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('./hui/lib/Hui-iconfont/1.0.8/iconfont.css')}}" rel="stylesheet" type="text/css" />
    <!--[if IE 6]>
    <script type="text/javascript" src="{{asset('./hui/lib/DD_belatedPNG_0.0.8a-min.js')}}" ></script>
    <script>DD_belatedPNG.fix('*');</script>
    <![endif]-->
    <title>化妆品后台系统</title>
</head>
<body>
<input type="hidden" id="TenantId" name="TenantId" value="" />
<div class="loginWraper">
    <span style="font-size: 30px;position: absolute;top:40px;left: 620px;">化妆品后台系统--登录</span>
    <div id="loginform" class="loginBox">
        @if(session('msg'))
            <p style="color:red ;text-align: center">{{session('msg')}}</p>
        @endif
        <form class="form form-horizontal" action="" method="post">
            {{csrf_field()}}
            <div class="row cl">
                <label class="form-label col-xs-3"><i class="Hui-iconfont">&#xe60d;</i></label>
                <div class="formControls col-xs-8">
                    <input id="" name="username" type="text" placeholder="账户" class="input-text size-L">
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-3"><i class="Hui-iconfont">&#xe60e;</i></label>
                <div class="formControls col-xs-8">
                    <input id="" name="password" type="password" placeholder="密码" class="input-text size-L">
                </div>
            </div>
            <div class="row cl">
                <div class="formControls col-xs-8 col-xs-offset-3">

                    <input class="input-text size-L" type="text" class="code" name="code" placeholder="验证码"  style="width:150px;">
                    <img src="{{url('admin/code')}}" onclick="this.src='{{url('admin/code')}}?'+Math.random()">  <a id="kanbuq" href="javascript:;"></a> </div>
            </div>
            <div class="row cl">
                <div class="formControls col-xs-8 col-xs-offset-3">
                    <label for="online">
                        <input type="checkbox" name="online" id="online" value="">
                        使我保持登录状态</label>
                </div>
            </div>
            <div class="row cl">
                <div class="formControls col-xs-8 col-xs-offset-3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="{{url('admin/register/store')}}" class="btn btn-default radius size-L">&nbsp;注&nbsp;&nbsp;&nbsp;&nbsp;册&nbsp;</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <button type="submit" class="btn btn-success radius size-L">&nbsp;登&nbsp;&nbsp;&nbsp;&nbsp;录&nbsp;</button>


                </div>
            </div>
        </form>
    </div>
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
<!--/此乃百度统计代码，请自行删除
</body>
</html>