<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>@yield('title', '首页') - {{ config("personal.app_name") }}</title>
    <meta name="keywords" content="个人博客,杨青个人博客,个人博客模板,杨青" />
    <meta name="description" content="杨青个人博客，是一个站在web前端设计之路的女程序员个人网站，提供个人博客模板免费资源下载的个人原创网站。" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('home/css/base.css') }}" rel="stylesheet">
    <link href="{{ asset('home/css/index.css') }}" rel="stylesheet">
    <link href="{{ asset('home/css/m.css') }}" rel="stylesheet">
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
        </ul>
    </nav>
</header>
<article>
    @include('home.layouts.left')
    @yield('content')
</article>
<footer>
    <p>Design by <a href="http://www.yangqq.com" target="_blank">杨青个人博客</a> <a href="/">蜀ICP备11002373号-1</a></p>
</footer>
<a href="#" class="cd-top">Top</a>
</body>
</html>
