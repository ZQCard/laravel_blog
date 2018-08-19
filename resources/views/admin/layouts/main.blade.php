<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="renderer" content="webkit">

    <title>@yield('title', 'www.niu12.com')</title>

    <meta name="keywords" content="">
    <meta name="description" content="">

    <!--[if lt IE 9]>
    <meta http-equiv="refresh" content="0;ie.html" />
    <![endif]-->

    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <link href="{{ asset('hAdmin/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('hAdmin/css/font-awesome.min.css?v=4.4.0') }}" rel="stylesheet">
    <link href="{{ asset('hAdmin/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('hAdmin/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('layer/theme/default/layer.css') }}" rel="stylesheet">
    <link href="{{ asset('css/personal.css') }}" rel="stylesheet">
    @yield('css')
</head>

<body class="fixed-sidebar full-height-layout gray-bg" style="overflow:hidden">
<div id="wrapper">
    @include('admin.layouts.left')
    @yield('content')
</div>

<!-- 全局js -->
<script src="{{ asset('hAdmin/js/jquery.min.js') }}"></script>
<script src="{{ asset('layer/layer.js') }}"></script>
<script src="{{ asset('hAdmin/js/bootstrap.min.js?v=3.3.6') }}"></script>
<script src="{{ asset('hAdmin/js/plugins/metisMenu/jquery.metisMenu.js') }}"></script>
<script src="{{ asset('hAdmin/js/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>
<!-- 自定义js -->
<script src="{{ asset('hAdmin/js/hAdmin.js?v=4.1.0') }}"></script>
<script src="{{ asset('js/personal.js') }}"></script>

{{-- 全局JS使用 --}}
<script>

    $(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN':" {{ csrf_token() }}"
            }
        });

        // 新增页面按钮提交 post形式
        $("#formSubmitAdd").click(function () {
            var form = $("form");
            $.ajax({
                url : form.attr('action'),
                type : 'POST',
                data : form.serialize(),
                dataType : 'json',
                success : ajaxSuccess,
                error : ajaxError
            });
        });
        // 修改页面按钮提交 PUT形式
        $("#formSubmitEdit").click(function () {
            var form = $("form");
            $.ajax({
                url : form.attr('action'),
                type : 'PUT',
                data : form.serialize(),
                dataType : 'json',
                success : ajaxSuccess,
                error : ajaxError
            });
        });
    });

    // 删除按钮点击提交 DELETE形式
    $(".delete").click(function () {
        var that = $(this);
        layer.confirm("是否要删除  "+ that.data('name') + "?",{
            btn:['确定', '取消']
        }, function () {
            $.ajax({
                type : 'DELETE',
                url : that.data('url'),
                success : ajaxSuccess,
                error : ajaxError
            })
        });
    });


    // 请求成功回调函数
    function ajaxSuccess(res) {
        layer.msg(res.message);
        if (res.status){
            window.location.href = res.url;
        }
    }

    function ajaxError(res) {
        if (res.status !== 200){
            layer.msg(getFirstError(res.responseJSON));
        }
    }

    function getFirstError(data){
        var arr = data.errors;
        if (!arr)return '服务器错误，错误提示 :' + data.message;
        for (var i in arr){
            return arr[i][0];
        }
    }
</script>
@yield('js')
</body>

</html>
