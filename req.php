
<?php
   
  
  $date=$_POST['date'];
  $place=$_POST['place'];
  $fuck=$_POST['fuck'];
  $anon=$_POST['anon'];

   $connect=mysql_pconnect("localhost","u3496625_admin","yfkbbpqjjv");
   mysql_select_db ("u6237881_main");
   if ( !$connect ) die ("Невозможно подключение к MySQL");
  


   


   $query = "INSERT INTO VPUNK (time,place,fuck,anon) VALUES ('".$date."','".$place."','".$fuck."','".$anon."')";
   if ( mysql_query ( $query ) ){
        echo $date."','".$place."','".$fuck."','".$anon;
   }
   else{
      echo mysql_error();
   }
    
   
   mysql_close ( $connect);

?>