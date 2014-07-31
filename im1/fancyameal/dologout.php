<?php 
setcookie("expirer", "", time() - 13600, "/");
session_start();
session_destroy();
header('Location: http://www.island-interactive.com/index.php');
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Logging Out - Please wait...</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
 <link rel="stylesheet" type="text/css"
href="sbwebstyle.css" />
</head>

<body onload=setTimeout("location.href='http://www.island-interactive.com/index.php'",0)>

</body>
</html>
