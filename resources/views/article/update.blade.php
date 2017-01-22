@extends('layouts.app')

@section('content')
    {{ Form::model($article, ['route' => ['article.update', 'article' => $article->slug], 'method' => 'put', 'class' => 'col-lg-5 col-lg-offset-3']) }}
        @include('article.form', ['btn' => 'update'])
    {{ Form::close() }}
@endsection