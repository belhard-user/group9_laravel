@extends('layouts.app')

@section('content')
    {{ Form::open(['route' => 'article.store', 'class' => 'col-lg-5 col-lg-offset-3']) }}
    @include('article.form', ['btn' => 'create'])
    {{ Form::close() }}
@endsection