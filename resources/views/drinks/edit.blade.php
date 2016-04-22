@extends('layout.mainlayout')

@section('content')
    <h1>Редактирование товара</h1>
    <div class="row">
        <div class="col-md-4">
            <form action="/drinks/{{$drinks->id}}" method="post">
                {{csrf_field()}}
                <input name="_method" type="hidden" value="PATCH">
                <div>
                    <label for="name">Название</label>
                    <input type="text" name="name" class="form-control" value="{{$drinks->name}}">
                </div>
                <div>
                    <label for="category">Категория</label>
                    <select name="category" id="category" class="form-control">
                        @foreach($categories as $value)
                            @if($value->id == $drinks->category_id)
                                <option value="{{$value->id}}" selected>{{$value->name}}</option>
                            @else
                                <option value="{{$value->id}}">{{$value->name}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="manuf">Производитель</label>
                    <input type="text" name="manuf" class="form-control" value="{{$drinks->manufacture}}">
                </div>
                <div>
                    <label for="country">Страна производства</label>
                    <select name="country" id="country" class="form-control">
                        @foreach($country as $value)
                            @if($value->id == $drinks->country_id)
                                <option value="{{$value->id}}" selected>{{$value->name}}</option>
                            @else
                                <option value="{{$value->id}}">{{$value->name}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="provider">Поставщик</label>
                    <input type="text" name="provider" class="form-control" value="{{$drinks->provider}}">
                </div>
                <div>
                    <label for="capacity">Ёмкость</label>
                    <select name="capacity" class="form-control">
                        @foreach($capacity as $value)
                            @if($value == $drinks->capacity)
                                <option value="{{$value}}" selected>{{$value}}</option>
                            @else
                                <option value="{{$value}}">{{$value}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="madedate">Дата производства</label>
                    <input type="date" name="madedate" class="form-control" value="{{$drinks->madeDate}}">
                </div>
                <div>
                    <label for="image">Изображение</label>
                    <input type="text" name="image" class="form-control" value="{{$drinks->image}}">
                </div>
                <div>
                    <label for="price">Цена</label>
                    <input type="text" name="price" class="form-control" value="{{$drinks->price}}">
                </div>
                <div>
                    <label for="count">Остаток</label>
                    <input type="text" name="count" class="form-control" value="{{$drinks->count}}">
                </div>
                <div>
                    <label for="status">Статус</label>
                    <select name="status" class="form-control">
                        @foreach($status as $item)
                            @if($item == $drinks->status)
                                <option value="{{$item}}" selected>{{$item}}</option>
                            @else
                                <option value="{{$item}}">{{$item}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <input type="submit" value="Сохранить изменения">
            </form>
        </div>
        <div class="col-md-4"></div>
    </div>
    <a href="{{URL::previous()}}">Назад</a>
@endsection