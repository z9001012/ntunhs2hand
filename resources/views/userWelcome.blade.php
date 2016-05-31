@extends('index')
@section('content')
<h1 style="display:none;" id="welmsg">
	Thanks!謝謝你的註冊.
    <br/>
    <a href="{{URL("login")}}"><span>登入</span></a>
    或
    <a href="{{URL("/")}}"><span>回首頁</span></a>
</h1>
@endsection