@extends('admin.layouts.main')
@section('content')
    <div id="page-wrapper" class="gray-bg dashbard-1">

        <div class="row J_mainContent" id="content-main">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>{{ getRouteAction()['keyword'] }}友情链接</h5>
                    </div>
                    <div class="ibox-content">
                        <form class="form-horizontal m-t" method="post" action="{{ getRouteAction()['route'] }}" novalidate="novalidate">
                            @if(getRouteAction()['keyword'] == "编辑")
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">ID：</label>
                                    <div class="col-sm-3">
                                        <input name="id" disabled="" value="{{ $friendLink->id }}" type="text" class="form-control" required="" aria-required="true">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">友情链接名称：</label>
                                    <div class="col-sm-3">
                                        <input name="name" value="{{ $friendLink->name }}" minlength="2" type="text" class="form-control" required="" aria-required="true">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">链接地址：</label>
                                    <div class="col-sm-3">
                                        <input name="link" value="{{ $friendLink->link }}" minlength="2" type="text" class="form-control" required="" aria-required="true">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">是否展示：</label>
                                    <div class="col-sm-3">
                                        <div class="switch">
                                            <div class="onoffswitch">
                                                <input type="checkbox" @if( $friendLink->is_show == 1) checked="checked" @endif class="onoffswitch-checkbox statusChange" name="is_show" value="{{ $friendLink->is_show }}" id="{{ $friendLink->is_show }}-{{ $friendLink->id }}">
                                                <label class="onoffswitch-label" for="{{ $friendLink->is_show }}-{{ $friendLink->id }}">
                                                    <span class="onoffswitch-inner"></span>
                                                    <span class="onoffswitch-switch"></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">名称：</label>
                                    <div class="col-sm-3">
                                        <input name="name" value="" minlength="2" type="text" class="form-control" required="" aria-required="true">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">链接地址：</label>
                                    <div class="col-sm-3">
                                        <input name="link" value="" minlength="2" type="text" class="form-control" required="" aria-required="true">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">是否展示：</label>
                                    <div class="col-sm-3">
                                        <input name="is_show" value="" minlength="2" type="text" class="form-control" required="" aria-required="true">
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
    <script>
        $(".statusChange").click(function () {
            var is_show = $(this).val();
            if ($(this).val() == 1){
                $(this).attr('value', 0);
            }else {
                $(this).attr('value', 1);
            }
            console.log($(this).val());
        })
    </script>
@endsection