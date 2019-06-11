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
    <title>美妆官网</title>
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

<div class="container">
    <div class="order-panel">
        <div class="card">
            <div class="card-header bg-dark">
                用户信息
            </div>
            <div class="body" style="margin-top:10px">
                <form action="{{url('home/user/update')}}" method="post">
                    @csrf
                    <div style="margin-bottom:20px;color: red;text-align: center">
                        @if(session('msg'))
                            <p style="color:red ;text-align: center">{{session('msg')}}</p>
                        @endif
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">昵称</span>
                        </div>
                        <input type="text" class="form-control"  id="usr"  readonly value="{{$user->name}}">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">联系方式</span>
                        </div>
                        <input type="text" class="form-control" value="{{$user->tel}}"  id="usr" name="tel">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">邮箱</span>
                        </div>
                        <input type="text" class="form-control"  value="{{$user->email}}" id="usr" name="email">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">QQ</span>
                        </div>
                        <input type="text" class="form-control" value="{{$user->qq}}"  id="usr" name="qq">
                    </div>
                    <p style="margin-left:10px;margin-bottom:10px">重置密码：</p>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">原密码</span>
                        </div>
                        <input type="password" class="form-control"   id="usr" name="opassword">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">新密码</span>
                        </div>
                        <input type="password" class="form-control"   id="usr" name="npassword">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">确认密码</span>
                        </div>
                        <input type="password" class="form-control"   id="usr" name="rpassword">
                    </div>
                    <p style="margin-left:10px;margin-bottom:10px">完善信息：</p>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">真实姓名</span>
                        </div>
                        <input type="text" class="form-control" value="{{$user->true_name}}"  id="usr" name="true_name">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">身份证号</span>
                        </div>
                        <input type="text" class="form-control" value="{{$user->sfzh}}"  id="usr" name="sfzh">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">邮编</span>
                        </div>
                        <input type="text" class="form-control"  id="usr" value="{{$user->youbian}}" name="youbian">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">收货人</span>
                        </div>
                        <input type="text" class="form-control"  id="usr" value="{{$user->shouhuoren}}" name="shouhuoren">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">收货地址</span>
                        </div>
                        <input type="text" class="form-control"  id="usr" value="{{$user->dizhi}}" name="dizhi">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">密码找回问题</span>
                        </div>
                        <select class="form-control" name="tishi" id="selectAge">
                            <option value="1、你的姓名">1、你的姓名</option>
                            <option value="2、你的生日">2、你的生日</option>
                            <option value="3、你毕业于那个初中">3、你毕业于那个初中</option>
                            <option value="4、你喜欢看的电影">4、你喜欢看的电影</option>
                            <option value="5、您父亲的姓名是？">5、您父亲的姓名是？</option>
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">我的答案</span>
                        </div>
                        <input type="text" class="form-control" value="{{$user->huida}}"  id="usr" name="huida">
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-default"  style="margin-left: 250px">提交</button>
                    </div>
                </form>
            </div>

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