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
                    <i class="fa fa-tags"></i>
                    <span class="nav-label">标签管理</span>
                    <span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level">
                    <li>
                        <a class="J_menuItem" href="{{ route('tag.index') }}"><i class="fa fa-tag"></i>标签列表</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-bar-chart"></i>
                    <span class="nav-label">分类管理</span>
                    <span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level">
                    <li>
                        <a class="J_menuItem" href="{{ route('category.index') }}"><i class="fa fa-bar-chart"></i>分类列表</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-clipboard"></i>
                    <span class="nav-label">友情链接管理</span>
                    <span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level">
                    <li>
                        <a class="J_menuItem" href="{{ route('friend_link.index') }}"><i class="fa fa-clipboard"></i>友情链接列表</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-book"></i>
                    <span class="nav-label">文章管理</span>
                    <span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level">
                    <li>
                        <a class="J_menuItem" href="{{ route('article.index') }}"><i class="fa fa-book"></i>文章列表</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-book"></i>
                    <span class="nav-label">个性化</span>
                    <span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level">
                    <li>
                        <a class="J_menuItem" href="{{ route('person.about') }}"><i class="fa fa-id-card"></i>关于我</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
<!--左侧导航结束-->