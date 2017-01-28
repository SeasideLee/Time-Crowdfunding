<?php
	$time = $_GET["time"];
	$con = mysql_connect("localhost","root","");
	if (!$con){
  		die('Could not connect: ' . mysql_error());
  	}
  	mysql_select_db("test", $con);
  	mysql_query("UPDATE zhidemo SET xuming = xuming + $time WHERE xuming > 0");
?>
