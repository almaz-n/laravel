@extends('layout.mainlayout')

@section('content')
    <h1>Создать новую категорию</h1>
    <div class="row">
        <div class="col-md-4">
            <form action="/categories/" method="post">
                {{csrf_field()}}
                <div>
                    <label for="name">Наименование</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div>
                    <label for="slug">Краткое название</label>
                    <input type="text" name="slug" class="form-control">
                </div>
                <input type="submit" value="Сохранить">
            </form>
        </div>
        <div class="col-md-4"></div>
    </div>
    <a href="{{URL::previous()}}">Назад</a>
@endsection