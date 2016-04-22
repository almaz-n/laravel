<?php

namespace App\Http\Controllers;

use App\Category;
use App\Books;
use App\images;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

use Intervention\Image\ImageManagerStatic as Image;
use App\Http\Controllers\PHPMailer;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
		$books['books'] = Books::all();
        return view('books.index',$books);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    	$books['books'] = Books::all();
        return view('books.create',$books);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    	//Валидация
    	 $validator = \Validator::make($request->all(), array(
            'name' => 'required',
            'author'=>'required',
            'publish'=>'required',
            'year'=>'integer',
            'genre'=>'required',
            'image'=>'mimes:jpeg,png',
            'count'=>'required | numeric',
        ));

        
         if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }
        else {
            $input = $request->all();

            $file = $input['image'];

            $mime=$file->getClientMimeType(); 
            $filename  = $file->getClientOriginalName();

            $file->move('images/', $filename);
            $image = Image::make('images/'.$filename)->resize(50,50)->save("images/".$filename);
            
            $books = new Books();
            $books->title = $input['name'];
            $books->author = $input['author'];
            $books->publish = $input['publish'];
            $books->year = $input['year'];
            $books->genre = $input['genre'];
            $books->price = $input['price'];
            $books->count = $input['count'];
            $books->image = $filename;
            $books->status = $input['status'];
        
            $books->save();
        
            return redirect('/books/');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $books = Books::find($id);
        return view('books.edit',['books'=>$books]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id) {

        //Валидация
         $validator = \Validator::make($request->all(), array(
            'name' => 'required',
            'author'=>'required',
            'publish'=>'required',
            'year'=>'integer',
            'genre'=>'required',
            'image'=>'mimes:jpeg,png',
            'count'=>'required | numeric',
        ));

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }
        else {

            $input = $request->all();
            $filename=Books::find($id)->image;
            
            $file = $input['image'];

            $mime=$file->getClientMimeType(); 
            $filename  = $file->getClientOriginalName();

            $file->move('images/', $filename);
            $image = Image::make('images/'.$filename)->resize(100,100)->save("images/".$filename);
                    
            $books =Books::find($id);
            $books->title = $input['name'];
            $books->author = $input['author'];
            $books->publish = $input['publish'];
            $books->year = $input['year'];
            $books->genre = $input['genre'];
            $books->price = $input['price'];
            $books->count = $input['count'];
            $books->image = $filename;
            $books->status = $input['status'];
            
            $books->save();
            return redirect()->back()->with('message', 'Продукт изменен');
        }    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Books::destroy($id);
        return redirect('/books/');
    }

   
    public function search(Request $request)
    {
        
        $input = $request->all();
            
        $booksParametrs=Books::where('genre','=',$input['genre'])
                                ->orWhere('publish','=', $input['publish'])
                                ->orWhere('status','=', $input['status'])
                                ->get();
                                
        return view('books.search',['booksParametrs'=>$booksParametrs]);
    }

    public function cart($id)
    {
        $books = Books::find($id);
        return view('books.cart',['books'=>$books]);
    }
    
    public function order($id)
    {
        $books = Books::find($id);
        $name = $books->title;
        $author = $books->author;
        
        $user = Auth::User()->name;
        $email = Auth::user()->email;
        
        $output = 'Пользователь '.$user.' оформил заказ:<br/>';
        $output.= "<p>Название: $name, автор: $author</p><br/>";
        $output.= "E-mail отправителя: ".$email;

        $mail =  new \PHPMailer;

        $mail->IsSMTP();
        $mail->SMTPAuth   = true;
        $mail->Host       = "smtp.yandex.ru";
        $mail->Username   = "email@yandex.ru";
        $mail->Password ='password';
        $mail->SMTPSecure = 'tls';                           
        $mail->Port = 587;                                   

        $mail->setFrom('email@yandex.ru', 'E-mail с сайта');
        $mail->addAddress('almaz.khabibullin.1992@mail.ru', 'Получатель');   
        $mail->addCC($email, $user);
        $mail->addReplyTo('email@yandex.ru', 'Robot');
        $mail->CharSet = 'UTF-8';
        $mail->isHTML(true);   
        $mail->Subject = 'Письмо с сайта '.date('d.m.Y H:i:s',time());
        $mail->Body    = $output;
        $mail->AltBody = $output;

        if($mail->Send()){
            $result="Заказан";
            return view('books.cart',['result'=>$result]);
        }
        else{
            $error="Ошибка";
            return redirect()->back()->with('errors', $error);
        }
    }

    public function image($id)
    {
        $books = Books::find($id);
        return view('books.image',['books'=>$books]);
    }

    public function saveImage(Request $request,$id)
    {
        $book_id=Books::find($id)->id;
        $input = $request->all();

        $validator = \Validator::make($request->all(), array(
            'image'=>'mimes:jpeg,png'
        ));

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }
        else {
            $file = $input['image'];
            
            $filename  = $file->getClientOriginalName();

            $file->move('images/', $filename);
            $image = Image::make('images/'.$filename)->save("images/".$filename);
            
            $books = new Images;
            $books->book_id = $book_id;
            $books->image = $filename;

            $books->save();
            return redirect()->back()->with('message', 'Картинка добавлена');
        }
    }
}
