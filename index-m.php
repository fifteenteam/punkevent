<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link type="text/css" rel="stylesheet" href="css/style.css"></link>
</head>
<body>
	<div class="globwrapper">
	<div class="wrapper">
		<div class="content">
			<div class="mainHeader">
				<h1>ТУСЫ И ВПИСКИ ПУНКа</h1>
			</div>
			<div class="menu">
			</div>
			<div class="list">
			<?php
 	 $connect=mysql_pconnect("localhost","u3496625_admin","yfkbbpqjjv");
   	 mysql_select_db ("u3496625_main");
   	 if ( !$connect ) die ("Невозможно подключение к MySQL");
   	  $qr_result = mysql_query("select * from VPUNK");
   	  $counter=0;
while($data = mysql_fetch_array($qr_result)){ 
	$counter=$counter+1;
	echo "<div class='block' style=''>";
	echo '<a href="#" class="time">'.$data['time'].'</a>';
	echo '<a href="#"class="place" >'.$data['place'].'</a>';
    echo '<a href="#" class="fuck">'.$data['fuck'].'</a>';
        echo '<div class="anonWrapper"><h3 class="anon"style="">'.$data['anon'].'</h3></div>';
    
      echo '</div>';
   }

mysql_close($connect);



 	?>
 	</div>	
</div>
	<div class="new">
		<form class="form" action = "req.php" method = "post" enctype = 'multipart/form-data'>
		<h2 class="newHead" style="">Организовать движуху:</h2>
		<div class="right">	
			<h3>Дата:</h3><input class="timepick" type="date" name="time">
		</div>
		<div class="right">	
			<h3>Место:</h3><input class="placepick" type="text" name="place">
		</div>
		<div class="right">	
			<h3>Факультет:</h3><input class="fuckpick" type="text" name="fuck">
		</div>
		<div class="right2">	
			<h3>Коментарий:</h3>
			<textarea class="anonpick" type="text" name="anon"></textarea>
		</div>
		<div class="right2">	
		
			<input class="submit" type="submit" value="Отправить">
		</div>
		</form>
	</div>
</div>
		
</div>
</div>
</body>
</html>