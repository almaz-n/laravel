@extends('layout.mainlayout')

@section('content')
    <h1 class="text-center">Страны</h1>
    @if(Auth::User()->name == 'admin')
        <h4>
            <a href="/countries/create">Добавить</a>
        </h4>
    @endif
    <table class="table table-bordered table-hover">
        <tr>
            <th class="text-center">ID</th>
            <th class="text-center">Наименование</th>
            @if(Auth::User()->name == 'admin')
                <th class="text-center">Редактирование</th>
             @endif
        </tr>
        @foreach($countries as $country)
            <tr>
                <td>{{$country->id}}</td>
                <td>{{$country->name}}</td>
                @if(Auth::User()->name == 'admin')
                    <td>
                        <a href="/countries/{{$country->id}}/edit">Редактировать</a>
                        /
                        <a href="/countries/{{$country->id}}/destroy/">Удалить</a>
                    </td>
                @endif
            </tr>
        @endforeach
    </table>
@endsection
