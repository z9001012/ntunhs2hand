@extends('index')
@section('content')
<div class="">
<h1 style="display:none;" id="welmsg">
    Hello! 你的書櫃有<span>{{count($user->books)}}</span>本書.
</h1>
<div class=" col-md-offset-2 col-md-8">
   <a href="{{URL("mybooks/create")}}" class="btn"><span>加入新書</span></a>
   <br/>
    <div class="panel panel-default">
        <div class="panel-heading">
        <h3>我的書櫃</h3>
    </div>

    @if(count($user->books)!=0)
    <table class="table">
        <tr>

            <td><span>系所</span></td>
            <td><span>書名</span></td>
            <td><span>出售價格</span></td>
            <td><span>存貨/總共</span></td>
            <td></td>
            <td></td>
        </tr>
            @foreach($user->books as $book)
            <tr>

                <td>
                    <?php
                        echo $book->depart2Know();
                    ?>
                </td>
                <td>{{$book->name}}</td>
                <td>{{$book->price}}</td>
                <td>{{$book->sales}} / {{$book->total}}</td>
                <td>
                @if($book->type)
                    <a href="{{URL("mybooks/".$book->id."/down") }}" class="btn btn-success">販賣中</a>
                @else
                    <a href="{{URL("mybooks/".$book->id."/up") }}" class="btn btn-danger">停賣</a>
                @endif
                </td>
                <td>
                <?php
                ?>
                </td>
            </tr>
            @endforeach

    </table>
    @endif
    </div>
</div>
</div>
@endsection