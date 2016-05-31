@extends('index')
@section('content')
<div class="">
<div class=" col-md-offset-3 col-md-6">
	<div class="panel panel-default">
	  <div class="panel-heading">
	      <h3><span>會員登入</span></h3>
	  </div>

	  <form action="{{URL("login")}}" id="form" method="post">
	      <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
          <div class="panel-body"align="center">
            <img src="{{ asset('images/logo.png')}}" width="250" ><br><br>
            @include('errors.error')
            <p align="left">請輸入信箱帳號 </p>
            <div class="input-group">
                <input type="text" class="form-control" id="email" value="{{ old('email') }}" name="email" placeholder="" aria-describedby="basic-addon2">
                <span class="input-group-addon" id="basic-addon2">@ntunhs.edu.tw</span>
            </div><br>
            <p align="left">請輸入密碼 </p>
            <input type="password" name="password" id="password" class="form-control"/>
            <br/>
            <input type="submit" value="送出" id="btsubmit" class="btn btn-success"><br>
          </div>
	  </form>

	</div>
</div>
</div>
@endsection