<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php
    include ("configure.php");
    $file_name = iconv('utf-8','big5', $_FILES["myfile"]["name"]);
    if($_FILES['myfile']['error']>0) //判斷檔案有沒有上傳成功
    {
        echo "檔案上傳失敗<br />";
        echo "Error: " . $_FILES["myfile"]["error"];
    }
    else if(file_exists("image/cover/$file_name")) //判斷檔案有沒有重複上傳
    {
        echo "檔案已存在，請勿重複上傳相同課程";
    }
    else //檔案上傳
    {
        $upfilename = $_POST[cname].".".split ('\.', $_FILES['myfile']['name'])[1];
        move_uploaded_file($_FILES['myfile']['tmp_name'], 'image/cover/'.$upfilename);
        echo "檔案連結：".'<a href="image/cover/'.$_POST[cname].'/'.$_FILES['myfile']['name'].'">'.$_FILES["myfile"]["name"].'</a>';
        echo "<br />";
        echo "副檔名：".pathinfo('uploads/'.$_FILES['myfile']['name'], PATHINFO_EXTENSION)."<br />";
        echo "類型：".$_FILES['myfile']['type']."<br />";
        echo "大小：".iconv('utf-8','big5',(round($_FILES['myfile']['size']/1024,2)))."KB<br />";
        // $dname = 
        $link = mysql_connect($hostname, $username, $password) OR die("Unable to connect to database");
	  	if ($link)
	    	mysql_select_db($database);
	  	else
	  	  die("Unable to select database");
		mysql_query("SET NAMES utf8");
        $query = "INSERT INTO `course` (cname, cdesc) VALUES ('$_POST[cname]', '$_POST[cdesc]')";
		$result = mysql_query($query) or die("Connect DB Table Error!".mysql_error());
    }
?>