@extends('layout.mainlayout')

@section('content')
    <h1>добавить страну</h1>
    <div class="row">
        <div class="col-md-4">
            <form action="/countries/" method="post">
                {{csrf_field()}}
                <div>
                    <label for="name">Назавание</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <input type="submit" value="Сохранить">
            </form>
        </div>
        <div class="col-md-4"></div>
    </div>
    <a href="{{URL::previous()}}">Назад</a>
@endsection