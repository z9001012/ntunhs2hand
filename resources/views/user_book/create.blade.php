@extends('index')
@section('content')
<div class="">
<div class=" col-md-offset-3 col-md-6">
	<div class="panel panel-default">
	  <div class="panel-heading">
	      <h3><span>請輸入書本資料</span></h3>
	  </div>

	  <form action="{{URL("mybooks/")}}" id="form" method="post" enctype="multipart/form-data">
	      <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
          <div class="panel-body"align="center">
            @include('errors.error')
            <p align="left">請輸入書名</p>
            <input type="text" class="form-control"  id="name" value="{{ old('name') }}" name="name" >
            <p align="left">請輸入作者</p>
            <input type="text" class="form-control" id="author" value="{{ old('author') }}" name="author" >
            <p align="left">請選擇書況</p>
            <select name="isnew" id="isnew" class="form-control">
                <option value="0" {{( old('isnew') == 0 ? "selected":"")}}>二手書</option>
                <option value="1" {{( old('isnew') == 1 ? "selected":"")}}>新書</option>
            </select>
            <p align="left">請選擇系所</p>
            <?php $departs = $depart?>
            <select name="depart" required id="depart"class="form-control">
            @foreach($departs as $index => $depart)
                <option value="{{$index+1}}" {{( old('depart') == $index+1 ? "selected":"")}}>{{$depart}}</option>
            @endforeach
            </select>
            {{--<p align="left">請輸入總書量</p>--}}
            {{--<input type="number"  name="total" id="total" value="{{ old('total') | 0 }}" min="1" class="form-control"/>--}}
            <p align="left">請輸入原價(元)</p>
            <input type="number" required name="price" id="price" value="{{ old('price') | 0 }}" min="0" step="5" class="form-control"/>
            <p align="left">請輸入二手價(元)</p>
            <input type="number"  name="onsale" id="onsale" value="{{ old('onsale') | 0 }}" min="0" step="5" class="form-control"/>
            <p align="left">請上傳圖片</p>
            <input type="file" name="cover" id="cover" value="{{ old('cover') }}" class="form-control"/>
            <br/>
            <input type="submit" value="送出" id="btsubmit" class="btn btn-success"><br>
          </div>
	  </form>

	</div>
</div>
</div>
@endsection