@extends('layouts.app')


@section('content')
    {{ Form::open(['action' => 'DBController@store', 'class' => 'form-inline']) }}
        @include('db.form', ['btnName' => 'Создать'])
    {{ Form::close() }}

    @foreach($test as $people)
        <li>
            <a href="{{ route('db.change', ['people' => $people->id]) }}">{{ $people->full_name }}</a>
        </li>
    @endforeach
@stop