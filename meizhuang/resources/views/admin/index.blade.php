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
    <link rel="stylesheet" type="text/css" href="{{asset('./hui/lib/Hui-iconfont/1.0.7/iconfont.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('./hui/lib/icheck/icheck.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('./hui/static/h-ui.admin/skin/default/skin.css')}}" id="skin" />
    <link rel="stylesheet" type="text/css" href="{{asset('./hui/static/h-ui.admin/css/style.css')}}" />
    <!--[if IE 6]>
        <script type="text/javascript" src="{{asset('./hui/lib/DD_belatedPNG_0.0.8a-min.js')}}" ></script>
        <script>DD_belatedPNG.fix('*');</script>
        <![endif]-->
    <title>化妆品后台管理</title>
</head>
<body>
<header class="navbar-wrapper">
    <div class="navbar navbar-fixed-top">
        <div class="container-fluid cl"> <a class="logo navbar-logo f-l mr-10 hidden-xs" href="/aboutHui.shtml">化妆品后台管理</a> <a class="logo navbar-logo-m f-l mr-10 visible-xs" href="/aboutHui.shtml">H-ui</a>
            <span class="logo navbar-slogan f-l mr-10 hidden-xs" style="color: white">@include('admin/time')</span>
            <a aria-hidden="false" class="nav-toggle Hui-iconfont visible-xs" href="javascript:;">&#xe667;</a>
            <nav id="Hui-userbar" class="nav navbar-nav navbar-userbar hidden-xs">
                <ul class="cl">
                    @if(Session::get('admin.name')=='admin')
                    <li>超级管理员</li>
                        @else
                        <li>管理员</li>
                    @endif
                    <li class="dropDown dropDown_hover">
                        <a href="#" class="dropDown_A">{{ Session::get('admin.name') }}<i class="Hui-iconfont">&#xe6d5;</i></a>
                        <ul class="dropDown-menu menu radius box-shadow">
                            <li><a href="{{url('admin/loginout')}}">退出</a></li>
                        </ul>
                    </li>
                    </li>
                    <li id="Hui-skin" class="dropDown right dropDown_hover"> <a href="javascript:;" class="dropDown_A" title="换肤"><i class="Hui-iconfont" style="font-size:18px">&#xe62a;</i></a>
                        <ul class="dropDown-menu menu radius box-shadow">
                            <li><a href="javascript:;" data-val="default" title="默认（黑色）">默认（黑色）</a></li>
                            <li><a href="javascript:;" data-val="blue" title="蓝色">蓝色</a></li>
                            <li><a href="javascript:;" data-val="green" title="绿色">绿色</a></li>
                            <li><a href="javascript:;" data-val="red" title="红色">红色</a></li>
                            <li><a href="javascript:;" data-val="yellow" title="黄色">黄色</a></li>
                            <li><a href="javascript:;" data-val="orange" title="橙色">橙色</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</header>
    <aside class="Hui-aside">
        <div class="menu_dropdown bk_2">
            <dl id="menu-article">
                <dt><i class="Hui-iconfont">&#xe616;</i> 分类管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
                <dd>
                    <ul>
                        <li><a  data-href="{{url('admin/category/create')}}" data-title="添加分类" href="javascript:void(0)">添加分类</a></li>
                        <li><a  data-href="{{url('admin/category')}}" data-title="分类管理" href="javascript:void(0)">分类管理</a></li>

                    </ul>
                </dd>
            </dl>
            <dl id="menu-product">
                <dt><i class="Hui-iconfont">&#xe620;</i> 商品管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
                <dd>
                    <ul>
                        <li><a data-href="{{url('admin/product/create')}}" data-title="添加商品" href="javascript:void(0)">添加商品</a></li>
                        <li><a data-href="{{url('admin/product')}}" data-title="全部商品" href="javascript:void(0)">全部商品</a></li>
                        <li><a data-href="{{url('admin/shan/ready')}}" data-title="等待上架商品" href="javascript:void(0)">等待上架商品</a></li>
                        <li><a data-href="{{url('admin/shan/up')}}" data-title="已上架商品" href="javascript:void(0)">已上架商品</a></li>
                        <li><a data-href="{{url('admin/shan/down')}}" data-title="已下架商品" href="javascript:void(0)">已下架商品</a></li>
                    </ul>
                </dd>
            </dl>
            <dl id="menu-comments">
                <dt><i class="Hui-iconfont">&#xe603;</i> 活动公告<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
                <dd>
                    <ul>
                        <li><a data-href="{{url('admin/gonggao/create')}}" data-title="发表公告" href="javascript:;">发表公告</a></li>
                        <li><a data-href="{{url('admin/gonggao')}}" data-title="公告列表" href="javascript:void(0)">公告列表</a></li>
                    </ul>
                </dd>
            </dl>
            <dl id="menu-comments">
                <dt><i class="Hui-iconfont">&#xe687;</i> 订单信息<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
                <dd>
                    <ul>
                        <li><a data-href="{{url('admin/dingdan')}}" data-title="订单列表" href="javascript:void(0)">订单列表</a></li>
                    </ul>
                </dd>
            </dl>
            <dl id="menu-comments">
                <dt><i class="Hui-iconfont">&#xe63b;</i> 用户留言<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
                <dd>
                    <ul>
                        <li><a data-href="{{url('admin/leaveword')}}" data-title="留言列表" href="javascript:void(0)">留言列表</a></li>
                    </ul>
                </dd>
            </dl>
            <dl id="menu-comments">
                <dt><i class="Hui-iconfont">&#xe70a;</i> 商品评价<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
                <dd>
                    <ul>
                        <li><a data-href="{{url('admin/pingjia')}}" data-title="评价列表" href="javascript:void(0)">评价列表</a></li>
                    </ul>
                </dd>
            </dl>
            <dl id="menu-comments">
                <dt><i class="Hui-iconfont">&#xe6f1;</i> 友情链接<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
                <dd>
                    <ul>
                        <li><a data-href="{{url('admin/link/create')}}" data-title="添加链接" href="javascript:;">添加链接</a></li>
                        <li><a data-href="{{url('admin/link')}}" data-title="链接列表" href="javascript:void(0)">链接列表</a></li>
                    </ul>
                </dd>
            </dl>
            <dl id="menu-comments">
                <dt><i class="Hui-iconfont">&#xe60d;</i> 用户信息<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
                <dd>
                    <ul>
                        <li><a data-href="{{url('admin/user')}}" data-title="用户列表" href="javascript:void(0)">用户列表</a></li>
                    </ul>
                </dd>
            </dl>

            <dl id="menu-admin">
                <dt><i class="Hui-iconfont">&#xe62d;</i> 管理员<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
                <dd>
                    <ul>
                        <li><a data-href="{{url('admin/give')}}" data-title="授权中心" href="javascript:void(0)">授权中心</a></li>
                        <li><a data-href="{{url('admin/admin')}}" data-title="管理员列表" href="javascript:void(0)">管理员列表</a></li>
                    </ul>
                </dd>
            </dl>
            <dl id="menu-admin">
                <dt><i class="Hui-iconfont">&#xe61d;</i> 系统设置<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
                <dd>
                    <ul>
                        <li><a data-href="{{url('admin/lunbotu')}}" data-title="轮播图" href="javascript:void(0)">轮播图</a></li>
                        <li><a data-href="{{url('admin/protocol')}}" data-title="商城协议" href="javascript:void(0)">商城协议</a></li>
                    </ul>
                </dd>
            </dl>


        </div>
    </aside>
