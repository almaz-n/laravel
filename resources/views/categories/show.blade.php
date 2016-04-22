@extends('layout.mainlayout')

@section('content')
    <h1>Категория #{{$category->id}}</h1>
    <ul>
        <li>{{$category->name}}</li>
        <li>{{$category->slug}}</li>
    </ul>
    <a href="{{URL::previous()}}">Назад</a>
    <a href="/categories/{{$category->id}}/edit/">Редактировать</a>
@endsection