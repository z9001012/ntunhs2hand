@extends('index')
@section('content')
<div class="">
<div class=" col-md-offset-3 col-md-6">
	<div class="panel panel-default">
	  <div class="panel-heading">
	      <h3><span>請輸入資料</span></h3>
	  </div>

	  <form action="{{URL("user/add/".$confirmation_code)}}" id="form" method="post">
	      <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
          <div class="panel-body"align="center">
            <img src="{{ asset('images/logo.png')}}" width="250" ><br><br>
            @include('errors.error')
            <p align="left">請輸入您的姓名</p>
            <input type="text" class="form-control" id="name" value="{{ old('name') }}" name="name" >
            <p align="left">請輸入您的密碼 <span>*密碼最少4位</span></p>
            <input type="password" name="password" id="password" class="form-control"/>
            <p align="left">請再次輸入您的密碼</p>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control"/>
            <br/>
            <input type="submit" value="送出" id="btsubmit" class="btn btn-success"><br>
          </div>
	  </form>

	</div>
</div>
</div>
@endsection