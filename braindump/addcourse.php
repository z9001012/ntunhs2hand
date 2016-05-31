<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BrainDump</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <div class="navbar-wrapper">
      <div class="container">
        <nav class="navbar navbar-inverse navbar-static-top">
          <div class="container">
            <div class="navbar-header">
              <a class="navbar-brand" href="upload.php">NTUNHS Brain</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                <li class="active"><a href="#">新增課程</a></li>
              </ul>
            </div>
          </div>
        </nav>
      </div>
    </div>
    <div class="container marketing">
      <form class="form-horizontal" action="course_ok.php" method="post" enctype="multipart/form-data" target="_blank">
        <div class="row">
          <div class="input-group">
            <span class="input-group-addon">課程名稱</span>
            <input type="text" name="cname" value="" placeholder="請輸入課程名稱" class="form-control" >
            <span class="input-group-addon">課程資訊</span>
            <input type="text" name="cdesc" value="" placeholder="請輸入課程資訊" class="form-control" >
          </div>
          <div class="input-group">
            <span class="input-group-addon">上傳Logo</span>
              <input type="hidden" class="form-control" name="max_file_size" value="102400000">
              <input type="file" class="form-control" name="myfile">
              <input type="submit" class="form-control" value="請上傳jpg檔">
          </div>
        </div>
      </form>

      <hr class="featurette-divider">

    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>