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
    <div>
        <b>{{$saleName}}</b> 先生/小姐，您好<br>
        有一位買家對您的商品有興趣<br>
        以下是想對您說的話：
        <?php echo $note?>
    <br/><br/>
    <?php
    echo date('l dS \of F Y h:i:s A');
    ?>
</div>
</body>
</html>