@extends('index')
@section('content')
<div class="">
<div class=" col-md-offset-3 col-md-6">
	<div class="panel panel-default">
	  <div class="panel-heading">
	      <h3><span>寄送驗證信</span></h3>
	  </div>
	  <form action="{{URL("postmail")}}" id="form" method="post">
	      <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
          <div class="panel-body"align="center">
            <img src="{{ asset('images/logo.png')}}" width="250" ><br><br>
            <p>請輸入您的北護Email，將進行Email驗證。</p>
            @include('errors.error')
            <div class="input-group">
                <input type="text" class="form-control" id="email" value="{{ old('email') }}" name="email" placeholder="" aria-describedby="basic-addon2">
                <span class="input-group-addon" id="basic-addon2">@ntunhs.edu.tw</span>
            </div><br>
            <input type="submit" value="寄出驗證碼" id="btsubmit" class="btn btn-primary"><br>
          </div>
	  </form>

	</div>
</div>
</div>
@endsection