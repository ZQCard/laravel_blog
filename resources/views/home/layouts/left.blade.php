<aside class="l_box">
    <div class="about_me">
        <h2>关于我</h2>
        <ul>
            <i><img src="{{ $about['avatar'] }}"></i>
            <p><b>{{ $about['user'] }}</b>，{{ $about['content'] }}</p>
        </ul>
    </div>
    <div class="search">
        <form action="{{ route('search') }}" method="get" name="searchform" id="searchform">
            <input name="keyword" id="keyboard" class="input_text" value="请输入关键字词" style="color: rgb(153, 153, 153);" onfocus="if(value=='请输入关键字词'){this.style.color='#000';value=''}" onblur="if(value==''){this.style.color='#999';value='请输入关键字词'}" type="text">
            {{ csrf_field() }}
            <input class="input_submit" value="搜索" type="submit">
        </form>
    </div>
    <div class="cloud">
        <h2>标签云</h2>
        <ul>
            @foreach($tags as $tag)
                <a href="{{ route('tag', ['id' => $tag->id]) }}">{{ $tag->name }}({{ $tag->count }})</a>
            @endforeach
        </ul>
    </div>
    <div class="tuijian">
        <h2>文章推荐</h2>
        <ul>
            @foreach($article_recommend as $recommend)
                <li>
                    <a href="{{ route('article', ['article' => $recommend->id]) }}">{{ $recommend->title }}</a>
                </li>
            @endforeach
        </ul>
    </div>
    <div class="tuijian">
        <h2>友情链接</h2>
        <ul>
            @foreach($friend_link as $link)
                <li>
                    <a href="{{ $link->link }}">{{ $link->name }}</a>
                </li>
            @endforeach
        </ul>
    </div>

</aside>