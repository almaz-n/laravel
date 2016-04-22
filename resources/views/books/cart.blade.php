@extends('layout.mainlayout')

@section('content')
       <h1>Подтверждение заказа</h1>
       @if(isset($error))
            {{$error}}
       @endif
       
    <table class="table table-bordered table-hover">
        @if(isset($result))
            {{$result}}
        @else
        <tr>
            <th class="text-center">Название</th>
            <th class="text-center">Автор</th>
            <th class="text-center">Издательство</th>
            <th class="text-center">Год выпуска</th>
            <th class="text-center">Жанр</th>
            <th class="text-center">Цена</th>
            <th class="text-center">Остаток</th>
            <th class="text-center">Статус</th>
        </tr>
        <tr>
             <td>{{$books->title}}</td>
             <td>{{$books->author}}</td>
             <td>{{$books->publish}}</td>
             <td>{{$books->year}}</td>
             <td>{{$books->genre}}</td>
             <td>{{$books->price}}</td>
             <td>{{$books->count}}</td>
             <td>{{$books->status}}</td>
             <td><a href="/books/{{$books->id}}/order/">Заказать</a></td>
         </tr>
         @endif
    </table>
@endsection