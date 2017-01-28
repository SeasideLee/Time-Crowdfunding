<!DOCTYPE html>
<html>
    <html lang="en">
<head>
    <meta charset="UTF-8">
	<title>什么值得膜</title>
	<meta http-equiv="Content-Type" content="text/html; charest=utf-8"/>
	<link rel="icon" href="/shenmezhidemo.ico" type="image/x-icon" /> 
	<link rel="shortcut icon" href="/shenmezhidemo.ico" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" href="button.css" />
</head>
<body>
<?php
    $con = mysql_connect("localhost","root","");
    if (!$con){
        die('Could not connect: ' . mysql_error());
    }
    mysql_select_db("test", $con);
    $result = mysql_query("SELECT * FROM zhidemo");
    while($row = mysql_fetch_array($result)){
        $xumingseconds = $row['seconds'];
    }
?>

<div style="width: 300px; margin-left: auto; margin-right: auto;"><button id="add_1s" onclick="addlife()" class="button button-3d button-action button-pill" style="width:300px; height:80px; margin-top: 300px;"> +1s </button></div>

<script type="text/javascript">
    var lifestelon = 0;
    function addlife() {
        document.getElementById("lifetime").innerHTML++;
        lifestelon++;
    }
    function refresh() {
        var xmlhttp;
        if(lifestelon != 0){
            if (window.XMLHttpRequest){
                xmlhttp=new XMLHttpRequest();
            }
            else{
                xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange=function(){
                if (xmlhttp.readyState==4 && xmlhttp.status==200){
                    document.getElementById("lifetime").innerHTML=xmlhttp.responseText;
                }
            }
            xmlhttp.open("GET","refresh.php?time="+lifestelon,true);
            xmlhttp.send();
            lifestelon=0;
        }
    }
    setInterval("refresh()","1000");
</script>

<br />
<br />
<p id="lifetime" style="text-align:center;"><?php echo $xumingseconds ?></p>
</body>
</html>