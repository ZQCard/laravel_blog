<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>@yield('title', '首页') - {{ config("personal.app_name") }}</title>
    <meta name="keywords" content="@yield('keywords', config('personal.keywords'))" />
    <meta name="description" content="{{ config('personal.description') }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('home/css/base.css') }}" rel="stylesheet">
    <link href="{{ asset('home/css/index.css') }}" rel="stylesheet">
    <link href="{{ asset('home/css/m.css') }}" rel="stylesheet">
    <link href="{{ asset('home/css/info.css') }}" rel="stylesheet">
    <link href="{{ asset('css/personal.css') }}" rel="stylesheet">
    <script src="{{ asset('home/js/jquery.min.js') }}" type="text/javascript"></script>
    <script type="text/javascript" src="{{ asset('home/js/comm.js') }}"></script>
</head>
<body>
<header class="header-navigation" id="header">
    <nav>
        <div class="logo">
            <a href="{{ config("app.url") }}">{{ config("personal.app_name") }}</a>
        </div>
        <h2 id="mnavh">
            <span class="navicon"></span>
        </h2>
        <ul id="starlist">
            <li><a href="{{ config('app.url') }}">首页</a></li>
            @foreach($categories as $category)
                <li>
                    <a href="{{ route("category",['id' => $category->id]) }}">{{ $category->name }}</a>
                </li>
            @endforeach
            @guest
                <li><a href="{{ route('login') }}">登录</a></li>
                <li><a href="{{ route('register') }}">注册</a></li>
            @else
                {{-- 下拉 --}}
                <li class="user-name">
                    <a href="###">{{ Auth::user()->name }}</a>
                    <ul>
                        <li>
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>
                                退出登录
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>

            @endguest
        </ul>
    </nav>
</header>
<article>
    @include('home.layouts.left')
    @yield('content')
</article>
<footer>
    <p>Design by <a href="{{ config('app.url') }}" target="_blank">{{ config('personal.app_name') }}</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="/">{{ config('personal.beian') }}</a></p>
</footer>
<a href="#" class="cd-top">Top</a>
@yield('script')
</body>
</html>
