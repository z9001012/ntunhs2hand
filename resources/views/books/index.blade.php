@extends('index')
@section('content')
<script type="text/javascript">
    jQuery(function($) {
        $(".swipebox").swipebox();
    });
</script>
<div class="col-md-8 col-md-offset-2 view" style="">
    @include('errors.error')
    <div class="col-md-5">
        <div class="thumbnail">
          <div class="portfolio card mix_all  wow bounceIn" data-wow-delay="0.4s" data-cat="card" style="display: inline-block; opacity: 1;">
              <div class="portfolio-wrapper grid_box" style="margin: 0!important;">
                  <div class="welcome-1">
                      <a href="{{ asset("cover/".$books->img)}}" class="swipebox"  title="{{$books->name}}">
                      <img src="{{ asset("cover/".$books->img)}}"width="300" class="img-responsive" alt="">
                      <span class="zoom-icon"></span> </a>
                  </div>
               </div>
          </div>
        </div>

    </div>
    <div class="col-md-5 content" style="margin-top:20px;">
        <b class="name">{{$books->name}}</b><br/><br/>
        <span class="view_title">作者：</span><b>{{$books->author}}</b><br/>
        <span class="view_title">系所：</span><b>
            <?php
                echo $books->depart2Know();
            ?>
        </b><br/>
         <span class="view_title">原價：</span><b><del>{{$books->price}}</del> 元</b><br/>
         <span class="view_title">二手價：</span><b><span>{{$books->onsale}}</span> 元</b><br/>
         {{--<span class="view_title">已賣出/總書量：</span><b>{{$books->total}}/{{$books->sales}}</b><br/><br/><br/>--}}
        <br>
         <a href="{{url('book/'.$books->id.'/'.$books->user_id)}}" class="btn btn-success">我要購買</a>




    </div>
</div>
<div class="col-md-8 col-md-offset-2 view" style="">
    <div class="col-md-10 col-md-offset-2  content">
        <?php
            $count = count($books->QAs);
        ?>
        @foreach($books->QAs()->orderBy("id","DESC")->get() as $q)
            <div class="question">
                <span>問題 {{$count--}} / </span>
                <span style="color: #2e6da4"> {{$q->user->email}} </span>
                <span style="color:#DDDDDD">  ({{$q->created_at}}) </span>
                <br>
                <div style="color:#111;padding-left: 60px;"><?php echo $q->question?></div>
                <br>
            </div>

            <div class="answer">


            @if($q->answer!="")
                <span>賣家回覆</span><br>
                    <span style="color:#DDDDDD">  ({{$q->updated_at}}) </span>
                    <div style="color:#111;padding-left: 60px;"><?php echo $q->answer?></div>
            @else
                @if(Auth::id() == $books->user_id)
                <form action="{{ url("/answerQ",$q->id) }}" method="post">
                    <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                    <input name="id" type="hidden" value="{{$q->id}}"/>
                    <textarea name="note" id="note" cols="5" rows="5" style="width:100%" maxlength="250" placeholder="請留下您想回覆買家的話（250字以內）"></textarea>
                    <br>
                    <button class="btn btn-primary btn-block" type="submit" id="sendbtn">回覆</button>
                </form>
                @endif
            @endif
                <br>
            </div>
                <hr>
        @endforeach
    </div>
</div>
<div class="col-md-8 col-md-offset-2 view" style="">
    <div class="col-md-10 col-md-offset-2  content">

        <form action="{{ url("/sendQ",[$books->id]) }}" id="form" method="post">
            <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
            <input name="id" type="hidden" value="{{$books->user_id}}"/>
            <input type="hidden" name="book_id" value="{{$books->id}}"/>
            *為避免個資外洩，請勿在提問內容填寫個人相關資料，如:姓名、銀行帳戶..等。
            *250字以內
        <textarea name="note" id="note" cols="5" rows="5" style="width:100%" maxlength="250" placeholder="請留下您想問賣家的問題"></textarea>
        <span class="active">為了防止被大量張貼廣告，請輸入圖片中的安全碼</span>
            <br>
            <img src="{{URL::to('captcha')}}">
            <input type="text" name="text_input" id="text_input">
        <button class="btn btn-success btn-block" type="submit" id="btsubmit">留言</button>
        </form>
    </div>
</div>
@endsection