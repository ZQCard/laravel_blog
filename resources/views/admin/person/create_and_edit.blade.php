@extends('admin.layouts.main')
@section('css')
    <link href="{{ asset('jqueryselect/css/component-chosen.css') }}" rel="stylesheet">
    <link href="{{ asset('editor/css/simditor.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div id="page-wrapper" class="gray-bg dashbard-1">

        <div class="row J_mainContent" id="content-main">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>关于我</h5>
                    </div>
                    <div class="ibox-content">
                        <form class="form-horizontal m-t" action="{{ route('person.about') }}" method="post" novalidate="novalidate">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">作者：</label>
                                    <div class="col-sm-3">
                                        <input name="user" value="{{ $about['user'] }}" minlength="2" type="text" class="form-control" required="" aria-required="true">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">封面图：</label>
                                    <div class="col-sm-3">
                                        <img src="{{ $about['avatar'] }}" alt="" class="form-input-img">
                                        <input type="file" id="file" style="display: none" class="files" />
                                        <input type="hidden" name="avatar" id="nowPic" value="{{ $about['avatar'] }}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">内容：</label>
                                    <div class="col-sm-3">
                                        <input name="content" value="{{ $about['content'] }}" minlength="2" type="text" class="form-control" required="" aria-required="true">
                                    </div>
                                </div>
                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-3">
                                    <a class="btn btn-primary" id="formSubmitAdd">提交</a>
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
    <script type="text/javascript">

        // 调用上传文件事件
        $(".form-input-img").click(function () {
            $("#file").click();
        });

        // ajax上传文件
        $(document).ready(function() {
            var csrf_token = "{{ csrf_token() }}";
            $("#file").change(function () {
                // 图片上传地址
                var url = "{{ route("upload") }}";
                var upload = function (f, csrf_token) {
                    var xhr = new XMLHttpRequest();
                    xhr.open('POST', url, true);
                    var formData = new FormData();
                    formData.append('file', f);
                    formData.append('_token', csrf_token);
                    formData.append('type', 'image');
                    xhr.onreadystatechange = function (response) {
                        if ((xhr.readyState == 4) && (xhr.status == 200) && (xhr.responseText != '')){
                            layer.msg("上传成功");
                            var data = JSON.parse(xhr.responseText).data;
                            $(".form-input-img").attr('src', data['url']);
                            $("#nowPic").val(data['url']);
                        }else if((xhr.status != 200) && xhr.responseText){
                            layer.msg("上传失败");
                        }
                    };
                    xhr.send(formData);
                };
                if ($("#file")[0].files.length > 0) {
                    upload($("#file")[0].files[0], csrf_token);
                } else {
                    console && console.log("form input error");
                }
            });
        });
    </script>
@endsection