<?php

include 'conf.php'; 

$data = mysql_fetch_array(mysql_query("SELECT * from VPUNK WHERE id='".$_GET['id']."'"));
// print_r($qr_result);

$bool=true;
preg_match_all("/\S+/", $data['whollcome'],$matches);
$i=0;
while($matches[0][$i]!=null){
	if( $matches[0][$i]==$_GET["user"]){
		$bool=false;
	}     				   				
	$i++;
}

if($bool){
	mysql_query("UPDATE VPUNK SET whollcome='".$data["whollcome"]." ".$_GET["user"]."' WHERE id='".$_GET['id']."'");
	echo "Я не пойду";
}
else{
	$newhollcome=preg_replace("/ ".$_GET["user"]."/", "", $data["whollcome"]);
	//echo $newhollcome;
	mysql_query("UPDATE VPUNK SET whollcome='".$newhollcome."' WHERE id='".$_GET['id']."'");
	echo "Я пойду!";
}
?>