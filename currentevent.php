<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link href="css/bootstrap.css" rel="stylesheet" media="screen">
	<link href="css/bstyle.css" rel="stylesheet" media="screen">
	<link href="css/stas.css" rel="stylesheet" media="screen">
	<script src="js/jquery-1.10.2.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/ajax.js"></script>
	<script src="js/anim.js"></script>
	<script>
	$(function() {
		$('.dropdown-toggle').dropdown();
	});
	</script>
</head>
<body onload=" AjaxLoadRequest('ktogde','phpactions/load-ktogde.php');  AjaxImGoRequest('curevent-whollcome', '<?php echo $userdata["login"]; ?>','<?php echo $_GET['id']; ?>', 'phpactions/load-whollcome.php') ;">

	<?php $fullload=0; ?>

	<!-- vasya -->
	<?php
	include 'phpactions/conf.php'; 
	$qr_result = mysql_query("select * from VPUNK WHERE id=".$_GET["id"]." ");
	$counter=0;
	$data = mysql_fetch_array($qr_result);
// GLOBALS
	$logined=anonimus;
	?>
	<div class="navbar navbar-inverse">
		<div class="navbar-inner">
			<a class="brand" href="#">SPbSU-EVENT</a>
			<ul class="nav" >
				<li > 
					<a style="color: #DD5440">>&nbsp&nbsp&nbsp
						<?php echo $data["header"]; ?>
						&nbsp
					</a>
					
				</li>
				
				<li > <a  href="#">WTF?</a></li>
			</ul>
			<?php
			if (isset($_COOKIE['id']) and isset($_COOKIE['hash'])){ ?>
			<a class='btn btn-primary login'  href='phpactions/exit.php'>Выйти</a>
			<?php
		}
		?>
		<a class='username' style='float: right; margin: 10px 20px 10px 0; font-size: 20px'>
			<?php
# подключаем конфиг

# проверка авторизации	
			if (isset($_COOKIE['id']) and isset($_COOKIE['hash'])) 
			{    
				$userdata = mysql_fetch_assoc(mysql_query("SELECT * FROM VPUNK_users WHERE id = '".intval($_COOKIE['id'])."' LIMIT 1"));
				if(($userdata['hash'] !== $_COOKIE['hash']) or ($userdata['id'] !== $_COOKIE['id'])) 
				{ 
					setcookie('id', '', time() - 60*24*30*12, '/'); 
					setcookie('hash', '', time() - 60*24*30*12, '/');
					setcookie('errors', '1', time() + 60*24*30*12, '/');
					exit();
					echo "<a class='btn btn-primary login' data-toggle='modal' href='#login-wind'>Войти</a>";
					$logined='anonimus';
				} 
				else if( ($userdata['hash'] == $_COOKIE['hash']) and ($userdata['id'] == $_COOKIE['id']) ){
					echo $userdata['login'];
					$logined=$userdata["login"];
				}
			} 
			else 
			{ 
				echo "<a class='btn btn-primary login' data-toggle='modal' href='#login-wind'>Войти</a>";	
				$logined='anonimus';
			}
			?>
		</a>
		<?php
		if ($userdata["login"]!=null){ ?>
		<span class="login" style="color: #888">Вы вошли как:&nbsp</span>
		<?php
	}
	?>

</div>
</div>

