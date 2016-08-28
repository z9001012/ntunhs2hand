@extends('index')
@section('content')
<h1 style="display:none;" id="welmsg">
	Welcome! 這裡是屬於<span> 國北護全體師生</span> 的二手書系統
</h1>

<?php
$departs = array("資管系","護理系","生死系","健管系","運保系","幼保系","休健系","長期照護系","聽語系");
?>

<ul id="filters" class="clearfix">
	<li><a href="{{ url('') }}"><span class="filter {{ Request::path()=="/" ? ' active' : ''}}" data-filter="資管系 護理系 生死系 健管系 運保系 幼保系 休健系 長期照護系 聽語系">All</span></a></li> /
	@foreach($departs as $key => $depart)
		<li><a href="{{ url('/depart/'.($key+1)) }}"><span class="filter {{ Request::path()== ($key+1) ? ' active' : ''}}">{{$depart}}</span></a></li> /
	@endforeach
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