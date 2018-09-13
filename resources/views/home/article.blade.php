@extends('home.layouts.main')
@section('title', $title)
@section('keywords', $article->keywords)
@section('content')
    <main>
        <div class="infosbox">
            <div class="newsview">
                <h3 class="news_title">{{ $article->title }}</h3>
                <div class="bloginfo">
                    <ul>
                        <li class="author">作者：<a href="/">{{ $article->author }}</a></li>
                        <li class="timer">时间：{{ $article->created_at->toDateString() }}</li>
                        <li class="view">阅读量：{{ $article->visit_count }}</li>
                    </ul>
                </div>
                <div class="tags">
                    @foreach($article->tag as $tag)
                        <a href="{{ route('tag', ['id' => $tag->tag_id]) }}">{{ $tag->name }}</a> &nbsp;
                    @endforeach
                    @foreach(explode(',', $article->tips) as $tip)
                        @if(empty($tip))
                            @continue
                        @endif
                        <a href="#">{{ $tip }}</a> &nbsp;
                    @endforeach
                </div>
                <div class="news_con">
                     {!! $article->content !!}
                </div>
            </div>
            <div class="share">
                <p class="diggit">
                    <span id="praise">
                        很赞哦！
                    </span>
                    (<b id="praise_count">{{ $article->praise_count }}</b>)
                </p>
            </div>
            <div class="nextinfo">

                <p>上一篇：
                    @if(is_null($article_near['previous']))
                        <a href="/">没有了</a>
                    @else
                        <a href="{{ route('article', ['id' => $article_near['previous']->id]) }}">{{ $article_near['previous']->title }}</a>
                    @endif
                </p>
                <p>下一篇：
                    @if(is_null($article_near['next']))
                        <a href="/">没有了</a>
                    @else
                        <a href="{{ route('article', ['id' => $article_near['next']->id]) }}">{{ $article_near['next']->title }}</a>
                    @endif
                </p>
            </div>
            <div class="news_pl">
                <h2>文章评论</h2>
                <div class="gbko">
                    <div class="fb">
                        {{-- 一级评论 --}}
                        @foreach($article->articleComment as $comment)
                        <ul>
                            {{--{{ $article->user->avatar }}--}}
                            <img class="fb-user-img" src="{{ $comment->user->avatar }}">
                            <p class="fbtime"><span>{{ $comment->created_at }}</span>{{ $comment->user->name }}</p>
                            <p class="fbinfo">{{ $comment->content }}</p>
                            <a href="#plpost" class="replay" data-id="{{ $comment->id }}" data-user="{{ $comment->user->name }}">回复</a>
                            {{-- 父级评论 --}}
                            @if(!is_null($comment->parent))
                                <ul>
                                    <li>
                                        {{--{{ $comment->parent->user->avatar }}--}}
                                        <img class="fb-user-img" src="{{ $comment->parent->user->avatar }}">
                                        <p class="fbtime"><span>{{ $comment->parent->created_at }}</span></p>
                                        <p class="fbinfo"></p>
                                        <div class="ecomment"><span class="ecommentauthor">{{ $comment->parent->user->name }}</span>
                                            <p class="ecommenttext">{{ $comment->parent->content }}</p>
                                            <a href="#plpost" class="replay" data-id="{{ $comment->parent->id }}" data-user="{{ $comment->parent->user->name }}" >回复</a>
                                        </div>
                                    </li>
                                </ul>
                            @endif
                        </ul>
                        @endforeach
                    </div>
                    <form id="commentForm" action="{{ route('article.comment', ['id'=> $article->id]) }}">
                        <div id="plpost">
                            <p class="saying"><span><a href="">共有{{ $article->comment_count }}条评论</a></span>来说两句吧...</p>
                            <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                            <input type="hidden" name="parent_id" value="0" id="parent_id">
                            <input type="hidden" name="article_id" value="{{ $article->id }}">
                            <textarea name="content" rows="6" id="content"></textarea>
                            <span id="commentSubmit">提交</span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('script')
    <script src="{{ asset('layer/layer.js') }}"></script>
    <script>
        $(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN':" {{ csrf_token() }}"
                }
            });

            // 新增页面按钮提交 post形式
            $("#praise").click(function () {
                var url = "{{ route('article.praise', ['id'=> $article->id]) }}";
                var user_id = "{{ Auth::id() }}";
                var data = {user_id: user_id};
                $.ajax({
                    url : url,
                    type : 'POST',
                    data : data,
                    dataType : 'json',
                    success : function (res) {
                        if (res.status === false){
                            layer.alert(res.message, {icon:2})
                        } else {
                            var count = parseInt($("#praise_count").text() + 1);
                            $("#praise_count").text(count)
                            layer.msg(res.message)
                        }
                    }
                });
            });


            $(".replay").click(function () {
                $("#parent_id").val($(this).data('id'));
                $("#content").attr('placeholder', " @ " + $(this).data('user'))
            });

            $("#commentSubmit").click(function () {
                var user_id = "{{ Auth::id() }}";
                if (user_id === ""){
                    layer.msg("评论需要登陆噢");
                    return false;
                }
                var form = $("#commentForm");
                $.ajax({
                    url : form.attr('action'),
                    type : 'POST',
                    data : form.serialize(),
                    dataType : 'json',
                    success : function (res) {
                        if (res.status === false){
                            layer.alert(res.message, {icon:2});
                        } else {
                            layer.msg(res.message);
                            window.location.reload();
                        }
                    }
                });
            });

        });
    </script>
@endsection