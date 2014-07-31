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
		$db = mysql_connect("localhost", "islandsupport", "stpecnoc");
	mysql_select_db("islandsupport",$db);
		$idget = mysql_query("SELECT * FROM `clients`",$db);
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
  		
		
		
  $db2 = mysql_connect("localhost", "islandsupport", "stpecnoc");
		mysql_select_db("islandsupport",$db2);
		
  $fullname = mysql_real_escape_string($_POST['fullname']);
  $email = mysql_real_escape_string($_POST['email']);
  $phone = mysql_real_escape_string($_POST['phone']);
  $country = mysql_real_escape_string($_POST['country']);
  $details = mysql_real_escape_string($_POST['details']);
  $pass = mysql_real_escape_string($_POST['pass']);
  $company = mysql_real_escape_string($_POST['company']);
  $hotel = mysql_real_escape_string($_POST['hotel']);
  
  $pieces = explode(" ", $fullname);
  $firstname=$pieces[0];
  $max = count($pieces)-1;
  $lastname=$pieces[$max];
  $datejoined=date("d/m/Y",time());
  
?>
<xmlresponse>
<?php

$rowssql = mysql_query("SELECT * FROM `clients` WHERE `username`='$email'" ,$db2);
		$totalrows = mysql_num_rows($rowssql);
		while ($myrow2 = mysql_fetch_row($rowssql)) {
			echo "<numrows>".$myrow2[0]."</numrows>";
			$employeeid=$myrow2[0];
			}
			
if ($totalrows>0) {

		echo "<msg>".rawurlencode("You are already registered. You can log in to your account to book tours, reserve a table, call a taxi and leave a review.<br><br>")."</msg>";
	echo "<result>good</result>";
	
} else {
	
	$db2 = mysql_connect("localhost", "islandsupport", "stpecnoc");
		mysql_select_db("islandsupport",$db2);
		$codeget = mysql_query("INSERT INTO `clients` VALUES ('$employeeid','$firstname','$lastname','$email','','$email','$pass','$company','$phone','$country','$details','$hotel','$datejoined')",$db2);
		
		echo "<result>good</result>";
	echo "<msg>".rawurlencode("Thank you for registering. You have unlocked the ability to book tours, reserve a table, call a taxi and leave a review.<br /><br />")."</msg>";
	
	$codeget2 = mysql_query("SELECT * FROM `allcountrycodes` WHERE `allcountryid`='$country'",$db2);
	while ($mycountry=mysql_fetch_row($codeget2)) {
		$countryname=$mycountry[1];
	}
	
	$codeget3 = mysql_query("SELECT * FROM `hotelcodes` WHERE `id`='$hotel'",$db2);
	while ($myhotel=mysql_fetch_row($codeget3)) {
		$hotelname=$myhotel[1];
	}	
	
	$to = "islandinteractive@gmail.com";

$subject = "Island Interactive Registration";

$message = '<div style="position:relative; border:1px solid black; background-color:#FFFFFF;padding:10px;height:180px;">
  Registration Details<br />
<br />
Full Name: '.$fullname.'<br />
Email: '.$email.'<br />
Phone: '.$phone.'<br />
Address: '.$company.'<br />
Country: '.$countryname.'<br />
Room: '.$details.'<br />
Hotel: '.$hotelname.'<br />

  </div>';

// To send HTML mail, the Content-type header must be set
			
			
			// Additional headers
			
			$headers = 'From: II Demo Kiosk <support@island-interactive.com>' . "\r\n";
			$headers .= 'Reply-to: support@island-interactive.com' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			//$headers .= 'MIME-Version: 1.0' . "\r\n";
			//$headers .= 'Cc: admin@cflslu.com, customercare@cflslu.com' . "\r\n";
			$headers .= 'Bcc: rschouten@sbwcs.com, messages@island-interactive.com' . "\r\n";
			
			
			
			// Mail it
			mail($to, $subject, $message, $headers);
			//end mailing the registration information

	
}	
?>
</xmlresponse>


