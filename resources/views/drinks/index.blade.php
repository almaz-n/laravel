@extends('layout.mainlayout')

@section('content')
<h2>dfgtdfg</h2>
       <!--  <form class="navbar-form navbar-left form" role="search" action="/search/" method="post">
            {{csrf_field()}}
            <fieldset class="fieldset">
                <div class="form-group">
                    <input type="text" class="form-control" name="search" placeholder="Поиск">
                    <button class="btn btn-default">Поиск</button>
                </div>
                <div>
                    <select name="category" id="" class="form-control">
                        <option value="0">- Категория -</option>
                        @foreach($books as $value)
                            <option value="{{$value->category->id}}">{{$value->category->name}}</option>
                        @endforeach
                    </select>
                    <select name="country" id="" class="form-control">
                        <option value="0">- Страна производства -</option>
                        @foreach($books as $value)
                            <option value="{{$value->category->name}}">{{$value->category->name}}</option>
                        @endforeach
                    </select>
                    <select name="capacity" id="" class="form-control">
                        <option value="0">- Ёмкость -</option>
                        @foreach($books as $value)
                            <option value="{{$value->category->name}}">{{$value->category->name}}</option>
                        @endforeach
                    </select>
                    <select name="status" id="" class="form-control">
                        <option value="0">- Статус -</option>
                        @foreach($books as $value)
                            <option value="{{$value->category->name}}">{{$value->category->name}}</option>
                        @endforeach
                    </select>
                </div>
            </fieldset>
        </form>

        <h1>Книги</h1>
        @if(Auth::User()->name == 'admin')
            <h4>
                <a href="/drinks/create">Создать товар</a>
            </h4>
        @endif
    <table class="table table-bordered table-hover">
        <tr>
            <th class="text-center">Категория</th>
            <th class="text-center">Название</th>
            <th class="text-center">Автор</th>
            <th class="text-center">Страна производства</th>
            <th class="text-center">Поставщик</th>
            <th class="text-center">Ёмкость</th>
            <th class="text-center">Дата произв.</th>
            <th class="text-center">Цена</th>
            <th class="text-center">Остаток</th>
            <th class="text-center">Статус</th>
            @if(Auth::User()->name == 'admin')
                <th class="text-center">Редактирование</th>
            @endif
            <th class="text-center">Заказ</th>
        </tr> -->
      <!--   @foreach($books as $value)
            <tr>
                <td>{{$value->category->name}}</td>
                <td>{{$value->name}}</td>
                <td>{{$value->manufacture}}</td>
                <td>{{$value->cname}}</td>
                <td>{{$value->provider}}</td>
                <td>{{$value->capacity}} л</td>
                <td>{{$value->madeDate}}</td>
                <td>{{$value->price}} р.</td>
                <td>{{$value->count}}</td>
                <td>{{$value->status}}</td>
                @if(Auth::User()->name == 'admin')
                    <td>
                        <div><a href="/books/{{$drink->id}}/edit">Редактировать</a></div>
                        <div><a href="/books/{{$drink->id}}/destroy/">Удалить</a></div>
                    </td>
                @endif
                <td><a href="/order/">Заказать</a></td>
            </tr>
        @endforeach -->
   <!--  </table> -->
@endsection
