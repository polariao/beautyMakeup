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
    <title>我的购物车</title>
</head>
<body>
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
    <!-- 购物车 -->
<form method="post" action="{{url('home/fukuan')}}">
    @csrf
    <div class="container" id="shopCar_table">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th width="60px">选择</th>
                    <th width="280px">商品名称</th>
                    <th width="80px">图片</th>
                    <th width="90px">数量(双击修改)</th>
                    <th width="60px">单价(元)</th>
                    <th width="100px">小计(元)</th>
                    <th width="60px">操作</th>
                </tr>
            </thead>
            <tbody>

            @foreach($data as $v)
                <tr>
                    <td> <input type="checkbox" name="item[]" value="{{$v->id}}" /><label></label></td>
                    <td>{{$v->spc}}</td>
                    <td><img width="75" height="50" src="/{{$v->sex}}"></td>
                    <td><span id="1" ondblclick="edit(this,{{$v->id}})">{{$v->number}}</span></td>
                    <td>{{$v->danjia}}</td>
                    <td>{{$v->danjia * $v->number}}</td>
                    <td>
                        <a style="color: white" href="{{url('home/shopCarDel/'.$v->id)}}" class="btn btn-danger btn-sm">移除</a>
                    </td>
                </tr>
                @endforeach
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <input type="submit" value="去收银台" class="btn btn-block btn-primary">
                    </td>
                </tr>
            </form>
            </tbody>
        </table>
    </div>

</body>
<script>
    function edit(element,id){

        var oldhtml = element.innerHTML;//获得元素之前的内容
        var newobj = document.createElement('input');//创建一个input元素
        newobj.type = 'text';//为newobj元素添加类型
        newobj.style = "width:50px";
        newobj.value=oldhtml;
        element.innerHTML = '';　　 //设置元素内容为空
        element.appendChild(newobj);//添加子元素
        newobj.focus();//获得焦点
        //设置newobj失去焦点的事件
        newobj.onblur = function(){
            //下面应该判断是否做了修改并使用ajax代码请求服务端将id与修改后的数据提交

            //当触发时判断newobj的值是否为空，为空则不修改，并返回oldhtml
            element.innerHTML = this.value ? this.value : oldhtml;
            if (oldhtml != this.value) {
                console.log(this.value)
                $.post("{{url('home/updateNumber/')}}/"+id+"/"+this.value,{'method':'POST','_token':"{{csrf_token()}}"},function (data) {
                    if ((data.status==0)) {
                        location.href=location.href;
                        layer.msg(data.msg,{icon:6});
                    }else {
                        layer.msg(data.msg,{icon:5});
                    } });
            }
        }
    }
    new Vue({
        el: "#shopCar",
        data: {
            number: 1,
            show: false
        },
        methods: {
            showCar: function() {
                this.show = !this.show;
            }
        }

    })

    new Vue({
        el: "#shopCar_table",
        data: {
            number: 1,
        },
        methods: {
            addNumber: function() {
                this.number++;
            },
            jianNumber: function() {
                this.number--;
            }
        }

    })
</script>

</html>