@extends('layouts.app')

@section('content')
    {{ Form::model($article, [
                'route' => ['article.update', 'article' => $article->slug],
                'method' => 'put',
                'class' => 'col-lg-5 col-lg-offset-3',
                'files' => true
    ]) }}
        @include('article.form', ['btn' => 'update'])
    {{ Form::close() }}

    @if($article->images->count())
        @foreach($article->images as $image)
            <form action="{{ route('article.delete', ['image' => $image->id]) }}" method="post" style="display: inline-block">
                {{ method_field('delete') }}
                {{ csrf_field() }}
                <input type="hidden" name="image" value="{{ $image->id }}">
                <img width="50" src="/{{ $image->thpath }}" alt="">
                <button>x</button>
            </form>
        @endforeach
    @endif
@endsection