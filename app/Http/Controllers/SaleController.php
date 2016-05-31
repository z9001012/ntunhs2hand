<?php

namespace App\Http\Controllers;

use App\Book;
use App\order;
use App\QA;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class SaleController extends Controller
{
    public function sendQ($book_id,$user_id)
    {
        $rules = [
            'text_input' => 'required|captcha',
            'note'       => 'required'
        ];
        $attribute = array(
            'note'       => '詢問事項',
            'text_input' => '驗證碼錯誤'
        );
        $data = Input::all();
        $validator = Validator::make($data,$rules);
        $validator->setAttributeNames($attribute);
        $note = nl2br($data["note"]);

        //是否有錯誤
        if($validator->fails())
        {
            return Redirect::back()->witherrors($validator);
        }
        $this->checkUserAndBook($user_id,$book_id);
        QA::create([
            'user_id' => $user_id,
            'book_id' => $book_id,
            'question'=> $note
        ]);
        return Redirect::back();

    }
    public function sendMail()
    {


//        $book = $user->books->find($id);
//
//        if(!$book)
//        {
//            return view("errors.404");
//        }
        $rules = [
            'note' => 'required'
        ];
        $attribute = array(
            'note' => '詢問事項'
        );
        $post = Input::all();
        $this->checkUserAndBook($post["book_id"],$post["id"]);
        $saleUser = User::find($post["id"]);
        $post["saleEmail"] = $saleUser->email;
        $post["saleName"] = $saleUser->name;
//        dd($post["note"]);
        $validator = Validator::make($post,$rules);
        $validator->setAttributeNames($attribute);
        //是否有錯誤
        if($validator->fails())
        {
            return Redirect::back()->witherrors($validator);
        }
//        dd($post);
        //寄信
        Mail::queue("mails.orderMail",$post, function($message)
        {
            $saleUser = User::find(Input::get("id"));
            if(!$saleUser)
            {
                return view("errors.404");
            }
            order::create([
                'book_id' => Input::get('book_id'),
                'user_id' => Input::get("id"),
                'note' => $note
            ]);

            $email = $saleUser->email."@ntunhs.edu.tw";

            $message->to($email)
                ->subject('國北護二手書拍賣網');
        });


        return Redirect("commail");
    }


    public function cart($book_id,$user_id)
    {
        $user = User::find($user_id);
        if(!$user)
        {
            return view("errors.404");
        }
        $book = $user->books->find($book_id);
        if(!$book)
        {
            return view("errors.404");
        }
        return view("books.cart")->withbooks($book)->withuser($user);
    }
    public function checkUserAndBook($book_id,$user_id)
    {
        $user = User::find($user_id);
        if(!$user)
        {
            return view("errors.404");
        }
        $book = $user->books->find($book_id);
        if(!$book)
        {
            return view("errors.404");
        }
    }

    public function index($id)
    {
        $books = Book::find($id);
        $QAs = QA::where('book_id',$id)->orderBy("id","DESC")->get();

        return View("books.index")->withbooks($books)->withqas($QAs);
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
