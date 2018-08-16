@extends('admin.layouts.main')
@section('content')
    <div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="row border-bottom">
            <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                <ul class="nav navbar-top-links navbar-right">
                    <li class="dropdown">
                        <a class="dropdown-toggle count-info" data-toggle="dropdown" id="linkOrder" href="#">
                            <i class="fa fa-bell"></i> <span class="label label-primary"></span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="row J_mainContent" id="content-main">
            <div class="col-sm-12">
                <!-- Example Toolbar -->
                <div class="example-wrap">
                    <h4 class="example-title">文章管理</h4>
                    <div class="example">

                        <div class="bootstrap-table">
                            <div class="fixed-table-toolbar"><div class="bars pull-left"><div class="btn-group hidden-xs" id="exampleToolbar" role="group">
                                        <a type="button"  href="{{ route('article.create') }}" class="btn btn-outline btn-default"  title="添加文章">
                                            <i class="glyphicon glyphicon-plus" aria-hidden="true"></i>
                                        </a>
                                        <button class="btn btn-default btn-outline" type="button" onclick="window.location.reload();" title="刷新">
                                            <i class="glyphicon glyphicon-repeat"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="fixed-table-container" style="padding-bottom: 0px;">
                                <div class="fixed-table-header" style="display: none;">
                                    <table></table>
                                </div>
                                <div class="fixed-table-body">
                                    <table id="exampleTableToolbar" data-mobile-responsive="true" class="table table-hover">
                                        <thead>
                                        <tr>
                                            <th data-field="name" tabindex="0">
                                                <div class="th-inner ">序号</div>
                                                <div class="fht-cell"></div>
                                            </th>
                                            <th data-field="name" tabindex="0">
                                                <div class="th-inner ">文章标题</div>
                                                <div class="fht-cell"></div>
                                            </th>
                                            <th data-field="name" tabindex="0">
                                                <div class="th-inner ">所属分类</div>
                                                <div class="fht-cell"></div>
                                            </th>
                                            <th data-field="name" tabindex="0">
                                                <div class="th-inner ">封面图</div>
                                                <div class="fht-cell"></div>
                                            </th>
                                            <th data-field="name" tabindex="0">
                                                <div class="th-inner ">浏览数</div>
                                                <div class="fht-cell"></div>
                                            </th>
                                            <th data-field="name" tabindex="0">
                                                <div class="th-inner ">评论数量</div>
                                                <div class="fht-cell"></div>
                                            </th>
                                            <th style="" data-field="name" tabindex="0">
                                                <div class="th-inner ">创建时间</div>
                                                <div class="fht-cell"></div>
                                            </th>
                                            <th style="" data-field="name" tabindex="0">
                                                <div class="th-inner ">修改时间</div>
                                                <div class="fht-cell"></div>
                                            </th>

                                            <th style="" data-field="name" tabindex="0">
                                                <div class="th-inner">操作</div>
                                                <div class="fht-cell"></div>
                                            </th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        @if(count($articles))
                                            @foreach($articles as $article)
                                            <tr class="no-records-found">
                                                <td>
                                                    {{ $article->id }}
                                                </td>
                                                <td>
                                                    {{ $article->title }}
                                                </td>
                                                <td>
                                                    {{ $article->category->name }}
                                                </td>
                                                <td>
                                                    <img src="{{ $article->poster }}" class="show-image image-big" alt="{{ $article->title }}">
                                                </td>
                                                <td>
                                                    {{ $article->visit_count }}
                                                </td>
                                                <td>
                                                    {{ $article->comment_count }}
                                                </td>
                                                <td>
                                                    {{ $article->created_at }}
                                                </td>
                                                <td>
                                                    {{ $article->updated_at }}
                                                </td>
                                                <td>
                                                    <a href="{{ route('article.edit', [$article->id]) }}" type="button" class="btn btn-outline btn-default"  title="修改">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <a href="#" data-url="{{ route('article.destroy', [$article->id]) }}" data-name="{{ $article->name }}" type="button" class="btn btn-outline btn-default delete"  title="删除">
                                                        <i class="fa fa-trash-o fa-lg"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        @endif
                                        </tbody>
                                    </table>
                                    @if(count($articles) == 0)
                                        @include('admin.layouts.noData')
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div style="float: right">
                            {!! $articles->render() !!}
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <!-- End Example Toolbar -->
            </div>
        </div>
    </div>

@endsection
@section('js')
    <script>
        $(".image-big-image").click(function (event) {
            var that = $(this);
            if (that.css('position') === 'static') { // 已经缩放,需要缩小
                $(this).css({'position': 'absolute', 'top': '50%', 'transform': 'scale(10)'});
                event.stopPropagation();
            }
        });

        $(document).click(function () {
            $(".image-big-image").css({'position': '', 'top': '', 'transform': ''});
        });
    </script>
@endsection