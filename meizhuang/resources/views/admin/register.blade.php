<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>注册</title>
    <link rel="stylesheet" href="{{asset('./hui/register/auth.css')}}">
</head>

<body>
<div class="lowin lowin-red">
    <div class="lowin-brand">
        <img src="{{asset('./uploads/kodinger.jpg')}}" alt="logo">
    </div>
    <div class="lowin-wrapper">

        <div class="lowin-box lowin-register">
            <div class="lowin-box-inner">
                <form method="post" action="{{url('admin/register/store')}}">
                    @csrf
                    <p>填写你的信息</p>
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
                    <div class="lowin-group">
                        <label>用户名</label>
                        <input type="text" name="name" class="lowin-input">
                    </div>
                    <div class="lowin-group">
                        <label>密码</label>
                        <input type="password"  name="password" class="lowin-input">
                    </div>
                    <div class="lowin-group">
                        <label>确认密码</label>
                        <input type="password" name="repass"  class="lowin-input">
                    </div>


                    <button class="lowin-btn">
                        注册
                    </button>

                    <div class="text-foot">
                        已经有账号? <a href="{{asset('admin/login')}}" class="login-link">登录</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <footer class="lowin-footer">
        Design By <a href="http://fb.me/itskodinger">@itskodinger</a>
    </footer>
</div>

<script>
    Auth.init({
        login_url: '#login',
        forgot_url: '#forgot'
    });
</script>
</body>
</html>