<!DOCTYPE html>
<?php
  include ("configure.php");
  $link = mysql_connect($hostname, $username, $password) OR die("Unable to connect to database");
  if ($link)
    mysql_select_db($database);
  else
    die("Unable to select database");
  mysql_query("SET NAMES utf8");
  $query = "SELECT `cname` FROM `course` ORDER BY `cname` ASC LIMIT 0,1000;";
  $result = mysql_query($query) or die("Connect DB Table Error!");
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BrainDump</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
      .btn {
        cursor: pointer;
        width: 80px;
        height: 80px;
        border-radius: 50%;
        font-size: 36px;
        text-align: center;
        color: #fff;
        padding: 14px;
        box-sizing: border-box;
        background-color: red;
        margin: 5px;
      }

      .br {
        position: absolute;
        bottom: 0;
        right: 10%;
        z-index: 999;
      }

      .btn:hover {
        background-color: #D32F2F;
        -webkit-box-shadow: 2px 8px 4px -2px rgba(0,0,0,0.62);
        -moz-box-shadow: 2px 8px 4px -2px rgba(0,0,0,0.62);
        box-shadow: 2px 8px 4px -2px rgba(0,0,0,0.62);
      }

      .btn:active {
        background-color: #B71C1C;
        -webkit-box-shadow: 3px 10px 5px -2px rgba(0,0,0,0.62);
        -moz-box-shadow: 3px 10px 5px -2px rgba(0,0,0,0.62);
        box-shadow: 3px 10px 5px -2px rgba(0,0,0,0.62);
      }
    </style>
  </head>
  <body>
    <div class="btn br">
    <a href="addcourse.php">
       ＋
    </a>
    </div>
    <div class="navbar-wrapper">
      <div class="container">
        <nav class="navbar navbar-inverse navbar-static-top">
          <div class="container">
            <div class="navbar-header">
              <a class="navbar-brand" href="">NTUNHS Brain</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                <li><a href="index.php">熱門話題</a></li>
                <li><a href="courses.php">課程總覽</a></li>
                <li class="active"><a href="upload.php">上傳考題</a></li>
              </ul>
            </div>
          </div>
        </nav>
      </div>
    </div>
    <div class="container marketing">
      <form class="form-horizontal" action="file_ok.php" method="post" enctype="multipart/form-data" target="_blank">
        <div class="row">
          <div class="input-group">
            <span class="input-group-addon">課程名稱</span>
            <input list="browsers" name="course" value="Choose    如果無選項請按右下按鈕新增" class="form-control">
               <?php //將課程的名稱 SHOW 出來
                 echo '<datalist id="browsers">';
                  while($row=mysql_fetch_array($result))
                  {
                     echo '<option value='.$row["cname"].'>';
                  }
                 echo '</datalist>';
                ?>
            <span class="input-group-addon">考試項目</span>
            <input type="text" name="type" value="" placeholder="期中考/期末考" class="form-control" >
            <span class="input-group-addon">指導老師</span>
            <input type="text" name="teacher" value="" placeholder="請輸入指導老師" class="form-control" >
          </div>
          <div class="input-group">
            <span class="input-group-addon">學習年度</span>
            <input type="text" name="semester" value="" placeholder="請輸入學習年度" class="form-control" >
            <span class="input-group-addon">提供大神</span>
            <input type="text" name="provider" value="" placeholder="請輸入提供人名" class="form-control" >
            <span class="input-group-addon">可靠程度</span>
            <input type="text" name="trust" value=""  class="form-control" placeholder="請輸入0~5">
          </div>
          <div class="input-group">
            <span class="input-group-addon">上傳檔案(考題請不要有“.”的符號在檔名中)</span>
              <input type="hidden" class="form-control" name="max_file_size" value="102400000">
              <input type="file" class="form-control" name="myfile">
              <input type="submit" class="form-control" value="上傳">
          </div>
        </div>
      </form>

      <hr class="featurette-divider">

    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
  <?php 
    mysql_free_result($result);
    mysql_close($link);
  ?>
</html>