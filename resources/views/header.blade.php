<div class="header">
	<div class="container">
		<a href="{{ URL('/') }}" class="logo">
			<img src="{{asset('images/logo.png')}}" width="150" alt="">
		</a>
		<div class="head-nav">
			<ul class="cl-effect-3">
				<li class="active"><a href="{{ URL('/') }}">Home</a></li>
				<li><a href="{{ URL('/') }}">二手書拍賣</a></li>
				<li><a href="{{ URL('/') }}">遺失物尋找</a></li>
			</ul>
		</div>
		<div class="login" style="float:right" >
		    @if(!Auth::check())
                <a href="{{ url('login')}}" class="btn btn-success">登入</a>
                <a href="{{ url('postmail')}}" class="btn btn-warning">註冊</a>
			@else

			<div class="dropdown">
            <span class="dropdown-toggle" type="button" data-toggle="dropdown">
                Hi! {{Auth::user()->name}}
                <span class="caret"></span>
            </span>

              <ul class="dropdown-menu">
                <li><a href="{{url('mybooks')}}">我的書櫃</a></li>
			  	<li><a href="{{url('mybooks')}}">遺失物</a></li>
                <li><a href="#">修改基本資料</a></li>
                <li><a href="{{ url('logout')}}">登出</a></li>
              </ul>
            </div>
			@endif
		</div>
	</div>
</div>
