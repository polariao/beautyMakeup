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
    <link rel="stylesheet" href="{{asset('./home/css/goods.css')}}">
    <link rel="stylesheet" href="{{asset('./home/css/index.css')}}">
    <link rel="stylesheet" href="{{asset('./home/css/font/css/font-awesome.min.css')}}">
    <title>商品信息</title>
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
<div style="margin-top: 50px"></div>
    <!-- 商品信息 -->
    <div class="container" style="margin-top:30px">
        <div class="row">
            <div class="col-4">
                <img src="/{{$good->tupianurl}}" width="100%" height="100%" alt="">
            </div>
            <div class="col-8">
                <div style="margin-bottom:20px;background-color: yellow;color: red;text-align: center">
                    @if(session('msg'))
                        <p style="color:red ;text-align: center">{{session('msg')}}</p>
                    @endif
                </div>
                <div class="good-description">
                    <h5>{{$good->spmingcheng}}</h5>

                </div>
                <hr>
                <div class="good-price">
                    <p>价格:&nbsp;&nbsp;&nbsp;<span style="font-size:30px;color:red"><del>￥{{$good->shichangjia}}</del></span></p>
                    <p>会员价:&nbsp;&nbsp;&nbsp;<span style="font-size:30px;color:red">￥{{$good->huiyuanjia}}</span></p>
                    <p>活动:&nbsp;&nbsp;&nbsp;全场任意购买丝芙兰产品满388元，即随机赠送指定面膜一片</p>
                </div>
                <hr>
                <div class="good-select">
                    <p>规格:&nbsp;&nbsp;&nbsp;<span>{{$good->xinghao}}ml</span></p>
                    <p>库存:&nbsp;&nbsp;&nbsp;<span>{{$good->shuliang}}件</span></p>
                    <form action="{{url('home/goods/add')}}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{$good->id}}">
                        <div class="input-group" style="width:100px">
                           <span >
                            数量：<input style=" width: 50px; height: 30px" type="number" name="number" value="1">
                           </span>
                            <input type="submit" value="立即购买" class="btn btn-block btn-danger" style="background-color:green;margin-left:200px;margin-top:10px">
                            <input type="submit" value="加入购物车" class="btn btn-block btn-danger" style="margin-left:350px;margin-top:-38px">
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <!-- 评论，详情 -->
    <hr>
    <div class="container" style="margin-top:30px">
        <div class="row">
            <!-- 猜你喜欢 -->
            <div class="col-3">
                <h4>猜你喜欢</h4>
                <div class="card" style="width:100%">
                    <img class="card-img-top" src="/{{$like->tupianurl}}" alt="Card image" style="width:100%">
                    <div class="card-body">
                        <p class="card-text">{{$like->spmingcheng}}</p>
                        <a href="{{url('home/goods/'.$like->id)}}" class="btn btn-primary">点击查看</a>
                    </div>
                </div>
            </div>
            <div class="col-9">
                <h4>评论区</h4>
                <div style="margin-bottom:20px;color: red;text-align: center">
                    @if(session('ms'))
                        <p style="color:red ;text-align: center">{{session('ms')}}</p>
                    @endif
                </div>
                <div>
                    <form action="{{url('home/pingjia')}}" method="post">
                        @csrf
                        <input name="id" value="{{$good->id}}" type="hidden">
                        <div class="form-group custom-control-inline">
                            <textarea name="content" class="form-control" placeholder="请输入您的评价...." rows="1" cols="100"></textarea>
                            <button  class="btn btn-primary">发表</button>
                        </div>
                    </form>
                </div>
                @foreach($pingjia as $p)
                <div class="card bg-light text-dark" style="margin-top: 5px">


                        <p>评论者：{{$p->userid}}</p>
                        <p style="margin-left: 10px">{{$p->content}}</p>
                        <p style="text-align: right">{{date('Y-m-d H:i:s',$p->time )}}</p>


                </div>
                @endforeach
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