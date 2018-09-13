@extends('admin.layouts.main')
@section('content')
    <div id="page-wrapper" class="gray-bg dashbard-1">
        @include('admin.layouts.header')
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
                                        <a type="button"  href="{{ route('article.index', ['field' => 'id']) }}" class="btn btn-outline btn-default"  title="按id排序">
                                            按id排序
                                            <i class="glyphicon glyphicon-search" aria-hidden="true"></i>
                                        </a>

                                        <a type="button"  href="{{ route('article.index', ['field' => 'visit_count']) }}" class="btn btn-outline btn-default"  title="按浏览量排序">
                                            按浏览数排序
                                            <i class="glyphicon glyphicon-search" aria-hidden="true"></i>
                                        </a>

                                        <a type="button"  href="{{ route('article.index', ['field' => 'comment_count']) }}" class="btn btn-outline btn-default"  title="按评论量排序">
                                            按评论数排序
                                            <i class="glyphicon glyphicon-search" aria-hidden="true"></i>
                                        </a>

                                        <a type="button"  href="{{ route('article.index', ['field' => 'score']) }}" class="btn btn-outline btn-default"  title="按评分量排序">
                                            按评分排序
                                            <i class="glyphicon glyphicon-search" aria-hidden="true"></i>
                                        </a>
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
                                                <div class="th-inner ">
                                                    <i class="field-order">
                                                        @if(request('field') == 'id')
                                                            @if(request('order') == 'asc')
                                                                <img class="order" src="{{ asset('img/up.png') }}" alt="">
                                                            @elseif(request('order') != 'asc')
                                                                <img class="order" src="{{ asset('img/down.png') }}" alt="">
                                                            @endif
                                                        @endif
                                                        @if((request('field')) == null)
                                                            <img class="order" src="{{ asset('img/down.png') }}" alt="">
                                                        @endif
                                                    </i>
                                                    序号
                                                </div>
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
                                                <div class="th-inner ">
                                                    <i class="field-order">
                                                        @if(request('field') == 'visit_count')
                                                            @if(request('order') == 'asc')
                                                                <img class="order" src="{{ asset('img/up.png') }}" alt="">
                                                            @elseif(request('order') != 'asc')
                                                                <img class="order" src="{{ asset('img/down.png') }}" alt="">
                                                            @endif
                                                        @endif
                                                    </i>
                                                    浏览数
                                                </div>
                                                <div class="fht-cell"></div>
                                            </th>
                                            <th data-field="name" tabindex="0">
                                                <div class="th-inner ">
                                                    <i class="field-order">
                                                        @if(request('field') == 'comment_count')
                                                            @if(request('order') == 'asc')
                                                                <img class="order" src="{{ asset('img/up.png') }}" alt="">
                                                            @elseif(request('order') != 'asc')
                                                                <img class="order" src="{{ asset('img/down.png') }}" alt="">
                                                            @endif
                                                        @endif
                                                    </i>
                                                    评论数量
                                                </div>
                                                <div class="fht-cell"></div>
                                            </th>
                                            <th data-field="name" tabindex="0">
                                                <div class="th-inner ">
                                                    <i class="field-order">
                                                        @if(request('field') == 'score')
                                                            @if(request('order') == 'asc')
                                                                <img class="order" src="{{ asset('img/up.png') }}" alt="">
                                                            @elseif(request('order') != 'asc')
                                                                <img class="order" src="{{ asset('img/down.png') }}" alt="">
                                                            @endif
                                                        @endif
                                                    </i>
                                                    评分
                                                </div>
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
                                                    {{ $article->score }}
                                                </td>
                                                <td>
                                                    {{ $article->created_at }}
                                                </td>
                                                <td>
                                                    {{ $article->updated_at }}
                                                </td>
                                                <td>
                                                    <a href="{{ route('article', [$article->id]) }}" type="button" class="btn btn-outline btn-default"  title="查看">
                                                        <i class="glyphicon glyphicon-eye-open"></i>
                                                    </a>
                                                    <a href="{{ route('article.edit', [$article->id]) }}" type="button" class="btn btn-outline btn-default"  title="修改">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    @if(is_null($article->deleted_at))
                                                        <a href="#" data-url="{{ route('article.destroy', ['id' => $article->id]) }}" data-name="{{ $article->name }}" type="button" class="btn btn-outline btn-default delete"  title="删除">
                                                            <i class="fa fa-trash-o fa-lg"></i>
                                                        </a>
                                                        @else
                                                        <a href="#" data-url="{{ route('article.restore', ['id' => $article->id]) }}" data-name="{{ $article->name }}" type="button" class="btn btn-outline btn-default restore"  title="恢复">
                                                            <i class="glyphicon glyphicon-ok"></i>
                                                        </a>
                                                    @endif
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
        // 根据字段进行排序
        $(".field-order").click(function () {
            var params = GetRequest();
            if (params['order'] === 'asc'){
                params['order'] = 'desc';
            }else {
                params['order'] = 'asc';
            }
            if (!params['field']){
                params['field'] = 'id';
            }

            if (!params['order']){
                params['order'] = 'desc';
            }

            if (!params['page']){
                params['page'] = 1;
            }
            var url = "{{ route('article.index') }}";
            url += '?';
            for (var i in params){
                url += i + '=' + params[i]+ '&' ;
            }
            window.location.href = url;
        });
         /* 图片放大缩小 */
        $(".image-big").click(function (event) {
            var that = $(this);
            if (that.css('position') === 'static') { // 已经缩放,需要缩小
                $(this).css({'position': 'absolute', 'top': '50%', 'transform': 'scale(10)'});
                event.stopPropagation();
            }
        });

        $(document).click(function () {
            $(".image-big").css({'position': '', 'top': '', 'transform': ''});
        });
        /*  恢复已经删除的文章 */
        $(".restore").click(function () {
            var that = $(this);
            $.ajax({
                type : 'POST',
                url : that.data('url'),
                success : ajaxSuccess,
                error : ajaxError
            })
        });
    </script>
@endsection