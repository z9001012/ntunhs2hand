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
    <br/><br/>
    <div align="center">

        <a href="{{ URL("user/add/".$code) }}" class="btn btn-success btn-lg">點擊這裡去驗證你的帳號</a>
    </div><br/>
    謝謝你的註冊!<br/>
    不能點擊這個按鈕？複製這個連結到瀏覽器上：<br/>
    {{ URL("user/add/".$code) }}<br/>

    <br/><br/>
    <?php
    echo date('l dS \of F Y h:i:s A');
    ?>
</div>
</body>
</html>