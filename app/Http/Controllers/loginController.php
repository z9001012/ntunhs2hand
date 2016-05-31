<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
class loginController extends Controller
{
    public function getLogin()
    {
        return View("login");
    }
    public function postLogin()
    {
        $input = Input::all();
        $rules = [
            'email' => 'required',
            'password' => 'required'
        ];
        $attribute = [
            'email' => '信箱',
            'password' =>'密碼'
        ];

        $validator = Validator::make($input,$rules);
        $validator->setAttributeNames($attribute);

        if($validator->passes())
        {
            $attempt = Auth::attempt([
                'email'     => $input['email'],
                'password'  => $input["password"]
            ]);
            if($attempt)
            {
                return Redirect::to('/');
            }
            else
            {

                return Redirect::back()->witherrors(['fail'=>'帳號密碼錯誤']);
            }
        }
        return Redirect::back()->witherrors($validator);
    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
