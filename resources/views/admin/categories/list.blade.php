@extends('admin.layouts.main')
@section('content')
    <div id="page-wrapper" class="gray-bg dashbard-1">
        @include('admin.layouts.header')
        <div class="row J_mainContent" id="content-main">
            <div class="col-sm-12">
                <!-- Example Toolbar -->
                <div class="example-wrap">
                    <h4 class="example-title">分类管理</h4>
                    <div class="example">

                        <div class="bootstrap-table">
                            <div class="fixed-table-toolbar"><div class="bars pull-left"><div class="btn-group hidden-xs" id="exampleToolbar" role="group">
                                        <a type="button"  href="{{ route('category.create') }}" class="btn btn-outline btn-default"  title="添加分类">
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
                                                <div class="th-inner ">分类名称</div>
                                                <div class="fht-cell"></div>
                                            </th>
                                            <th data-field="name" tabindex="0">
                                                <div class="th-inner ">排序值</div>
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
                                        @if(count($categories))
                                            @foreach($categories as $category)
                                            <tr class="no-records-found">
                                                <td>
                                                    {{ $category->id }}
                                                </td>
                                                <td>
                                                    {{ $category->name }}
                                                </td>
                                                <td>
                                                    {{ $category->sort }}
                                                </td>
                                                <td>
                                                    {{ $category->created_at }}
                                                </td>
                                                <td>
                                                    {{ $category->updated_at }}
                                                </td>
                                                <td>
                                                    <a href="{{ route('category.edit', [$category->id]) }}" type="button" class="btn btn-outline btn-default"  title="修改">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <a href="#" data-url="{{ route('category.destroy', [$category->id]) }}" data-name="{{ $category->name }}" type="button" class="btn btn-outline btn-default delete"  title="删除">
                                                        <i class="fa fa-trash-o fa-lg"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        @endif
                                        </tbody>
                                    </table>
                                    @if(count($categories) == 0)
                                        @include('admin.layouts.noData')
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div style="float: right">
                            {!! $categories->render() !!}
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <!-- End Example Toolbar -->
            </div>
        </div>
    </div>
@endsection