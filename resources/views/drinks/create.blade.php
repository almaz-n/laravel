@extends('layout.mainlayout')

@section('content')
    <h3>Новый товар</h3>
    <div class="row">
        <div class="col-md-4">
            <form action="/drinks/" method="post">
                {{csrf_field()}}
                <div>
                    <label for="name">Название</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div>
                    <label for="category">Категория</label>
                    <select name="category" id="category" class="form-control">
                        @foreach($categories as $value)
                            <option value="{{$value->id}}">{{$value->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="manuf">Производитель</label>
                    <input type="text" name="manuf" class="form-control">
                </div>
                <div>
                    <label for="country">Страна производства</label>
                    <select name="country" id="country" class="form-control">
                        @foreach($country as $value)
                            <option value="{{$value->id}}">{{$value->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="provider">Поставщик</label>
                    <input type="text" name="provider" class="form-control">
                </div>
                <div>
                    <label for="capacity">Ёмкость</label>
                    <select name="capacity" class="form-control">
                        @foreach($capacity as $value)
                            <option value="{{$value}}">{{$value}}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="madedate">Дата производства</label>
                    <input type="date" name="madedate" class="form-control">
                </div>
                <div class="col-md-4">
                    <input type="file" name="image"/><br>
                </div>
                <div class="col-md-8">
                    <i class="glyphicon glyphicon-arrow-left">
                    </i> Выберите миниатюру для товара.
                </div>
                <div>
                    <label for="price">Цена</label>
                    <input type="text" name="price" class="form-control">
                </div>
                <div>
                    <label for="count">Остаток</label>
                    <input type="text" name="count" class="form-control">
                </div>
                <div>
                    <label for="status">Статус</label>
                    <select name="status" class="form-control">
                        @foreach($status as $item)
                            <option value="{{$item}}">{{$item}}</option>
                        @endforeach
                    </select>
                </div>
                <input type="submit" value="Сохранить">
            </form>
        </div>
        <div class="col-md-4"></div>
    </div>
    <a href="{{URL::previous()}}">Назад</a>
@endsection