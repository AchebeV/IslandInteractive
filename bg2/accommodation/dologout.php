<?php 
setcookie("expirer", "", time() - 13600, "/");
session_start();
session_destroy();
header('Location: http://localhost/islandinteractive/index.php');
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Logging Out - Please wait...</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body onload=setTimeout("location.href='http://localhost/islandinteractive/index.php'",0)>

</body>
</html>
