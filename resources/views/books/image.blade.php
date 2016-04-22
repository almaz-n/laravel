@extends('layout.mainlayout')

@section('content')
    <h3>Доп. картинки</h3>
    <div class="row">
        <div class="col-md-4">
            @if($errors->any())
                <h4>{{$errors->first()}}</h4>
            @endif
            @if(Session::has('message'))
                <h4>{{Session::get('message')}}</h4>
            @endif   
            <form action="/books/{{$books->id}}/saveimage" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                
                <div class="col-md-4">
                    <input type="file" name="image"/><br>
                </div>
                <div class="col-md-12">
                    <input type="submit" value="Сохранить">
                </div>
            </form>
        </div>
        <div class="col-md-4"></div>
    </div>
    <a href="/books/">Назад</a>
@endsection