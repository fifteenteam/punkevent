<?php
$connect=mysql_pconnect("localhost","u3496625_admin","yfkbbpqjjv");
mysql_select_db ("u3496625_main");
if ( !$connect ) die ("Невозможно подключение к MySQL");
$qr_result = mysql_query("select * from VPUNK ORDER BY  `VPUNK`.`id` DESC ");
while($data = mysql_fetch_array($qr_result)){ 
	// echo "<a href=".$data["url"]."'>";
	?>
	<div class='block-list'>
		<div class="userinfo-list">
			<a class="username"><?php echo $data["user"];?></a>
		</div>
		<div class="anon-wrap">
			<!-- <div class="img-layout"> -->
			<img class="img-list" src="<?php echo $data['img']; ?>"></img>
			<!-- </div> -->
			<span>
				<?php echo $data["anon"]; ?>
			</span>
		</div>
		<div class="info-list">
			<a><?php echo $data["time"]; ?></a>
			<a><?php echo $data["place"]; ?></a>
		</div>
		<div class="tag-list">
			<a><?php echo $data["fuck"]; ?></a>
		</div>
		<div class="divider"></div>
	</div>
	<?php 
	// echo "</a>";
}
// mysql_close($connect);
?>

