<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/4.1.0/css/bootstrap.min.css">
    <script src="https://cdn.staticfile.org/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.staticfile.org/popper.js/1.12.5/umd/popper.min.js"></script>
    <script src="https://cdn.staticfile.org/twitter-bootstrap/4.1.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="{{asset('./home/css/index.css')}}">
    <link rel="stylesheet" href="{{asset('./home/css/font/css/font-awesome.min.css')}}">
    <title>官网登陆</title>
</head>

<body>
    <div class="container-fluid">
        <div class="login-header">
            HUAZHUANGPIN
        </div>
    </div>
    <div class="container-fluid" style="height:600px;background: #eee;position: relative;">
        <div class="login-panel" v-if="show">
            <div class="login-panel-tit">
                登录官网
            </div>
            <div class="login-panel-form">
                @if(session('msg'))
                    <p style="color:red ;text-align: center">{{session('msg')}}</p>
                @endif
                <form action="{{url('home/login')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="acc">账号</label>
                        <input type="text" name="name" class="form-control" id="acc">
                        <label for="pas">密码</label>
                        <input type="password" name="password" class="form-control" id="pac">
                    </div>
                    <button  class="btn btn-block">登录</button>
                </form>

            </div>
            <hr>
            <div class="login-panel-register">
                还没有账号？<a href="{{url('home/xieyi')}}">免费注册</a>
            </div>
        </div>
    </div>
    <div class="container-fluid footer">

    </div>
</body>
<script>
</script>

</html>