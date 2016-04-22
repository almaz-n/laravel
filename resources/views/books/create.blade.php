@extends('layout.mainlayout')

@section('content')
    <h3>Новый товар</h3>
    <div class="row">
        <div class="col-md-4">
            @if($errors->any())
                <h4>{{$errors->first()}}</h4>
            @endif
               
            <form action="/books" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div>
                    <label for="name">Название</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div>
                    <label for="author">Автор</label>
                    <input type="text" name="author" class="form-control">
                </div>
                <div>
                    <label for="publish">Издательство</label>
                    <input type="text" name="publish" class="form-control">
                </div>
                <div>
                    <label for="year">Год издания</label>
                    <input type="text" name="year" class="form-control">
                </div>
                <div>
                    <label for="genre">Жанр</label>
                    <select name="genre" class="form-control">
                        @foreach($books as $value)
                            <option value="{{$value->genre}}">{{$value->genre}}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="capacity">Цена</label>
                    <input type="text" name="price" class="form-control">
                </div>
                <div>
                    <label for="count">Количество</label>
                    <input type="number" name="count" class="form-control">
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