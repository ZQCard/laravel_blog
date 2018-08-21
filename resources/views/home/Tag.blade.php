@extends('home.layouts.main')
@section('title',$title)
@section('content')
    <main class="r_box">
        {{ $title }} 标签下的文章:
        @foreach($article_tags as $article_tag)
            <li>
                <i>
                    <a href="{{ route('article',['id' => $article_tag->article->id]) }}"><img src="{{ $article_tag->article->poster }}"></a>
                </i>
                <h3><a href="{{ route('article',['id' => $article_tag->article->id]) }}">{{ $article_tag->article->title }}</a></h3>
                <p>
                    {{ $article_tag->article->excerpt }}
                </p>
            </li>
        @endforeach
        {!! $article_tags->render() !!}
    </main>
@endsection