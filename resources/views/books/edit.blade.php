@extends('layout.mainlayout')

@section('content')
    <h1>Редактирование товара</h1>
    <div class="row">
        <div class="col-md-4">
            @if(session()->has('message'))
                {{session()->get('message')}}
            @endif
            <form action="/books/{{$books->id}}" method="post">
                {{csrf_field()}}
                <input name="_method" type="hidden" value="PATCH">
               <div>
                    <label for="name">Название</label>
                    <input type="text" name="name" class="form-control" value="{{$books->title}}">
                </div>
                <div>
                    <label for="author">Автор</label>
                    <input type="text" name="author" class="form-control" value="{{$books->author}}">
                </div>
                <div>
                    <label for="publish">Издательство</label>
                    <input type="text" name="publish" class="form-control" value="{{$books->title}}">
                </div>
                <div>
                    <label for="year">Год издания</label>
                    <input type="text" name="year" class="form-control" value="{{$books->year}}">
                </div>
                <div>
                    <label for="genre">Жанр</label>
                     <input type="text" name="genre" class="form-control" value="{{$books->genre}}">
                    
                </div>
                <div>
                    <label for="capacity">Цена</label>
                    <input type="text" name="price" class="form-control" value="{{$books->price}}">
                </div>
                <div>
                    <label for="count">Количество</label>
                    <input type="number" name="count" class="form-control" value="{{$books->count}}">
                </div>
                <div class="col-md-4">
                    <img src='{{asset("images/$books->image")}}' alt="">
                </div>    
                <div class="col-md-4">
                    <input type="file" name="image"/><br>
                </div>
                <div class="col-md-8">
                    <i class="glyphicon glyphicon-arrow-left">
                    </i>Миниатюра для товара.
                </div>
                <div>
                    <label for="status">Статус</label>
                    <select name="status" class="form-control">
                        <option value="В наличии">В наличии</option>
                        <option value="Отсутствует">Отсутствует</option>
                    </select>
                </div>
                <input type="submit" value="Сохранить">
            </form>
        </div>
        <div class="col-md-4"></div>
    </div>
    <a href="{{URL::previous()}}">Назад</a>
@endsection