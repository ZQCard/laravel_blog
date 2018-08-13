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
            <form method="post" action="index.html">
                <p class="m-t-md" style="text-align: center">诗与远方</p>
                <input type="text" class="form-control uname" placeholder="用户名" />
                <input type="password" class="form-control pword m-b" placeholder="密码" />
                <button class="btn btn-success btn-block">登录</button>
            </form>
        </div>
    </div>
    <div class="signup-footer">
        <div class="pull-left">
            &copy; card
        </div>
    </div>
</div>
</body>

</html>
