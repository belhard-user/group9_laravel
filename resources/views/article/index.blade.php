@extends('layouts.app')

@section('content')
    <div class="container">
    @foreach($news as $article)
        <div>
            <h2>
                <a href="{{ route('article.show', ['article' => $article->slug]) }}">{{ $article->title }}</a>
            </h2>
            <section>{{ $article->short_description }}</section>
        </div>
    @endforeach
        {{ $news->render() }}
    </div>
@endsection

@section('title', 'Все новости')