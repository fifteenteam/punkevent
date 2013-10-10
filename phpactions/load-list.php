<?php
$connect=mysql_pconnect("localhost","u3496625_admin","yfkbbpqjjv");
mysql_select_db ("u3496625_main");
if ( !$connect ) die ("Невозможно подключение к MySQL");
$qr_result = mysql_query("select * from VPUNK ORDER BY  `VPUNK`.`time` DESC ");
$counter=0;
while($data = mysql_fetch_array($qr_result)){ 
	$counter=$counter+1;
	echo "<div class='block-list'>";
	?>
	<a class="eventselection" >
		<?php
		echo "<div class='anon-wrap'>";
		echo "<p>".$data['anon']."</p>";
		echo '</div>';
		?>

		<div class="sel-event" id="sel-event">
		</div>

	</a>
	<?php
	echo "<div class='sub'>";
	?>

	<?php
	echo '</div>';

	echo "<div class='info-wrap'>";
	echo "<div class='date-wrap'><a href='#'>".$data['time']."</a></div>&nbsp&nbsp&nbsp<a href='#'>".$data['place']."</a>&nbsp&nbsp&nbsp<a href='#'>".$data['fuck']."</a>&nbsp&nbsp&nbsp<a href='#' style='' >".$data['user']."</a>";
	echo '</div>';
	echo "<div class='divider'>";
	echo '</div>';


	echo '</div>';



}

// mysql_close($connect);



?>