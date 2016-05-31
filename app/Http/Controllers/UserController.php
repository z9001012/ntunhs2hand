<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function postUserAdd($confirmation_code)
    {
        if(! $confirmation_code)
        {
            return view("errors.404");
        }
        $user = User::where("confirmation_code",$confirmation_code)->first();

        if(! $user)
        {
            return view("errors.404");
        }

        $rules = [
            'name' => 'required',
            'password' => 'required|confirmed|min:4'
        ];
        $attribute = array(
            'name' => '姓名',
            'password' => '密碼',
            'password_confirmation' => '確認密碼'
        );
        $post = Input::only('name','password','password_confirmation','_token');

        $validator = Validator::make($post,$rules);
        $validator->setAttributeNames($attribute);
        if($validator->fails())
        {
            return Redirect::back()->witherrors($validator);
        }
        $user->name = $post['name'];
        $user->password = bcrypt($post['password']);
        $user->confirmed = 1;
        $user->confirmation_code = null;
        $user->save();
        return Redirect('user/welcome');
    }
    public function getUserAdd($confirmation_code)
    {
        if(! $confirmation_code)
        {
            return view("errors.404");
        }
        $user = User::where("confirmation_code",$confirmation_code)->first();

        if(! $user || $user->confirmed)
        {
            return view("errors.404");
        }
        return View('adduser')->with("confirmation_code",$confirmation_code);
    }
    public function welcome()
    {
        return view("userWelcome");
    }
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
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
