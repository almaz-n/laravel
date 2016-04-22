@extends('layout.mainlayout')

@section('content')
        <form class="navbar-form navbar-left form" role="search" action="/books/search/" method="get">
            
                <div>
                    <select name="genre" id="" class="form-control">
                        <option value="0">Жанр</option>
                        @foreach($books as $value)
                            <option value="{{$value->genre}}">{{$value->genre}}</option>
                        @endforeach
                    </select>
                    <select name="publish" id="" class="form-control">
                        <option value="0">Издательство</option>
                        @foreach($books as $value)
                            <option value="{{$value->publish}}">{{$value->publish}}</option>
                        @endforeach
                    </select>
                    <select name="status" id="" class="form-control">
                        <option value="0">Статус</option>
                            <option value="В наличии">В наличии</option>
                            <option value="Отсутствует">Отсутствует</option>
                    </select>
                </div>
                <input type="submit" value="Поиск">
        </form>

        <h1>Книги</h1>
        @if(Auth::User()->name == 'admin')
            <h4>
                <a href="/books/create">Создать товар</a>
            </h4>
        @endif
    <table class="table table-bordered table-hover">
        <tr>
            <th class="text-center">Название</th>
            <th class="text-center">Автор</th>
            <th class="text-center">Издательство</th>
            <th class="text-center">Год выпуска</th>
            <th class="text-center">Жанр</th>
            <th class="text-center">Цена</th>
            <th class="text-center">Остаток</th>
            <th class="text-center">Статус</th>
            @if(Auth::User()->name == 'admin')
                <th class="text-center">Редактирование</th>
            @endif
            <th class="text-center">Заказ</th>
        </tr>
        @foreach($books as $value)
            <tr>
                <td>{{$value->title}}</td>
                <td>{{$value->author}}</td>
                <td>{{$value->publish}}</td>
                <td>{{$value->year}}</td>
                <td>{{$value->genre}}</td>
                <td>{{$value->price}}</td>
                <td>{{$value->count}}</td>
                <td>{{$value->status}}</td>
                @if(Auth::User()->name == 'admin')
                    <td>
                        <a href="/books/{{$value->id}}/edit">Редактировать</a>
                        <a href="/books/{{$value->id}}/image">Доп. картинка</a>
                        <a href="/books/{{$value->id}}/destroy/">Удалить</a>
                    </td>
                @endif
                <td><a href="/books/{{$value->id}}/cart/">Заказать</a></td>
            </tr>
        @endforeach
    </table>
@endsection
