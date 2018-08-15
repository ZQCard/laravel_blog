<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <title>card - 登录</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <link href="{{ asset('hAdmin/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('hAdmin/css/font-awesome.min.css?v=4.4.0') }}" rel="stylesheet">
    <link href="{{ asset('hAdmin/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('hAdmin/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('hAdmin/css/login.css') }}" rel="stylesheet">
    <link href="{{ asset('layer/theme/default/layer.css') }}" rel="stylesheet">
    <link href="{{ asset('hAdmin/css/login.css') }}" rel="stylesheet">
    <!--[if lt IE 9]>
    <meta http-equiv="refresh" content="0;ie.html" />
    <![endif]-->
    <script>
        if (window.top !== window.self) {
            window.top.location = window.location;
        }
    </script>

</head>

<body class="signin">
<div class="signinpanel">
    <div class="row">
        <div class="col-sm-12">
            <form method="post" action="{{ route('admin.login') }}">
                <p class="m-t-md" style="text-align: center">诗与远方</p>
                {{ csrf_field() }}
                <input type="text" class="form-control uname" name="username" placeholder="用户名" />
                <input type="password" class="form-control pword m-b" name="password" placeholder="密码" />
                <p id="login" class="btn btn-success btn-block"><strong>登陆</strong></p>

            </form>
        </div>
    </div>
    <div class="signup-footer">
        <div class="pull-left">
            &copy; card
        </div>
    </div>
</div>
<script src="{{ asset('hAdmin/js/jquery.min.js') }}"></script>
<script src="{{ asset('layer/layer.js') }}"></script>
</body>
    <script>
        $(function () {
            $("#login").click(function () {
                var form = $("form");
                $.ajax({
                    url : form.attr('action'),
                    type : 'post',
                    data : form.serialize(),
                    dataType : 'json',
                    success : success,
                    error : error
                });
            });
        });

        // 请求成功回调函数
        function success(res) {
            layer.msg("登录成功", function () {
                layer.load(1, {
                    shade: [0.1,'#fff'] //0.1透明度的白色背景
                });
                window.location.href = "{{ route('admin.index') }}";
            });
        }

        function error(res) {

            if (res.status !== 200){
                layer.msg(getFirstError(res));
            } else {
                layer.msg("登录成功", function () {
                    layer.load(1, {
                        shade: [0.1,'#fff'] //0.1透明度的白色背景
                    });
                    window.location.href = "{{ route('admin.index') }}";
                });
            }
        }

        function getFirstError(object){
            var arr = object.responseJSON.errors;
            for (var i in arr){
                return arr[i];
            }
        }
    </script>
</html>


