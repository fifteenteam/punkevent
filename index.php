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
<body onload="AjaxLoadRequest('main-list','http://spbphoto.net/startbl/load-list.php')">
	<?php
// GLOBALS
	$logined=anonimusvasya;
	?>
	<div class="navbar navbar-inverse">
		<div class="navbar-inner">
			<a class="brand" href="#">PUNKDRINK</a>
			<ul class="nav" >
				<li class="dropdown"> 
					<a class="dropdown-toggle" href="#">Факультеты</a>
					<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
						<li><a tabindex="-1" href="#">Мат-Мех</a></li>
						<li><a tabindex="-1" href="#">Физ-Фак</a></li>
						<li><a tabindex="-1" href="#">ПМ-ПУ</a></li>
					</ul>
				</li>
				<li class="dropdown"> <a class="dropdown-toggle" href="#">Места</a>
					<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
						<li><a tabindex="-1" href="#">14 общ</a></li>
						<li><a tabindex="-1" href="#">15 общ</a></li>
						<li><a tabindex="-1" href="#">16 общ</a></li>
					</ul>
				</li>
				<li > <a  href="#">WTF?</a></li>
			</ul>
			<?php
# подключаем конфиг
			include 'phpactions/conf.php';  
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
					echo "LOGINED";
					$logined=$userdata["login"];
				}
			} 
			else 
			{ 
				echo "<a class='btn btn-primary login' data-toggle='modal' href='#login-wind'>Войти</a>";	
				$logined='anonimus';
			}
			?>
			<a class='btn btn-primary login'  href='phpactions/exit.php'>Выйти</a>
		</div>
	</div>
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
			<div class="modal" id="org-wind" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h3 id="myModalLabel">Организовать ивент</h3>
				</div>
				<div class="modal-body">
					<form id="orgform" enctype = 'multipart/form-data'>
						<fieldset>
							<label>Дата</label>
							<input name="date" type="date" placeholder="">
							<label>Место</label>
							<input name="place" type="text" placeholder="Введите текст…">
							<div>
								<label class="textarea-label" >Анонс</label>
								<textarea name="anon" class="textarea-org"type="text" placeholder="Введите текст…"></textarea>
								<label>хэштег</label>
								<input  name="fuck" type="text" placeholder="Введите текст…">
							</fieldset>
						</div>
						<div class="modal-footer">
						</form>
						<button type="submit" data-dismiss="modal" aria-hidden="true" class="btn btn-primary" onclick="AjaxFormRequest('<?php echo $logined;?>',1, 'orgform', 'phpactions/req.php?'); AjaxLoadRequest('main-list','load-list.php');" >Создать</button>	 						</div>
					</div>
					<div class="row main-row first-row">
						<div class="span2">
						</div>
						<div class="span5 spanfirst" id="main">
							<div class="list-Header">
								<h1>Ивенты</h1>
							</div>
							<div class="org-wrap">
								<a data-toggle="modal" href="#org-wind" class="btn btn-primary org" >Организовать ивент</a>
							</div>						
						</div>
						<div class="span3 spanfirst" id="main">
						</div>
						<div class="span2 ">
						</div>
					</div>   
					<div class="row main-row second-row">
						<div class="span2"></div>
						<div class="span5" id="main-list">
							<!-- //main-list -->
						</div>
						<div class="span3" id="main">
							<div class="block firstwin">
								<div class="header">
									<p class="pull-left">Присоединяйся!</p>
								</div>
								<div class="ktogde">
									<p>	
										<a href="#" class="username">Vasya</a>
										<span>&nbsp&nbsp&nbspСейчас&nbsp&nbsp&nbsp</span>
										<a class=""href="#">tut</a>
									</P>
									<p>
										<a href="#" class="username">Vasya</a>
										<span>&nbsp&nbsp&nbspСейчас&nbsp&nbsp&nbsp</span>
										<a class=""href="#">tut</a>
									</P>
									<p>
										<a href="#" class="username">Vasya</a>
										<span>&nbsp&nbsp&nbspСейчас&nbsp&nbsp&nbsp</span>
										<a class=""href="#">tut</a>
									</P>       	
								</div>
							</div>
							<div class="block secondwin">
								<div class="header">
									<p class="pull-left">Медиа</p>
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
     		<div class="span2">
     		</div>
     	</div>
     </div>
 </body>
 </html>