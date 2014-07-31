<?php
  header('Content-type: text/xml');
  
		// id generator
		$idnum = rand(100000, 999999);
		$employeeid = "$idnum";
		list ($idchecker, $iderror) = idcheck($employeeid);
		$employeeid = $idchecker;
		if ($iderror == "checkagain") {
			while ($iderror = "checkagain") {
			list ($idchecker, $iderror) = idcheck($employeeid);
			$employeeid = $idchecker;
				if ($iderror == "none") {
				break 1; 
				}
			}
		}
		
		// id checker
		function idcheck($employeeid)
		{
		$db = mysql_connect("localhost", "cawningsupport", "stpecnoc");
	mysql_select_db("cawningsupport",$db);
		$idget = mysql_query("SELECT * FROM `users`",$db);
		if (mysql_num_rows($idget)==0) {
			$error = "none";
			return array ($employeeid, $error);
			} else {	
		while ($myrow = mysql_fetch_row($idget)) {
				$existingid = $myrow[0];
				if ($existingid == $employeeid) {
				$idnum = rand(100000, 999999);
				$employeeid = "$idnum";
				$error = "checkagain";
				return array ($employeeid, $error);
				} else {
				$error = "none";
				return array ($employeeid, $error);
				}
		}
		}
		}

		
		// id generator
		$incidnum = rand(100000, 999999);
		$incid = "$incidnum";
		list ($idchecker, $iderror) = idcheck2($incid);
		$incid = $idchecker;
		if ($iderror == "checkagain") {
			while ($iderror = "checkagain") {
			list ($idchecker, $iderror) = idcheck2($incid);
			$incid = $idchecker;
				if ($iderror == "none") {
				break 1; 
				}
			}
		}
		
		// id checker
		function idcheck2($incid)
		{
		$db = mysql_connect("localhost", "cawningsupport", "stpecnoc");
	mysql_select_db("cawningsupport",$db);
		$idget = mysql_query("SELECT * FROM `questions`",$db);
		if (mysql_num_rows($idget)==0) {
			$error = "none";
			return array ($incid, $error);
			} else {	
		while ($myrow = mysql_fetch_row($idget)) {
				$existingid = $myrow[1];
				if ($existingid == $incid) {
				$incidnum = rand(100000, 999999);
				$incid = "$incidnum";
				$error = "checkagain";
				return array ($incid, $error);
				} else {
				$error = "none";
				return array ($incid, $error);
				}
		}
		}
		}

  
  $db2 = mysql_connect("localhost", "cawningsupport", "stpecnoc");
		mysql_select_db("cawningsupport",$db2);
		
  $fullname = mysql_real_escape_string($_POST['fullname']);
  $email = mysql_real_escape_string($_POST['email']);
  $phone = mysql_real_escape_string($_POST['phone']);
  $country = mysql_real_escape_string($_POST['country']);
  $details = mysql_real_escape_string($_POST['details']);
  $pass = "";//mysql_real_escape_string($_POST['pass']);
  $company = mysql_real_escape_string($_POST['company']);
  $category="na";


	 $mailgroup="46";
  $pieces = explode(" ", $fullname);
  $firstname=$pieces[0];
  $max = count($pieces)-1;
  $lastname=$pieces[$max];
  $datejoined=date("y/m/d",time());
  
?>
<xmlresponse>
<?php

$rowssql = mysql_query("SELECT * FROM `users` WHERE `username`='$email'" ,$db2);
		$totalrows = mysql_num_rows($rowssql);
		while ($myrow2 = mysql_fetch_row($rowssql)) {
			echo "<numrows>".$myrow2[0]."</numrows>";
			$employeeid=$myrow2[0];
			$mypass=$myrow2[6];
			}
			
if ($totalrows>0) {
	$db2 = mysql_connect("localhost", "cawningsupport", "stpecnoc");
		mysql_select_db("cawningsupport",$db2);
		$codeget = mysql_query("INSERT INTO `questions` VALUES ('$employeeid','$incid','$category','$details')",$db2);
				if (!empty($mypass)) {
				echo "<msg>".rawurlencode("Thank you for contacting us. You can log in to your account to track this incident.<br><br>")."</msg>";
				} else {
				echo "<msg>".rawurlencode("Thank you for contacting us. Please check your email for a copy of your request and incident number.<br><br>")."</msg>";
				}
				echo "<result>good</result>";
} else {
	
	$db2 = mysql_connect("localhost", "cawningsupport", "stpecnoc");
		mysql_select_db("cawningsupport",$db2);
		$codeget = mysql_query("INSERT INTO `users` VALUES ('$employeeid','$fullname','$phone','$country','$company','$email','$pass')",$db2);
		$codeget = mysql_query("INSERT INTO `questions` VALUES ('$employeeid','$incid','$category','$details')",$db2);
		$codeget = mysql_query("INSERT INTO `mailinglist` VALUES ('$email','$firstname','$lastname','$datejoined','yes','$mailgroup','$employeeid')",$db2);
		echo "<result>good</result>";
	echo "<msg>".rawurlencode("Thank you for contacting us. Please check your email for a copy of your request and incident number.<br /><br />")."</msg>";
}	
?>
</xmlresponse>


