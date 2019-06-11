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
    <link rel="stylesheet" type="text/css" href="{{asset('./hui/lib/icheck/icheck.css')}}" />
    <!--[if IE 6]>
    <script type="text/javascript" src="{{asset('./hui/lib/DD_belatedPNG_0.0.8a-min.js')}}" ></script>
    <script>DD_belatedPNG.fix('*');</script>
    <![endif]-->
    <title>添加公告</title>
</head>
<body>
<div class="page-container">
    <form action="{{url('admin/gonggao')}}" method="post" class="form form-horizontal" id="form-user-add">
       @csrf
        <div class="row cl">

            @if(count($errors)>0)
                <div style="margin-bottom:20px;background-color: yellow;color: red;text-align: center">
                    @if(is_object($errors))
                        @foreach($errors->all() as $error)
                            {{$error}}
                        @endforeach
                    @else
                        <p>{{$errors}}</p>
                    @endif
                </div>
            @endif
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">
                <span class="c-red">*</span>
                标题：</label>
            <div class="formControls col-xs-6 col-sm-6">
                <input type="text" class="input-text" value="" placeholder="" id="user-name" name="title">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">内容：</label>
            <div class="formControls col-xs-6 col-sm-6">
                <textarea name="content" cols="" rows="" class="textarea"  placeholder="说点什么吧..." onKeyUp="$.Huitextarealength(this,100)"></textarea>
            </div>
        </div>
        <div class="row cl">
            <div class="col-9 col-offset-2">
                <input style="margin-left: 180px" class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
                <input style="margin-left: 50px;background-color: #8D8D8D" class="btn btn-primary radius" type="reset" value="&nbsp;&nbsp;重置&nbsp;&nbsp;">
            </div>
        </div>
    </form>
</div>
<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="{{asset('./hui/lib/jquery/1.9.1/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('./hui/lib/layer/2.4/layer.js')}}"></script>
<script type="text/javascript" src="{{asset('./hui/static/h-ui/js/H-ui.min.js')}}"></script>
<script type="text/javascript" src="{{asset('./hui/static/h-ui.admin/js/H-ui.admin.js')}}"></script> <!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="{{asset('./hui/lib/jquery.validation/1.14.0/jquery.validate.js')}}"></script>
<script type="text/javascript" src="{{asset('./hui/lib/jquery.validation/1.14.0/validate-methods.js')}}"></script>
<script type="text/javascript" src="{{asset('./hui/lib/jquery.validation/1.14.0/messages_zh.js')}}"></script>
<script type="text/javascript">
    $(function(){

    });
</script>
</body>
</html>