<?php 
session_start();
session_destroy();
setcookie("expirer", "", time() - 13600, "/");
//header('Location: http://localhost/islandinteractive/index.php');
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Logging Out - Please wait...</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script type="text/javascript">
function setCookie2(c_name,value,mins) {
	var today=new Date();
	var expire = new Date();
	expire.setTime(today.getTime() - 60000*mins);
	document.cookie=c_name+ "=" +escape(value)
	+ ";expires="+expire.toGMTString();
	}
	

</script>
</head>

<body onload=setTimeout("location.href='http://localhost/islandinteractive/index.php'",0)>
<script type="text/javascript">
setCookie2('expirer','',120);
</script>
</body>
</html>
