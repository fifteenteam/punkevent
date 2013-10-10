


<?php 
include 'conf.php'; 
$qr_result = mysql_query("select * from VPUNK WHERE id=".$_GET["id"]." ");
$data = mysql_fetch_array($qr_result);
echo "<div class='info-wrap curevent-info'>";
preg_match_all("/\S+/", $data['whollcome'],$matches);
$i=0;
$bool=true;

while($matches[0][$i]!=null){
 echo "<a href='#' class='username'  >".$matches[0][$i]."</a>";
 echo "&nbsp&nbsp";
 $i++;

}

echo '</div>';
?>