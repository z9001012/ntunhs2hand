@extends('index')
@section('content')
<script type="text/javascript">
    jQuery(function($) {
        $(".swipebox").swipebox();
    });
</script>
<h1 style="display:none;" id="welmsg">
    Hello! 請確認這本書是不是你要購買的書.
</h1>
<div class="col-md-8 col-md-offset-2 view" style="">
    <table class="table">
        <tr>
            <td></td>
            <td>書名</td>
            <td>數量</td>
            <td>價錢</td>
        </tr>
        <tr>
            <td><img src="{{ asset("cover/".$books->img)}}" class="img-thumbnail" width="100"/></td>
            <td style="vertical-align: middle">{{$books->name}}</td>
            <td style="vertical-align: middle">{{$books->total}}</td>
            <td style="vertical-align: middle">{{$books->onsale}} 元</td>
        </tr>
        <tr>
            <td colspan="3" align="right">應付金額：</td>
            <td align="left"><span>{{$books->onsale * $books->total}} 元</span></td>
        </tr>



    </table>
</div>
@endsection