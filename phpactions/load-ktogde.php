<?php
include 'conf.php'; 
$qr_result = mysql_query("select * from VPUNK ORDER BY  `VPUNK`.`id` DESC ");
$allcount=0;
$limit=4;
while(($data = mysql_fetch_array($qr_result))  ){ 
	// echo "<a href=".$data["url"]."'>";



	preg_match_all("/\S+/", $data['whollcome'],$curusers);
	$i=0;
	
	if(($allcount<$limit) and ($curusers[0]!=null)){
		echo "<p>";
		echo "<a href='#' class='username'  >".$curusers[0][sizeof($curusers[0])-1]."</a>";
		echo "<span>&nbsp&nbspПосетит</span>&nbsp&nbsp";
		echo "<a href='./currentevent.php?id=".$data['id']."' class=''  >".$data['header']."</a>";
		echo "</p>";
		unset($curusers);
		$allcount++;
	}
	
}


// mysql_close($connect);
?>



	<!-- 	<div class='block-list block<?php echo $data['id']; ?> '>
			<div class="userinfo-list">
				<a class="username"><?php echo $data["user"];?></a>
			</div>
				<a href="currentevent.php?id=<?php echo $data['id']; ?>" class="block-href">
			<div class="anon-wrap">
				
				<img class="img-list" width="150px"; src="<?php echo $data['img']; ?>"></img>
				
				<span>
					<?php echo $data["anon"]; ?>
				</span>
			</div>
				</a>
			<div class="info-list">
				<a><?php echo $data["time"]; ?></a>
				<a><?php echo $data["place"]; ?></a>
			</div>
			<div class="tag-list">
				<a><?php echo $data["fuck"]; ?></a>
			</div>
			<div class="divider"></div>
		</div> -->