<a id="aside" class=' btn btn-primary aside-a'onclick="history.back()">Назад</a>
<div class="container" >

	<div class="modal" id="login-wind" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h3 id="myModalLabel">Войти с помощью</h3>
		</div>
		<div class="modal-body">
			<p>Вконтакте</p>
			<p>FaceBook</p>
			<p>Twitter</p>
			<h3 id="myModalLabel">Войти</h3>
			<form id="loginform" action = "phpactions/login.php" method = "post">
				<fieldset>
					<label>Логин</label>
					<input name="login" type="text" placeholder="">
					<label>Пароль</label>
					<input name="password" type="text" placeholder="">
					<div class="modal-footer">
						<!-- <button type="submit" data-dismiss="modal" aria-hidden="true" class="btn btn-primary" onclick="AjaxFormRequest('0',1','loginform', 'phpactions/login.php?');  AjaxLoadRequest('main-list','load-list.php');">Войти</button> -->
						<input type="submit"  class="btn btn-primary" value="Войти">
					</form>
				</div>
			</div>
			<div class="modal-footer">
				<button class="btn" data-dismiss="modal" aria-hidden="true">Закрыть</button>
			</div>
		</div>

		<div class="row main-row first-row">
			<div class="span2">
			</div>
			<div class="span5 spanfirst block nopoint" id="main">
				<div class="list-Header">

					<div class="org-wrap">

						<!-- <a data-toggle="modal" href="#org-wind" class="btn btn-primary org" >Организовать ивент</a> -->
					</div>
					<h1 class="curevent-header">
						<?php


						echo $data["header"];									
						?>

					</h1>
				</div>

			</div>
			<div class="span3 spanfirst" id="main">
			</div>
			<div class="span2 ">
			</div>
		</div>  
		<div class="row main-row second-row">
			<div class="span2">
			</div>
			<div class="span5 spanfirst block nopoint" id="main">
				<div class="list-Header">
					<img stile="width: 100px; float: left;" src="<?php echo $data["img"];?>"></img>
					<p class="curevent-anon"><?php echo $data["anon"];?> </p>
					<?php preg_match_all("/\S+/", $data['fuck'],$matches);
					$i=0;
					while($matches[0][$i]!=null){
						echo "<a href='#' style='float: left; margin: 0 10px 0 10px'  >".$matches[0][$i]."</a>";
						echo "&nbsp&nbsp";
						$i++;
					}
					?>

				</div>

			</div>
			<div class="span3 spanfirst" id="main">
				<div class="block firstwin">
					<div class="header">
						<p class="">Присоединяйся!</p>
					</div>


					<div class="ktogde" id="ktogde">

					</div>
				</div>
				<div class="block secondwin">
					<div class="header">
						<p class="">Фото-Поток</p>
					</div>
					<div class="imggallery">

						<?php
  							$dir = 'media/'; // Папка с изображениями
 							$files = scandir($dir); // Берём всё содержимое директории
  							for ($i = 0; $i < count($files); $i++) { // Перебираем все файлы
    						if (($files[$i] != ".") && ($files[$i] != "..")) { // Текущий каталог и родительский пропускаем
     						 echo "<div class='img-wrap'>"; // Начинаем столбец
     						 $path = $dir.$files[$i]; // Получаем путь к картинке
     						 echo "<img src='".$path."' alt='' style='height: 64px;' />"; // Вывод превью картинки
     						 echo "</div>";
     						}
     					}
     					?>
     				</div>

     			</div>

     		</div>
     		<div class="span2 ">
     		</div>
     	</div> 
     	<div class="row main-row third-row">
     		<div class="span2">
     		</div>
     		<div class="span5 spanfirst block nopoint" id="main">
     			<h1 class="curevent-header">Когда? Где?</h1>
     			<?php echo "<div class='info-wrap curevent-info'>";
     			echo "<a href='#'>".$data['time']."</a>&nbsp&nbsp&nbsp<a href='#'>".$data['place']."</a>&nbsp&nbsp&nbsp";

     			
     			echo "&nbsp&nbsp&nbsp<a href='#' class='username' style='float: right;' >".$data['user']."</a><span style='float: right'>Организовал&nbsp&nbsp</span>";;
     			echo '</div>';
     			?>
     		</div>
     		<div class="span3 spanfirst disable-span" id="main">

     		</div>
     		<div class="span2 ">
     		</div>
     	</div> 
     	<div class="row main-row third-row">
     		<div class="span2">
     		</div>
     		<div class="span5 spanfirst block" id="main">
     			<?php 
     			// echo "<div class='info-wrap curevent-info'>";
     			preg_match_all("/\S+/", $data['whollcome'],$matches);
     			$i=0;
     			$bool=true;
     			while($matches[0][$i]!=null){
     				// echo "<a href='#' class='username'  >".$matches[0][$i]."</a>";
     				// echo "&nbsp&nbsp";
     				if($matches[0][$i]==$userdata["login"]){
     					$bool=false;
     				}
     				$i++;
     			}// echo '</div>';
     			?>
     			<h1 class="curevent-header">Кто идет?</h1>
     			<div class='info-wrap curevent-info' id="curevent-whollcome">

     				<!-- here -->


     			</div>

     			<!-- here -->

     			<div style="text-align: right">
     				<?php if($bool and $userdata["login"]!=null){ ?>
     				<button id="imgo" class="btn btn-primary" style="margin-right: 10px" onclick="AjaxImGoRequest('imgo','<?php echo $userdata["login"]; ?>', '<?php echo $_GET['id']; ?>', 'phpactions/imgo.php'); AjaxImGoRequest('curevent-whollcome', '<?php echo $userdata["login"]; ?>','<?php echo $_GET['id']; ?>', 'phpactions/load-whollcome.php') ;">Я пойду!</button>
     				<?php }
     				else if(!$bool and $userdata["login"]!=null){ ?>
     				<button id="imgo" class="btn btn-primary" style="margin-right: 10px" onclick="AjaxImGoRequest('imgo','<?php echo $userdata["login"]; ?>', '<?php echo $_GET['id']; ?>', 'phpactions/imgo.php'); AjaxImGoRequest('curevent-whollcome', '<?php echo $userdata["login"]; ?>','<?php echo $_GET['id']; ?>', 'phpactions/load-whollcome.php') ;">Я не пойду</button>
     				<?php
     			}

     			?>

     		</div>


     	</div>
     	<div class="span3 spanfirst disable-span" id="main">

     	</div>
     	<div class="span2 ">
     	</div>
     </div> 

 </div>
</div>
<div class="span2">
</div>
</div>
</div>

</body>
</html>