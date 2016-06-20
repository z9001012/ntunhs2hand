<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Document</title>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all">
<link href="{{ asset('css/style.css')}}" rel="stylesheet" type="text/css" media="all" />
</head>
<body>
<div class="col-md-6 col-md-offset-3">
    <h3>Hello! Welcome to <span style="color: #d42819;">北護二手書拍賣網</span></h3>
    <div>
        <b>{{$buyerName}}</b> 先生/小姐，您好<br>
        您已向<a href="{{ url("book",$bookID) }}">商品</a>的賣家寄出Email<br>
        請等待賣家回覆 <br>
        賣家稱呼： {{$salerName}} <br>
        賣家信箱： {{$salerEmail}}@ntunhs.edu.tw <br>
        <br/><br/>
    </div>
    <?php
    echo date('l dS \of F Y h:i:s A');
    ?>
</div>
</body>
</html>