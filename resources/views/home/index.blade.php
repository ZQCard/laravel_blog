@extends('home.layouts.main')
@section('content')
    <main class="r_box">
        @foreach($articles as $article)
            <li>
                <i>
                    <a href="/"><img src="{{ $article->poster }}"></a>
                </i>
                <h3><a href="/">{{ $article->title }}</a></h3>
                <p>
                    {{ $article->excerpt }}
                </p>
            </li>
        @endforeach
            {!! $articles->render() !!}
    </main>
@endsection