<?php

namespace App\Http\Controllers;
use App\Book;
use App\depart;
use App\User;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use App\Http\Controllers\mailController;
class BookController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function upType($id)
    {
        $user = User::find(Auth::user()->id);
        if(!$user)
        {
            return view("errors.404");
        }
        $book = $user->books->find($id);
        if(!$book)
        {
            return view("errors.404");
        }
        $book->type = 1;
        $book->save();
        return Redirect("mybooks");
    }
    public function downType($id)
    {
        $user = User::find(Auth::user()->id);
        if(!$user)
        {
            return view("errors.404");
        }
        $book = $user->books->find($id);
        if(!$book)
        {
            return view("errors.404");
        }
        $book->type = 0;
        $book->save();
        return Redirect("mybooks");
    }

    public function index()
    {
        $user = User::find(Auth::user()->id);
        return View("user_book.index")->withuser($user);
    }


    public function create()
    {
        $depart = depart::lists('name');
        return View("user_book.create")->with("depart",$depart);
    }

    public function store(Request $request)
    {

        $rules = [
            'name' => 'required',
            'author' => 'required',
            'isnew' => 'required',
            'depart' => 'required',
//            'total' => 'required',
            'price' => 'required',
            'onsale' => 'required',
            'cover' => 'required|image'
        ];
        $attribute = array(
            'name' => '姓名',
            'author' => '作者',
            'isnew' => '書況',
            'depart_id' => '系所',
//            'total' => '總書量',
            'price' => '原價',
            'onsale' => '二手價',
            'cover' => '封面圖片'
        );

        $path = str_random(30).".".Input::file("cover")->getClientOriginalExtension();
        $to = "cover";
        $post = Input::all();
        $validator = Validator::make($post,$rules);
        $validator->setAttributeNames($attribute);
        if($validator->fails())
        {
            return Redirect::back()->witherrors($validator)->withInput();
        }
        if(Input::hasFile('cover'))
        {
            Book::create([
                'name'   => $post["name"],
                'author' => $post["author"],
//                'sales'  => $post['total'],//賣出多少
                'type'   => 1, //販賣中
                'isnew'  => $post["isnew"],//新/二手
                'depart_id' => $post["depart"],//系
//                'total'  => $post['total'],
                'price'  => $post['price'],
                'onsale' => $post['onsale'],
                'img'    => $path,
                'user_id'=> Auth::user()->id
            ]);
            Input::file("cover")->move($to,$path);
        }
        return redirect("/mybooks");
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
