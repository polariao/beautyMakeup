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
    <title>官网登陆</title>
</head>

<body>
    <div class="container-fluid bg-light">
        <div class="register-header">
            HUAZHUANGPIN&nbsp;&nbsp;<span style="font-size:20px">欢迎注册</span>
        </div>
    </div>
    <div class="container-fluid" id="register" style="height:500px;">
        @if(count($errors)>0)
            <div style="margin-bottom:20px;margin-top:30px;color: red;text-align: center">
                @if(is_object($errors))
                    @foreach($errors->all() as $error)
                        {{$error}}
                    @endforeach
                @else
                    <p>{{$errors}}</p>
                @endif
            </div>
        @endif
        @if(session('msg'))
            <p style="color:red ;text-align: center">{{session('msg')}}&nbsp; &nbsp; &nbsp; &nbsp; <a href="{{url('home/login')}}">去登录</a></p>
        @endif
            @if(session('ms'))
                <p style="color:red ;text-align: center">{{session('ms')}}</p>
            @endif
        <div class="register-panel" >
            <form action="{{url('home/register/store')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="acc">用户昵称</label>
                    <input type="text" name="name" class="form-control" placeholder="请输入你的昵称">
                    <label for="pas">密码</label>
                    <input type="password" name="password" class="form-control" placeholder="设置密码" id="pac" v-model="password">
                    <label for="pas">确认密码</label>
                    <input type="password" name="password1"  class="form-control" placeholder="确认密码" id="pac" v-model="newpassword">
                    <label for="pas">邮箱</label>
                    <input type="text" name="email" class="form-control" placeholder="请输入你的邮箱" id="pac" v-on:click="checkP()">
                    <label for="pas">QQ</label>
                    <input type="text" name="qq" class="form-control" placeholder="请输入你的QQ" id="pac" v-on:click="checkP()">
                    <label for="acc">联系电话</label>
                    <input type="text" name="tel" placeholder="请输入你的电话" class="form-control">


                </div>
                <button  class="btn btn-block" v-on:>注册</button>
            </form>
            <hr>
            <div class="register-login">
                已有账号？<a href="{{url('home/login')}}">立即登录</a>
            </div>
        </div>
    </div>




</body>
<script>
    new Vue({
        el: "#register",
        data: {
            show: false,
            password: "",
            newpassword: ""
        },
        methods: {
            changeShow: function() {
                this.show = !this.show;
            },
            checkP: function() {
                if (this.password != this.newpassword) {
                    alert('两次密码不一致')
                }
            }
        }
    })
</script>

</html>