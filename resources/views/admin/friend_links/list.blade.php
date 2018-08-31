@extends('admin.layouts.main')
@section('content')
    <div id="page-wrapper" class="gray-bg dashbard-1">
        @include('admin.layouts.header')
        <div class="row J_mainContent" id="content-main">
            <div class="col-sm-12">
                <!-- Example Toolbar -->
                <div class="example-wrap">
                    <h4 class="example-title">友情链接管理</h4>
                    <div class="example">

                        <div class="bootstrap-table">
                            <div class="fixed-table-toolbar"><div class="bars pull-left"><div class="btn-group hidden-xs" id="exampleToolbar" role="group">
                                        <a type="button"  href="{{ route('friend_link.create') }}" class="btn btn-outline btn-default"  title="添加友情链接">
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
                                                <div class="th-inner ">友情链接名称</div>
                                                <div class="fht-cell"></div>
                                            </th>

                                            <th style="" data-field="name" tabindex="0">
                                                <div class="th-inner ">链接地址</div>
                                                <div class="fht-cell"></div>
                                            </th>
                                            <th style="" data-field="name" tabindex="0">
                                                <div class="th-inner ">是否展示</div>
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
                                        @if(count($friendLinks))
                                            @foreach($friendLinks as $link)
                                            <tr class="no-records-found">
                                                <td>
                                                    {{ $link->id }}
                                                </td>
                                                <td>
                                                    {{ $link->name }}
                                                </td>
                                                <td>
                                                    {{ $link->link }}
                                                </td>
                                                <td>
                                                    <div class="switch">
                                                        <div class="onoffswitch">
                                                            <input type="checkbox" @if( $link->is_show == 1) checked="checked" @endif class="onoffswitch-checkbox statusChange" id="{{ $link->is_show }}-{{ $link->id }}">
                                                            <label class="onoffswitch-label" for="{{ $link->is_show }}-{{ $link->id }}">
                                                                <span class="onoffswitch-inner"></span>
                                                                <span class="onoffswitch-switch"></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    {{ $link->created_at }}
                                                </td>
                                                <td>
                                                    {{ $link->updated_at }}
                                                </td>
                                                <td>
                                                    <a href="{{ route('friend_link.edit', [$link->id]) }}" type="button" class="btn btn-outline btn-default"  title="修改">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <a href="#" data-url="{{ route('friend_link.destroy', [$link->id]) }}" data-name="{{ $link->name }}" type="button" class="btn btn-outline btn-default delete"  title="删除">
                                                        <i class="fa fa-trash-o fa-lg"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        @endif
                                        </tbody>
                                    </table>
                                    @if(count($friendLinks) == 0)
                                        @include('admin.layouts.noData')
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div style="float: right">
                            {!! $friendLinks->render() !!}
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
        $(".statusChange").change(function () {
            var that = $(this);
            var info = that.attr('id').split('-');
            var is_show = (info[0] == 1) ? 0 : 1;
            var id = info[1];
            $.ajax({
                type : "PATCH",
                url  : "{{route('friend_link.patch')}}",
                data : {id:id, is_show:is_show},
                success : function (res) {
                    if (res.status === false){
                        layer.msg(res.message,{time:1000});
                        return;
                    }
                    // 成功后更改当前状态
                    that.attr('id',is_show + '-' + id);
                    var label = that.next();
                    label.attr('for',is_show + '-' + id);
                    layer.msg(res.message,{time:1000});
                },
                error:function (res) {
                    console.log(res.message);
                }
            });
        });
    </script>
@endsection