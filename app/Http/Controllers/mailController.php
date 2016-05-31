<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Mail;

class mailController extends Controller
{
    public function getmail()
    {
        return View('mail');
    }
    public function postmail()
    {
        $confirmation_code = str_random(30);//亂碼

        $rules = [
            'email' => 'required|unique:users'
        ];
        $attribute = array(
            'email' => '信箱'
        );

        $post = Input::only('email');

        $validator = Validator::make($post,$rules);
        $validator->setAttributeNames($attribute);
        //是否有錯誤
        if($validator->fails())
        {
            return Redirect::back()->witherrors($validator);
        }
        User::create([
            'email' => $post["email"],
            'confirmation_code' => $confirmation_code,
        ]);

        //寄信
        Mail::send("mails.adduser",["code"=>$confirmation_code], function($message)
        {
            $email = Input::get('email')."@ntunhs.edu.tw";
            $message->to($email)
                ->subject('國北護二手書拍賣網');
        });


        return Redirect("commail");
    }
    //亂碼function
    public static function str_random($length)
    {
        $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

        return substr(str_shuffle(str_repeat($pool, 5)), 0, $length);
    }
}
