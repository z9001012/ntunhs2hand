<!DOCTYPE html>
<?php
  include ("configure.php");
  $link = mysql_connect($hostname, $username, $password) OR die("Unable to connect to database");
  if ($link)
    mysql_select_db($database);
  else
    die("Unable to select database");
  mysql_query("SET NAMES utf8");
  $query = "SELECT * FROM `course` ORDER BY `hit` ASC LIMIT 0,1000;"; //抓取所有課程 並且用課程點擊率排序
  $result = mysql_query($query) or die("Connect DB Table Error!");
?>
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
              <a class="navbar-brand" href="">NTUNHS Brain</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                <li><a href="index.php">熱門話題</a></li>
                <li class="active"><a href="courses.php">課程總覽</a></li>
                <li><a href="upload.php">上傳考題</a></li>
              </ul>
            </div>
          </div>
        </nav>
      </div>
    </div>
    <div class="container marketing">
      <div class="row">
        <?php
          while($row=mysql_fetch_array($result))
          {
             echo '
              <div class="col-lg-4">
                <img class="img-circle" src="./image/cover/'.$row["cname"].'.jpg" alt="Cover image" width="140" height="140">
                <span>
                  <h2>'.$row["cname"].'</h2>
                   點閱次數:'.$row["hit"].'
                   <br>
                   點閱次數更新日期:'.$row["mtime"].'
                </span>
                <p>'.$row["cdesc"].'</p>
                <p><a class="btn btn-default" href="download.php?classname='.$row["cname"].'" role="button">Go Download &raquo;</a></p>
              </div>'; //將課程的名稱 點擊率 點閱次數更新日期 課程資訊 連結去下載考古題
          }
          
          mysql_free_result($result);
          mysql_close($link);
        ?>
      </div>
      <hr class="featurette-divider">
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>