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
</head>

<body class="fixed-sidebar full-height-layout gray-bg" style="overflow:hidden">
<div id="wrapper">
    <!--左侧导航开始-->
    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="nav-close"><i class="fa fa-times-circle"></i>
        </div>
        <div class="sidebar-collapse">
            <ul class="nav" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="clear">
                                    <span class="block m-t-xs" style="font-size:20px;">
                                        <i class="fa fa-area-chart"></i>
                                        <strong class="font-bold">hAdmin</strong>
                                    </span>
                                </span>
                        </a>
                    </div>
                    <div class="logo-element">hAdmin
                    </div>
                </li>
                <li class="hidden-folded padder m-t m-b-sm text-muted text-xs">
                    <span class="ng-scope">分类</span>
                </li>
                <li>
                    <a class="J_menuItem" href="{{ route('admin.index') }}">
                        <i class="fa fa-home"></i>
                        <span class="nav-label">主页</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa fa-bar-chart-o"></i>
                        <span class="nav-label">测试大分类</span>
                        <span class="fa arrow"></span>
                    </a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a class="J_menuItem" href="{{ route('admin.test') }}">测试小分类</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
    <!--左侧导航结束-->
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


</body>

</html>
