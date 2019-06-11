<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/4.1.0/css/bootstrap.min.css">
    <script src="https://cdn.staticfile.org/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.staticfile.org/popper.js/1.12.5/umd/popper.min.js"></script>
    <script src="https://cdn.staticfile.org/twitter-bootstrap/4.1.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="{{asset('./home/css/index.css')}}">
    <link rel="stylesheet" href="{{asset('./home/css/font/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('./hui/css/pull-right.css')}}" />
    <title>全部商品</title>
</head>

<body>
<!-- //导航栏 -->
<div class="header-nav fixed">
    <div class="container">
        <nav class="navbar navbar-expand-sm nav-color">
            <ul class="navbar-nav">

                <li class="nav-item">
                    <a class="nav-link" href=" # ">欢迎来到丝芙兰</a>
                </li>
                @if(Session::get('user.name'))
                    @foreach($link as $l)
                        <li class="nav-item">
                            <a class="nav-link" href="{{$l->link_url}}">{{$l->link_name}}</a>
                        </li>
                    @endforeach
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/')}}">首页</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('home/all')}}">全部商品</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{url('home/liuyan')}}">留言中心</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('home/action')}}">活动公告</a>
                    </li>
                @endif
            </ul>
            <ul class="navbar-nav ml-auto ">
                @if(Session::get('user.name'))
                    <li class="nav-item">
                        欢迎你 -- <a style="font-weight: bolder" >{{Session::get('user.name')}}</a>
                    </li>&nbsp;&nbsp;&nbsp;
                    <li class="nav-item">
                        <a  href="{{url('loginout')}}">注销</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('home/login')}}">登录</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link " href="{{url('home/xieyi')}}">注册</a>
                    </li>
                @endif
            </ul>
        </nav>
    </div>
</div>
<div style="height: 20px"></div>
<div class="container" style="height:8%;">
    <div class="row">
        <div class="col-3" style="font-size:30px;text-align: center;font-weight: bold;height: 100px;">
            <div style="height: 50px;margin:0 auto;">
                A&nbsp;&nbsp;B&nbsp;&nbsp;C&nbsp;&nbsp;D&nbsp;&nbsp;E&nbsp;&nbsp;F
            </div>
        </div>
        <div class="col-9" style="width:100%" id="shopCar">
            <div style="height: 50px;">
                <form class=" form-inline " action="{{url('home/select')}}" method="post">
                    @csrf
                    <input class="form-control" name="id" style="width:60%" type="text " placeholder="输入要搜的商品名">
                    <button class="btn btn-dark " style="width:10%" type="button ">搜索</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- 全部商品 -->
<div class="container" style="margin-top:50px;">
    <h3>全部商品</h3>
    <div class="row">
        @foreach($data as $s)
        <div class="col-4" style="margin-top: 30px">
            <div class="card" style="width:100%">
                <img class="card-img-top" src="/{{$s->tupianurl}}" alt="Card image" style="width:100%">
                <div class="card-body">
                    <p class="card-text">{{$s->spmingcheng}}</p>
                    <a href="{{url('home/goods/'.$s->id)}}" class="btn btn-primary">点击查看</a>
                </div>
            </div>
        </div>
            @endforeach

    </div>
    <div id="pull_right">
        <div class="pull-right">
            {{$data->links()}}
        </div>
    </div>
</div>

<!-- 底部 -->
<div class="container-fluid bg-dark" style="padding: 0;margin-top: 100px">
    <div class="row" style="margin:0">
        <div class="col-4 footer" style="padding:0">
            <h5>门店地址</h5>
            <ul>
                <li>查找门店</li>
                <li>定制美妆</li>
                <li>定制美妆</li>
            </ul>
        </div>
        <div class="col-4 footer" style="padding:0">
            <h5>关于我们</h5>
            <ul>
                <li>品牌故事</li>
                <li>购物五大理由</li>
                <li>专业会员</li>
            </ul>
        </div>
        <div class="col-4 footer">
            <h5>公司地址</h5>
            <ul>
                <li>XXXXXXXXXX</li>
                <li>XXXXXXXXXX</li>
                <li>XXXXXXXXXX</li>
            </ul>
        </div>
    </div>
</div>
</div>
</body>
<script>
    new Vue({
        el: "#shopCar",
        data: {
            show: false
        },
        methods: {
            showCar: function() {
                this.show = !this.show;
            }
        }

    })
</script>

</html>