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
    public function sendOrder($bookID)
    {
        $book = Book::find($bookID);
        if(!$book )
        {
            return view("errors.404");
        }
        $salerID = $book->user->id;
        $salerEmail = $book->user->email;
        $salerName = $book->user->name;

        $buyerID = Auth::user()->id;
        $buyerEmail = Auth::user()->email;
        $buyerName = Auth::user()->name;

        $this->post = [
                "bookID"    => $bookID,
                "salerEmail"   => $salerEmail,
                "salerID"   => $salerID,
                "salerName" => $salerName,
                "buyerID"=> $buyerID,
                "buyerEmail"=> $buyerEmail,
                "buyerName" => $buyerName
        ];

//        dd($post);


//        dd($post);
        //寄信
        Mail::queue("mails.orderMail",$this->post, function($message)
        {


            order::create([
                'book_id' => $this->post["bookID"],
                'user_id' => $this->post["buyerID"]
            ]);

            $email = $this->post["salerEmail"]."@ntunhs.edu.tw";

            $message->to($email)
                ->subject('國北護二手書拍賣網');
        });

        Mail::queue("mails.orderMail2Buyer",$this->post, function($message)
        {

            $email = $this->post["buyerEmail"]."@ntunhs.edu.tw";
            $message->to($email)
                ->subject('國北護二手書拍賣網');
        });

        return Redirect("commail");
    }



    public function answerQ($questionID)
    {
        $rules = [
            'note'       => 'required'
        ];
        $attribute = array(
            'note'       => '詢問事項'
        );
        $data = Input::all();
        $validator = Validator::make($data,$rules);
        $validator->setAttributeNames($attribute);
        $note = nl2br(strip_tags($data["note"]));

        //是否有錯誤
        if($validator->fails())
        {
            return Redirect::back()->witherrors($validator);
        }
        //CHECK QUSTION AND USER IS MATCH
        $checkQustionAndUser = $this->checkQustionAndUser($questionID);
        if(!$checkQustionAndUser)
        {
            return view("errors.404");
        }
        $qa = QA::find($questionID);
        $qa->answer = $note;
        $qa->save();
        return Redirect::back();

    }
    public function checkQustionAndUser($questionID)
    {
        $this->salerID = Auth::user()->id;
        $QA = QA::find($questionID);
        if($QA->user_id != $this->salerID)
        {
            return 0;
        }
        return 1;
    }
    public function sendQ($book_id)
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
        $note = nl2br(strip_tags($data["note"]));

        //是否有錯誤
        if($validator->fails())
        {
            return Redirect::back()->witherrors($validator);
        }
        //這邊這邊這邊2015/06/01
        $this->checkUserAndBook(Auth::user()->id,$book_id);
        QA::create([
            'user_id' => Auth::user()->id,
            'book_id' => $book_id,
            'question'=> $note
        ]);
        return Redirect::back();

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
    public function index($id)
    {

        $books = Book::find($id);
        //$QAs = QA::where('book_id',$id)->orderBy("id","DESC");

        //return View("books.index")->withbooks($books)->withqas($QAs);
        return View("books.index")->withbooks($books);
    }

}
