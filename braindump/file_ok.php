<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php
    include ("configure.php");
	if (!is_dir("uploads/$_POST[course]")) //檢察upload資料夾是否存在
	{      
	  if (!mkdir("uploads/$_POST[course]"))  //不存在的話就創建upload資料夾
	    die ("上傳目錄不存在，並且創建失敗");
	}
    $file_name = iconv('utf-8','big5', $_FILES["myfile"]["name"]);
    $upfilename = split ('\.', $_FILES['myfile']['name'])[0]."_".$_POST[provider]."_".$_POST[semester].".".split ('\.', $_FILES['myfile']['name'])[1];
    if($_FILES['myfile']['error']>0)
    {
        echo "檔案上傳失敗<br />";
        echo "Error: " . $_FILES["myfile"]["error"];
    }
    else if(file_exists("uploads/$_POST[course]/".$upfilename)) //判斷檔案有沒有重複上傳
    {
        echo "檔案已存在，請勿重複上傳相同檔案";
    }
    else //檔案上傳
    {
        move_uploaded_file($_FILES['myfile']['tmp_name'], 'uploads/'.$_POST[course].'/'.$upfilename);
        echo "檔案連結：".'<a href="uploads/'.$_POST[course].'/'.$upfilename.'">'.$upfilename.'</a>';
        echo "<br />";
        echo "副檔名：".pathinfo('uploads/'.$upfilename, PATHINFO_EXTENSION)."<br />";
        echo "類型：".$_FILES['myfile']['type']."<br />";
        echo "大小：".iconv('utf-8','big5',(round($_FILES['myfile']['size']/1024,2)))."KB<br />";
        $link = mysql_connect($hostname, $username, $password) OR die("Unable to connect to database");
	  	if ($link)
	    	mysql_select_db($database);
	  	else
	  	  die("Unable to select database");
        // $dumpname = $_FILES['myfile']['name'];
		mysql_query("SET NAMES utf8");
		$query = "INSERT INTO `dump` (cname, dname, teacher, type, semester, provider, trust) 
				  VALUES ('$_POST[course]', '$upfilename', '$_POST[teacher]', '$_POST[type]',
			  		      '$_POST[semester]', '$_POST[provider]', '$_POST[trust]')";
		$result = mysql_query($query) or die("Connect DB Table Error!".mysql_error());
    }
?>