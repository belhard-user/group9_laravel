@extends('layouts.app')


@section('content')
    {{ Form::model($people, ['method' => 'put', 'action' => ['DBController@modify', 'people' => $people->id], 'class' => 'form-inline']) }}
        @include('db.form', ['btnName' => 'Обновить'])
    {{ Form::close() }}
@stop