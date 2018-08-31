@extends('admin.layouts.main')
@section('content')
    <div id="page-wrapper" class="gray-bg dashbard-1">
        @include('admin.layouts.header')
        <div class="row J_mainContent" id="content-main">
            <div class="col-sm-12">
                <!-- Example Toolbar -->
                <div class="example-wrap">
                    <h4 class="example-title">标签管理</h4>
                    <div class="example">

                        <div class="bootstrap-table">
                            <div class="fixed-table-toolbar"><div class="bars pull-left"><div class="btn-group hidden-xs" id="exampleToolbar" role="group">
                                        <a type="button"  href="{{ route('tag.create') }}" class="btn btn-outline btn-default"  title="添加标签">
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
                                                <div class="th-inner ">标签名称</div>
                                                <div class="fht-cell"></div>
                                            </th>

                                            <th style="" data-field="name" tabindex="0">
                                                <div class="th-inner ">使用次数</div>
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
                                        @if(count($tags))
                                            @foreach($tags as $tag)
                                            <tr class="no-records-found">
                                                <td>
                                                    {{ $tag->id }}
                                                </td>
                                                <td>
                                                    {{ $tag->name }}
                                                </td>
                                                <td>
                                                    {{ $tag->count }}
                                                </td>
                                                <td>
                                                    {{ $tag->created_at }}
                                                </td>
                                                <td>
                                                    {{ $tag->updated_at }}
                                                </td>
                                                <td>
                                                    <a href="{{ route('tag.edit', [$tag->id]) }}" type="button" class="btn btn-outline btn-default"  title="修改">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <a href="#" data-url="{{ route('tag.destroy', [$tag->id]) }}" data-name="{{ $tag->name }}" type="button" class="btn btn-outline btn-default delete"  title="删除">
                                                        <i class="fa fa-trash-o fa-lg"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        @endif
                                        </tbody>
                                    </table>
                                    @if(count($tags) == 0)
                                        @include('admin.layouts.noData')
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div style="float: right">
                            {!! $tags->render() !!}
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <!-- End Example Toolbar -->
            </div>
        </div>
    </div>
@endsection