@extends('home.layouts.main')
@section('title',$title)
@section('content')
    <main class="r_box">
        @if($title != '首页')
        <li>
            <h3>
                @yield('info', '')
            </h3>
        </li>
        @endif
        @foreach($articles as $article)
            <li>
                <i>
                    <a href="{{ route('article',['id' => $article->id]) }}"><img src="{{ $article->poster }}"></a>
                </i>
                <h3>
                    <a href="{{ route('article',['id' => $article->id]) }}">{{ $article->title }}</a>
                </h3>
                <p>
                    {{ $article->excerpt }}
                </p>
            </li>
        @endforeach
            {!! $articles->render() !!}
    </main>
@endsection