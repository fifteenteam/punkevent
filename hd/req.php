<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<title>OK</title>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
<?php
   
   // Проверяем загружен ли файл
   if(is_uploaded_file($_FILES["filename"]["tmp_name"]))
   {
     // Если файл загружен успешно, перемещаем его
     // из временной директории в конечную
     move_uploaded_file($_FILES["filename"]["tmp_name"], "img/".$_FILES["filename"]["name"]);
     $img="img/".$_FILES["filename"]["name"];
   }
   $text=$_POST['quest'];

   $connect=mysql_pconnect("localhost","u6237881_y","korollo0715garf");
   mysql_select_db ("u6237881_1");
   if ( !$connect ) die ("Невозможно подключение к MySQL");
  


   


   $query = "INSERT INTO helpdesk VALUES ('".$text."','".$img."')";
   if ( mysql_query ( $query ) ){
    echo "Вопрос отправлен";
   }
   else{
    echo mysql_error();
   }
    
    echo "<a href='index.php' style='margin: 100px 0 0 100px; font-size: 30px;'>Вернуться назад</a>";
   mysql_close ( $connect);

?>
</body>
</html>