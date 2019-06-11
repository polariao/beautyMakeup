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
    <title>官网协议</title>
</head>

<body>
<div class="container-fluid bg-light">
    <div class="register-header">
        HUAZHUANGPIN&nbsp;&nbsp;<span style="font-size:20px">欢迎注册</span>
    </div>
</div>
<p style="text-align: center;font-weight: bolder;margin-top: 20px">本商城相关协议</p>
<div class="alert alert-success container">
    {!! $data->content !!}
</div>
<div style="text-align: center">
    <a href="{{url('/home/register')}}"><button href="122" style="width: 80px; background-color: green">我同意</button></a>
    <a href="{{url('/home/login')}}"><button style="width: 80px;margin-left: 30px; background-color: #8D8D8D">我不同意</button></a>
</div>


</body>

</html>