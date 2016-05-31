<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class BookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function ViewBooks()
    {
        $user = User::find(Auth::user()->id);
        return View("user_book.index")->withuser($user);
    }
}
