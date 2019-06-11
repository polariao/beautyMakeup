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
    <title>留言板</title>
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
    <!-- 留言板 -->
    <div class="alert alert-success container">
        如果您有什么建议或疑惑，请向我们留言...
    </div>
    <div style="margin-bottom:20px;color: red;text-align: center">
        @if(session('msg'))
            <p style="color:red ;text-align: center">{{session('msg')}}</p>
        @endif
    </div>
    <div class="container" style="margin-top:30px;width: 1000px">
        <form action="{{url('home/leaveWord')}}" method="post">
            @csrf
            <div class="card">
                <div class="card-header">用户留言</div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="">留言主题</label>
                        <input name="title" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">留言内容</label>
                        <textarea name="content" class="form-control"></textarea>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="btn-group" style="float:right">
                        <button class="btn btn-primary">提交</button>&nbsp;&nbsp;&nbsp;&nbsp;
                        <button class="btn btn-danger">重写</button>
                    </div>
                </div>
            </div>
        </form>
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