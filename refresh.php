<?php
	$time = $_GET["time"];
	$con = mysql_connect("localhost","root","");
	if (!$con){
  		die('Could not connect: ' . mysql_error());
  	}
  	mysql_select_db("test", $con);
  	mysql_query("UPDATE zhidemo SET seconds = seconds + $time WHERE seconds > 0");
  	$result = mysql_query("SELECT * FROM zhidemo");
	while($row = mysql_fetch_array($result)){
  		$xumingseconds = $row['seconds'];
  	}
  	echo $xumingseconds;
?>
