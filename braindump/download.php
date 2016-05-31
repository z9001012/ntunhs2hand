<!DOCTYPE html>
<?php
  include ("configure.php");
  $link = mysql_connect($hostname, $username, $password) OR die("Unable to connect to database");
  if ($link)
    mysql_select_db($database);
  else
    die("Unable to select database");
  mysql_query("SET NAMES utf8");
  $cname = $_GET["classname"];
  $query = "SELECT * FROM `dump` WHERE cname='$cname' ORDER BY `did` ASC LIMIT 0,1000;"; //抓取課程的考古題
  $sql = "SELECT * FROM `course` WHERE cname='$cname';"; //抓取課程的資料
  $result = mysql_query($sql) or die("Connect DB Table Error!");
  $row = mysql_fetch_array($result);
  $row["hit"] += 1;
  $query1 = "UPDATE `course` SET hit='$row[hit]' WHERE cname='$cname';"; //課程的點擊率增加
  $result = mysql_query($query1) or die("Connect DB Table Error!");
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
              <a class="navbar-brand" href="courses.php">NTUNHS Brain</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                <li class="active"><a><?php echo $cname; ?>考題下載</a></li>
              </ul>
            </div>
          </div>
        </nav>
      </div>
    </div>
    <div class="container marketing">
      <table class="table table-hover">
        <thead>
          <tr>
            <td>考題檔案</td>
            <td>考試學年</td>
            <td>指導老師</td>
            <td>提供大神</td>
            <td>可信程度</td>
          </tr>
        </thead>
        <tbody>
        <?php // 將該課程的考題資訊 並且可以選擇下載
          while($row=mysql_fetch_array($result))
          {
            foreach(glob('uploads/'.$cname.'/*.*', GLOB_BRACE | GLOB_NOSORT) as $directory)
            { 
              $folderfile = split ('/', $directory);
              if($folderfile[2]===$row["dname"])
              {
                echo '
                  <tr>
                    <td> <a href="uploads/'.$cname.'/'.$row["dname"].'" download>'.$row["dname"].'</a></td>
                    <td>'.$row["semester"].'</td>
                    <td>'.$row["teacher"].'</td>
                    <td>'.$row["provider"].'</td>
                    <td>'.$row["trust"].'</td>
                  </tr>';
              }
            }
          }
          mysql_free_result($result);
          mysql_close($link);
        ?>
        </tbody>
      </table>
      <!-- <hr class="featurette-divider"> -->
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>