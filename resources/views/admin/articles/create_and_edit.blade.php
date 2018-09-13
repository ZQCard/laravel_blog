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
                        <h5>{{ getRouteAction()['keyword'] }}文章</h5>
                    </div>
                    <div class="ibox-content">
                        <form class="form-horizontal m-t" method="post" action="{{ getRouteAction()['route'] }}" novalidate="novalidate">
                            @if(getRouteAction()['keyword'] == "编辑")
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">ID：</label>
                                    <div class="col-sm-3">
                                        <input name="id" value="{{ $article->id }}" type="text" class="form-control" required="" aria-required="true">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">标题：</label>
                                    <div class="col-sm-3">
                                        <input name="title" value="{{ $article->title }}" minlength="2" type="text" class="form-control" required="" aria-required="true">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">作者：</label>
                                    <div class="col-sm-3">
                                        <input name="author" value="{{ $article->author }}" minlength="2" type="text" class="form-control" required="" aria-required="true">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">封面图：</label>
                                    <div class="col-sm-3">
                                        <img src="{{ $article->poster }}" alt="" class="form-input-img">
                                        <input type="file" id="file" style="display: none" class="files" />
                                        <input type="hidden" name="poster" value="{{ $article->poster }}" id="nowPic">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">分类：</label>
                                    <div class="col-sm-3">
                                        <select class="form-control select-input" name="category_id" required>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}" @if($category->id == $article->category_id)selected @endif>{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="col-sm-3 control-label">内容：</label>
                                    <div class="col-sm-9">
                                        <textarea name="content" class="form-control hide" id="editor" rows="3" placeholder="请填入至少三个字符的内容。" required>
                                            {{ $article->content }}
                                        </textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">标签：</label>
                                    <div class="col-sm-3">
                                        <select id="multiple" class="form-control  form-control-chosen" name="tag_ids[]" data-placeholder="请选择标签(可选)" required multiple>
                                            <option></option>
                                            @foreach($tags as $tag)
                                                <option value="{{ $tag->id }}" @if(in_array($tag->id, $tag_has_ids)) selected @endif>{{ $tag->name }}</option>
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
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">特有标签：</label>
                                    <div class="col-sm-3">
                                        <input name="tips" value="{{ $article->tips }}" minlength="2" type="text" class="form-control" required="" data-placeholder="添加特有标签,以逗号分隔" aria-required="true">

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
                                    <label class="col-sm-3 control-label">作者：</label>
                                    <div class="col-sm-3">
                                        <input name="author" value="" minlength="2" type="text" class="form-control" required="" aria-required="true">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">封面图：</label>
                                    <div class="col-sm-3">
                                        <img src="{{ asset('img/upload.jpg') }}" alt="" class="form-input-img">
                                        <input type="file" id="file" style="display: none" class="files" />
                                        <input type="hidden" name="poster" id="nowPic" value="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">分类：</label>
                                    <div class="col-sm-3">
                                        <select class="form-control select-input" name="category_id" required>
                                            <option value="" hidden disabled selected>请选择分类</option>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">内容：</label>
                                    <div class="col-sm-9">
                                        <textarea name="content" class="form-control hide" id="editor" rows="3" placeholder="请填入至少三个字符的内容。" required></textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">标签：</label>
                                    <div class="col-sm-3">
                                        <select id="multiple" class="form-control  form-control-chosen" name="tag_ids[]" data-placeholder="请选择标签(可选)" required multiple>
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
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">特有标签：</label>
                                    <div class="col-sm-3">
                                        <input name="tips" value="" minlength="2" type="text" class="form-control" required="" data-placeholder="添加特有标签,以逗号分隔" aria-required="true">

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
    {{-- 选择框 --}}
    <script src="{{ asset('jqueryselect/js/chosen.jquery.js') }}"></script>
    {{-- simditor --}}
    <script type="text/javascript"  src="{{ asset('editor/js/module.min.js') }}"></script>
    <script type="text/javascript"  src="{{ asset('editor/js/hotkeys.min.js') }}"></script>
    <script type="text/javascript"  src="{{ asset('editor/js/uploader.min.js') }}"></script>
    <script type="text/javascript"  src="{{ asset('editor/js/simditor.min.js') }}"></script>
    <script type="text/javascript">
        // 标签筛选
        $('.form-control-chosen').chosen({
            allow_single_deselect: true,
            width: '100%'
        });

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

        // simditor编辑器展示
        $(document).ready(function () {
            var editor = new Simditor({
                textarea: $("#editor"),
                upload: {
                    url: '{{ route('upload') }}',
                    params: { _token: '{{ csrf_token() }}', type : 'image' , editor: true},
                    fileKey: 'file',
                    connectionCount: 3,
                    leaveConfirm: '文件上传中，关闭此页面将取消上传。'
                },
                pasteImage: true,
                success:function (data) {
                    alert(data);
                },
                error:function (data) {
                    alert(data)
                }
            });
        });
    </script>
@endsection