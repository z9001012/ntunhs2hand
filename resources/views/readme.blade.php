@extends('index')
@section('content')

    <div class="panel row">
        <h1>Readme</h1>
        <h1 style="font-size: 16px">**********程式進入點:<code> localhost/mid/public/</code>**********<br><br></h1>
        <div class="col-md-6 col-md-offset-3">

            <h3>有哪些程式是我寫的？</h3>
            路由：<br>
            <code>app/Http/routes.php</code><br><br><br>
            Controllers：<br>
            <code>app/Http/Controllers/*.php</code><br><br><br>
            Model : <br>
            <code>app/Book.php</code>
            <br>
            <code>app/depart.php</code>
            <br>
            <code>app/order.php</code>
            <br>
            <code>app/QA.php</code>
            <br>
            <code>app/User.php</code>
            <br><br><br>
            View : <br>
            <code>resources/books/*.blade.php</code><br>
            <code>resources/error/*.blade.php</code><br>
            <code>resources/mails/*.blade.php</code><br>
            <code>resources/user_book/*.blade.php</code><br><br><br>


            <div style="border-top:2px solid silver;padding-top: 20px;">
                首頁：
                <img src="{{url("read_images/index.png")}}" class="img-responsive img-thumbnail" alt="">
                <br><br>瀏覽書本，加入<code>留言功能，且需輸入提供驗證碼（使用者端）</code>：
                <img src="{{url("read_images/viewbook.png")}}" class="img-responsive img-thumbnail" alt="">
                <br><br>瀏覽書本，加入<code>回覆功能（賣書端）</code>：
                <img src="{{url("read_images/admin-viewbook.png")}}" class="img-responsive img-thumbnail" alt="">
                <br><br>確認書本，<code>按下確認後寄信給賣家與買家對方資訊</code>：
                <img src="{{url("read_images/cart.png")}}" class="img-responsive img-thumbnail" alt="">
                <br><br><code>賣家信箱</code>：
                <img src="{{url("read_images/saler.png")}}" class="img-responsive img-thumbnail" alt="">
                <br><br><code>買家信箱</code>：
                <img src="{{url("read_images/buyer.png")}}" class="img-responsive img-thumbnail" alt="">



            </div>
            <br><br>
            <h1>配對完成</h1>
            <br><br><br>

        </div>
    </div>


@stop
