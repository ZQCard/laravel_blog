@extends('admin.layouts.main')
@section('css')
    <link href="{{ asset('jqueryselect/css/component-chosen.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div id="page-wrapper" class="gray-bg dashbard-1">

        <div class="row J_mainContent" id="content-main">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>{{ getRouteAction()['keyword'] }}文章</h5>
                    </div>
                    <div class="ibox-content">
                        <form class="form-horizontal m-t" method="post" action="{{ getRouteAction()['route'] }}" novalidate="novalidate">
                            @if(getRouteAction()['keyword'] == "编辑")
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">ID：</label>
                                    <div class="col-sm-3">
                                        <input name="id" disabled="" value="{{ $category->id }}" type="text" class="form-control" required="" aria-required="true">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">文章名称：</label>
                                    <div class="col-sm-3">
                                        <input name="name" value="{{ $category->name }}" minlength="2" type="text" class="form-control" required="" aria-required="true">
                                    </div>
                                </div>
                            @else
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">标题：</label>
                                    <div class="col-sm-3">
                                        <input name="title" value="" minlength="2" type="text" class="form-control" required="" aria-required="true">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">封面图：</label>
                                    <div class="col-sm-3">
                                        <input name="poster" value="" minlength="2" type="text" class="form-control" required="" aria-required="true">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">分类：</label>
                                    <div class="col-sm-3">
                                        <select class="form-control" name="category_id" required>
                                            <option value="" hidden disabled selected>请选择分类</option>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">内容：</label>
                                    <div class="col-sm-3">
                                        <input name="content" value="" minlength="2" type="text" class="form-control" required="" aria-required="true">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">标签：</label>
                                    <div class="col-sm-3">
                                        <select id="multiple" class="form-control  form-control-chosen" name="tags[]" data-placeholder="请选择标签" required multiple>
                                            <option></option>
                                            @foreach($tags as $tag)
                                                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">未存标签：</label>
                                    <div class="col-sm-3">
                                        <input name="other_tags" value="" minlength="2" type="text" class="form-control" required="" data-placeholder="添加未存标签,以逗号分隔" aria-required="true">

                                    </div>
                                </div>
                            @endif

                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-3">
                                    <a class="btn btn-primary" id="{{ getRouteAction()['buttonId'] }}">提交</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('jqueryselect/js/chosen.jquery.js') }}"></script>
    <script type="text/javascript">
        $('.form-control-chosen').chosen({
            allow_single_deselect: true,
            width: '100%'
        });
    </script>
@endsection