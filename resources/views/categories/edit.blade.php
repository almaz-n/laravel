@extends('layout.mainlayout')

@section('content')
    <h1>Категория №{{$category->id}}</h1>
    <div class="row">
        <div class="col-md-4">
            <form action="/categories/{{$category->id}}" method="post">
                {{csrf_field()}}
                <input name="_method" type="hidden" value="PATCH">
                <div>
                    <label for="name">Наименование</label>
                    <input type="text" name="name" value="{{$category->name}}" class="form-control">
                </div>
                <div>
                    <label for="slug">Краткое наименование</label>
                    <input type="text" name="slug" value="{{$category->slug}}" class="form-control"> <br>
                </div>
                <input type="submit">
            </form>
        </div>
        <div class="col-md-4"></div>
    </div>
    <a href="{{URL::previous()}}">Назад</a>
@endsection