<div class="dislpayArrow hidden-xs"><a class="pngfix" href="javascript:void(0);" onClick="displaynavbar(this)"></a></div>
<section class="Hui-article-box">
    <div id="Hui-tabNav" class="Hui-tabNav hidden-xs">
        <div class="Hui-tabNav-wp">
            <ul id="min_title_list" class="acrossTab cl">
                <li class="active">
                    <span title="我的桌面" data-href="welcome.html">我的桌面</span>
                    <em></em></li>
            </ul>
        </div>
        <div class="Hui-tabNav-more btn-group">
            <a id="js-tabNav-prev" class="btn radius btn-default size-S" href="javascript:;"><i class="Hui-iconfont">&#xe6d4;</i></a>
            <a id="js-tabNav-next" class="btn radius btn-default size-S" href="javascript:;"><i class="Hui-iconfont">&#xe6d7;</i></a>
        </div>
    </div>
    <div id="iframe_box" class="Hui-article">
        <div class="show_iframe">
            <div style="display:none" class="loading"></div>
            <iframe id="iframe-welcome" data-scrolltop="0" scrolling="yes" frameborder="0" src="{{url('admin/welcome')}}"></iframe>
        </div>
    </div>
</section>

<div class="contextMenu" id="Huiadminmenu">
    <ul>
        <li id="closethis">关闭当前 </li>
        <li id="closeall">关闭全部 </li>
    </ul>
</div>
<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="{{asset('./hui/lib/jquery/1.9.1/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('./hui/lib/layer/2.4/layer.js')}}"></script>
<script type="text/javascript" src="{{asset('./hui/static/h-ui/js/H-ui.min.js')}}"></script>
<script type="text/javascript" src="{{asset('./hui/static/h-ui.admin/js/H-ui.admin.js')}}"></script>
<!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="lib/jquery.contextmenu/jquery.contextmenu.r2.js"></script>
<script type="text/javascript">
    $(function(){
        /*$("#min_title_list li").contextMenu('Huiadminmenu', {
            bindings: {
                'closethis': function(t) {
                    console.log(t);
                    if(t.find("i")){
                        t.find("i").trigger("click");
                    }
                },
                'closeall': function(t) {
                    alert('Trigger was '+t.id+'\nAction was Email');
                },
            }
        });*/
    });
    /*个人信息*/
    function myselfinfo(){
        layer.open({
            type: 1,
            area: ['300px','200px'],
            fix: false, //不固定
            maxmin: true,
            shade:0.4,
            title: '查看信息',
            content: '<div>管理员信息</div>'
        });
    }

    /*资讯-添加*/
    function article_add(title,url){
        var index = layer.open({
            type: 2,
            title: title,
            content: url
        });
        layer.full(index);
    }
    /*图片-添加*/
    function picture_add(title,url){
        var index = layer.open({
            type: 2,
            title: title,
            content: url
        });
        layer.full(index);
    }
    /*产品-添加*/
    function product_add(title,url){
        var index = layer.open({
            type: 2,
            title: title,
            content: url
        });
        layer.full(index);
    }
    /*用户-添加*/
    function member_add(title,url,w,h){
        layer_show(title,url,w,h);
    }


</script>

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
