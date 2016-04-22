@extends('layout.mainlayout')

@section('content')
    <h1 class="text-center">Категории</h1>
    @if(Auth::User()->name == 'admin')
        <h4>
            <a href="/categories/create">Новая категория</a>
        </h4>
    @endif
    <table class="table table-bordered table-hover">
        <tr>
            <th class="text-center">ID</th>
            <th class="text-center">Наименование</th>
            <th class="text-center">Краткое название</th>
            @if(Auth::User()->name == 'admin')
                <th class="text-center">Редактирование</th>
            @endif
        </tr>
        @foreach($categories as $category)
            <tr>
                <td>{{$category->id}}</td>
                <td>{{$category->name}}</td>
                <td>{{$category->slug}}</td>
                @if(Auth::User()->name == 'admin')
                    <td>
                        <a href="/categories/{{$category->id}}/edit">Редактировать</a>
                        /
                        <a href="/categories/{{$category->id}}/destroy/">Удалить</a>
                    </td>
                @endif
            </tr>
        @endforeach
    </table>
@endsection
