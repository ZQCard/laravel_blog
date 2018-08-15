@extends('admin.layouts.main')
@section('title', '后台首页')
@section('content')
    <div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="row J_mainContent" id="content-main">
            <form action="{{ route("admin.logout")}}" method="post">
                {{ csrf_field() }}
                <input type="submit" value="提交">
            </form>
        </div>
    </div>
@endsection