<?php 

//header('Location: http://localhost/islandinteractive/index.php');

?>
<?php

// server detector

$camefrom = $_GET['cfrom'];

$serverhost=$_SERVER['HTTP_HOST'];

$pos = strrpos($serverhost, "localhost");

if ($pos === false) { // webserver
	$linkurl="http://".$camefrom.".island-interactive.com/";
} else { // localhost
	$linkurl="http://localhost/islandinteractive/";
}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Redirecting</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

</head>

<body onload=setTimeout("location.href='http://common.island-interactive.com/gmapget.php?kid=<? echo $camefrom ?>'",0)>

</body>
</html>
