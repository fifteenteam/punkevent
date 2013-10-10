<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<title>Help You-samara</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
<div class="wraper">
<div class="col">
<h1 class="mainheader">HELP</h1>

 <div class="content">
 	<?php
 	 $connect=mysql_pconnect("localhost","u6237881_y","korollo0715garf");
   	 mysql_select_db ("u6237881_1");
   	 if ( !$connect ) die ("Невозможно подключение к MySQL");
   	  $qr_result = mysql_query("select * from helpdesk");
   	  $counter=0;
while($data = mysql_fetch_array($qr_result)){ 
	$counter=$counter+1;
	echo "<div style='border: 1px solid rgba(0,0,0,0.1); 	'>";
	echo '<h3 style="margin: 0 0 0 10px; color: #999;display:inline-block; ">#'.$counter.'</h3>';
      echo '<div style="margin: 0 0 0 10px;display:inline-block;">';
      
      echo '<h2 style="margin: 0 0 0 0; ">' . $data['text'] . '</h2>';
      if($data['img']!=null){
      	echo '<h3 style="margin: 10px 0 2px 0;">Приклеплено изображение:</h3><a href="' . $data['img'] . '"><img src="'. $data['img'] .'" style="width:60px;display: inline-block;"></img></a>';
      
      }
      echo '</div>';
      echo '</div>';
   }

mysql_close($connect);



 	?>
 </div>

 <div class="question">
<form class="form" action = "req.php" method = "post" enctype = 'multipart/form-data'>
<h3 style="margin-bottom: 0px">Ваш вопрос:</h3>	
	<div class="itext">
<textarea class="input"  type="text" name="quest"></textarea>
</div>
<div class="file">
 <h3 class="prekrhead">Прикрепить изображение</h3><input type="file" name="filename">
 </div>
<div class="submit">
<input type="submit" value="Отправить">
</div>

</form>
 </div>
</div>
</div>
</body>
</html>