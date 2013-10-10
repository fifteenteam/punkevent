<?php
  # Функция для генерации случайной строки 


  function generateCode($length=6) { 
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPRQSTUVWXYZ0123456789"; 
    $code = ""; 
    $clen = strlen($chars) - 1;   
    while (strlen($code) < $length) { 
        $code .= $chars[mt_rand(0,$clen)];   
    } 
    return $code; 
  } 
  
  # Если есть куки с ошибкой то выводим их в переменную и удаляем куки
  if (isset($_COOKIE['errors'])){
      $errors = $_COOKIE['errors'];
      setcookie('errors', '', time() - 60*24*30*12, '/');
  }

 

include 'conf.php'; 
    # Вытаскиваем из БД запись, у которой логин равняеться введенному 
    $data = mysql_fetch_assoc(mysql_query("SELECT id, pass FROM `VPUNK_users` WHERE `login`='".mysql_real_escape_string($_POST['login'])."' LIMIT 1;")); 
     
    # Соавниваем пароли 
    if($data['pass'] === ($_POST['password'])) 
    { 
      # Генерируем случайное число и шифруем его 
      $hash = md5(generateCode(10)); 
           
      # Записываем в БД новый хеш авторизации и IP 
      mysql_query("UPDATE VPUNK_users SET hash='".$hash."' WHERE id='".$data['id']."'") or die("MySQL Error: " . mysql_error()); 
       
      # Ставим куки 
      setcookie("id", $data['id'], time()+60*60*24*30, '/'); 
      setcookie("hash", $hash, time()+60*60*24*30, '/'); 
      
       header('Location: ../categoryevent.php'); exit();
      # Переадресовываем браузер на страницу проверки нашего скрипта 
      // header("Location: check.php"); exit(); 
    } 
    else 
    { 
      echo "pass incorect".$_POST['login']." ".$_POST['password']; 
    } 
    
?>
 <!--  <form method="POST"> 
  Логин <input name="login" type="text"><br> 
  Пароль <input name="password" type="password"><br> 
  <input name="submit" type="submit" value="Войти"> 
  </form>
  <?php
  # Проверяем наличие в куках номера ошибки
  
  ?> -->