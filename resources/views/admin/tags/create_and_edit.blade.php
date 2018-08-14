@extends('admin.layouts.main')
@section('content')
    <div id="page-wrapper" class="gray-bg dashbard-1">

        <div class="row J_mainContent" id="content-main">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>{{ getRouteAction()['keyword'] }}标签</h5>
                    </div>
                    <div class="ibox-content">
                        <form class="form-horizontal m-t" method="post" action="{{ getRouteAction()['route'] }}" novalidate="novalidate">
                            {{ csrf_field() }}
                            @if(getRouteAction()['keyword'] == "编辑")
                                <input name="_method" type="hidden" value="PUT">
                                <input name="id" type="hidden" value="{{ $tag->id }}">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">标签名称：</label>
                                    <div class="col-sm-3">
                                        <input name="name" value="{{ $tag->name }}" minlength="2" type="text" class="form-control" required="" aria-required="true">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">使用次数：</label>
                                    <div class="col-sm-3">
                                        <input name="count" disabled value="{{ $tag->count }}" minlength="2" type="text" class="form-control" required="" aria-required="true">
                                    </div>
                                </div>
                            @else
                                <input name="_method" type="hidden" value="PUT">
                                <input name="id" type="hidden" value="">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">标签名称：</label>
                                    <div class="col-sm-3">
                                        <input name="name" value="" minlength="2" type="text" class="form-control" required="" aria-required="true">
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