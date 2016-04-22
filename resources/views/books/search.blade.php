@extends('layout.mainlayout')

@section('content')

        <h1>Результат поиска</h1>
       
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
           
            <th class="text-center">Заказ</th>
        </tr>
        @if(strlen($booksParametrs)>0)
            
            @foreach($booksParametrs as $value)
                <tr>
                    <td>{{$value->title}}</td>
                    <td>{{$value->author}}</td>
                    <td>{{$value->publish}}</td>
                    <td>{{$value->year}}</td>
                    <td>{{$value->genre}}</td>
                    <td>{{$value->price}}</td>
                    <td>{{$value->count}}</td>
                    <td>{{$value->status}}</td>
                    
                    <td><a href="/order/">Заказать</a></td>
                </tr>
            @endforeach
        @endif
        
    </table>
    <a href="{{URL::previous()}}">Назад</a>
@endsection
