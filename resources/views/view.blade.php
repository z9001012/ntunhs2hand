@extends('index')
@section('content')
<h1 style="display:none;" id="welmsg">
	Welcome! 這裡是屬於<span> 國北護全體師生</span> 的二手書系統
</h1>

<ul id="filters" class="clearfix">
	<li><a href="{{ url('') }}"><span class="filter {{ Request::path()=="/" ? ' active' : ''}}" data-filter="資管系 護理系 生死系 健管系 運保系 幼保系">All</span></a></li> /
	<li><a href="{{ url('/depart/1') }}"><span class="filter {{ Request::path()=="1" ? ' active' : ''}}">資管系</span></a></li> /
	<li><a href="{{ url('/depart/2') }}"><span class="filter {{ Request::path()=="2" ? ' active' : ''}}">護理系</span></a></li> /
	<li><a href="{{ url('/depart/3') }}"><span class="filter {{ Request::path()=="3" ? ' active' : ''}}">生死系</span></a></li> /
	<li><a href="{{ url('/depart/4') }}"><span class="filter {{ Request::path()=="4" ? ' active' : ''}}">健管系</span></a></li> /
	<li><a href="{{ url('/depart/5') }}"><span class="filter {{ Request::path()=="5" ? ' active' : ''}}">運保系</span></a></li> /
    <li><a href="{{ url('/depart/6') }}"><span class="filter {{ Request::path()=="6" ? ' active' : ''}}">幼保系</span></a></li>
</ul>

<div class="row col-md-12" align="center">
    {!! $books->render() !!}
</div>
<div class="portfolio"  id="portfolio">
		<div class="welcome-top">
		<div id="portfoliolist">
		@foreach($books as $book)
			<!-- one book -->
			<div class="portfolio card mix_all wow bounceIn" data-wow-delay="0.4s" data-cat="card" style="display: inline-block; opacity: 1;">
				<div class="portfolio-wrapper grid_box">
					<div class="welcome-1">
						<h4>{{$book->name}}</h4>
						<p>
                            <?php
                                echo $book->depart2Know();
                            ?>
                        </p>
						<a href="{{ url("book/".$book->id) }}" class="swipebox"  title="Image Title">
							<img src="{{ asset('cover/'.$book->img) }}" class="img-responsive" alt="">
							<span class="zoom-icon"></span>
						</a>
					</div>
				</div>
            </div>
			<!-- one book end -->
		@endforeach
		</div>
</div>
<!-- book end -->
<!-- pagenation end -->
@endsection