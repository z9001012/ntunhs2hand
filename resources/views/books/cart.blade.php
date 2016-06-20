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
            <td style="vertical-align: middle">1</td>
            <td style="vertical-align: middle">{{$books->onsale}} 元</td>
        </tr>
        <tr>
            <td colspan="3" align="right">應付金額：</td>
            <td align="left"><span>{{$books->onsale}} 元</span></td>
        </tr>
        <tr>
            <td colspan="4">
                <span class="active">系統將會把您的信箱與姓名寄給賣家，等待賣家與您聯絡</span>
                <form action="{{ url("/sendOrder",$books->id) }}" id="form" method="post">
                    <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                    <button class="btn btn-success btn-block" type="submit" id="btsubmit">確定</button>
                </form>
            </td>
        </tr>



    </table>
</div>
@endsection