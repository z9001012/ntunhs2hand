<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>北護二手書系統</title>
	<link rel="icon" href="{{asset('images/favicon.ico')}}" type="image/x-icon" />
	<script src="{{ asset('js/jquery.min.js')}}"></script>
	<link href="{{ asset('css/bootstrap.css')}}" rel="stylesheet" type="text/css" media="all">	
	<link href="{{ asset('css/style.css')}}" rel="stylesheet" type="text/css" media="all" />

	<script src="{{ asset('js/bootstrap.min.js')}}"></script>
	<script src="{{ asset('js/jquery.mixitup.min.js')}}"></script>
	<script src="{{ asset('js/jquery.function.js')}}"></script>

	<link rel="stylesheet" href="{{ asset('css/swipebox.css')}}">
	<!-- view image -->
    <script src="{{ asset('js/jquery.swipebox.min.js')}}"></script>

</head>
<body>
@include('header')
<div class="welcome">
	<div class="container">
		@yield('content')
	</div>
	<!-- container end -->
</div>
<!-- welcome end -->
<br/><br/><br/>
@include('footer')
</body>
</html>