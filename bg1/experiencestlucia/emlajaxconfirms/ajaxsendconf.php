<?php
  header('Content-type: text/xml');
  ?>
  <xmlresponse>
  <?php 
  //standard
  $username=$_POST['username'];
  $calltype=$_POST['calltype'];
  $adid=$_POST['adid'];
  $kioskid=$_POST['kioskid'];
  
  //reviews
  $comments=$_POST['comments'];
  $stars=$_POST['stars'];
  $status="hide";
  
  //bookings, taxis, reservations and schedule
  $datefor=$_POST['datefor'];
  $timefor=$_POST['timefor'];
  $taxicall=$_POST['taxineeded'];
  $bookcomment=$_POST['specialinfo'];
 
	
// time of action
$date=date("m/d/Y",time());
$time=date("H:i:s",time());
$sinceepoch=time();


  //book review taxi addtime
  if ($calltype=="book") {
  $tablename="bookings";
  } else if ($calltype=="review") {
  $tablename="reviews";
  } else if ($calltype=="taxi") {
  $tablename="bookings";
  } else if ($calltype=="addtime") {
  $tablename="bookings";
  }
  
  
  
  // id checker
  function idcheck($employeeid)
		{
		$db2 = mysql_connect("localhost", "islandsupport", "stpecnoc");
		mysql_select_db("islandsupport",$db2);
		$idget = mysql_query("SELECT * FROM `$tablename`",$db2);
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
		
		//$employeeid="test";
		
  
?>

<?php
if (empty($calltype)) {
?>
<result>IT</result>
<result>bad</result>
<result>yes</result>
<msg>It eh good</msg>
<?php
} else	{
	
	
	// send back confirmation messages
	
	if ($username==NULL || $username=="" || empty($username) || !isset($username)) {
		
		if ($calltype=="book" || $calltype=="taxi") {
			
			echo "<msg>".rawurlencode("<strong><br>Thank you ".$_POST['fullname']." for using the Island Interactive Service.<br><br>A representative will contact you shortly <br>to confirm your reservation and give further instructions.</strong><br><br><a href=\"javascript:;\" onclick=\"closePop('thankyoupop')\"><img src=\"../images/button_close.gif\" border=\"0\" /></a>")."</msg>";
			
		} else if ($calltype=="review") {
		
			echo "<msg>".rawurlencode("<strong><br>Thank you ".$_POST['fullname']." for using the Island Interactive Service.<br><br>We thank you for your feedback <br>and hope that you enjoy your stay in St. Lucia.</strong><br><br><a href=\"javascript:;\" onclick=\"closePop('thankyoupop')\"><img src=\"../images/button_close.gif\" border=\"0\" /></a>")."</msg>";
		
		}
	
	} else {
	
		if ($calltype=="book" || $calltype=="taxi") {
			
			echo "<msg>".rawurlencode("<strong><br>Thank you ".$firstname." for using the Island Interactive Service.<br><br>A representative will contact you shortly <br>to confirm your reservation and give further instructions.</strong><br><br><a href=\"javascript:;\" onclick=\"closePop('thankyoupop')\"><img src=\"../images/button_close.gif\" border=\"0\" /></a>")."</msg>";
			
		} else if ($calltype=="review") {
		
			echo "<msg>".rawurlencode("<strong><br>Thank you ".$firstname." for using the Island Interactive Service.<br><br>We thank you for your feedback <br>and hope that you enjoy your stay in St. Lucia.</strong><br><br><a href=\"javascript:;\" onclick=\"closePop('thankyoupop')\"><img src=\"../images/button_close.gif\" border=\"0\" /></a>")."</msg>";
		
		}
	
	}
	
	
	
	//retrieve additional information about users and advertisers
	
	$db = mysql_connect("localhost", "islandhome", "stpecnoc");
		mysql_select_db("islandhome",$db);
		$codeget3 = mysql_query("SELECT * FROM `thiskiosk` WHERE `code`='$kioskid'",$db);
		while ($myrow3 = mysql_fetch_row($codeget3)) {
			$kioskname=addslashes($myrow3[2]);
		}
	
	$db = mysql_connect("localhost", "islandsupport", "stpecnoc");
		mysql_select_db("islandsupport",$db);
		
			if ($username==NULL || $username=="" || empty($username) || !isset($username)) {
					
				$fullname=addslashes($_POST['fullname']);
				$useremail=addslashes($_POST['email']);
				$userphone=addslashes($_POST['phone']);
				$countrycode=addslashes($_POST['country']);
				$room=addslashes($_POST['room']);
				$hotel=addslashes($_POST['hotel']);
				$username=$fullname;
				$fullname=stripslashes($fullname);
				$userid=$useremail;
				
			} else {
		
				$codeget = mysql_query("SELECT * FROM `clients` WHERE `username`='$username'",$db);
				while ($myrow = mysql_fetch_row($codeget)) {
				
				$userid=$myrow[0];
				$firstname=addslashes($myrow[1]);
				$lastname=addslashes($myrow[2]);
				$useremail=addslashes($myrow[3]);
				$userphone=addslashes($myrow[8]);
				$countrycode=addslashes($myrow[9]);
				$room=addslashes($myrow[10]);
				$hotel=addslashes($myrow[11]);
				$fullname=stripslashes($firstname)." ".stripslashes($lastname);
		
				}
		
			}
		
		$codeget3 = mysql_query("SELECT * FROM `allcountrycodes` WHERE `allcountryid`='$countrycode'",$db);
			while ($myrow3 = mysql_fetch_row($codeget3)) {
				$country=$myrow3[1];
			}
			
		$codeget2 = mysql_query("SELECT * FROM `advertisers` WHERE `id`='$adid'",$db);
		while ($myrow2 = mysql_fetch_row($codeget2)) {
			$adname=addslashes($myrow2[1]);
			$email=addslashes($myrow2[2]);
			$phone=addslashes($myrow2[3]);
			$address=addslashes($myrow2[4]);
		}

	
		
	//execute database inserts
		
	if ($calltype=="review") {
		$sqlcheck1 = mysql_query("INSERT INTO `$tablename` VALUES ('$employeeid','$userid','$adid','$kioskid','$date','$time','$sinceepoch','$adname','$kioskname','$username','$room','$hotel','$comments','$stars','$status','$calltype')", $db);
		$totalstars=0;
		$sqlcheck = mysql_query("SELECT * FROM `$tablename` WHERE `adid`='$adid'", $db);
		$rowscheck = mysql_num_rows($sqlcheck);
		while ($myreview = mysql_fetch_row($sqlcheck)) {
			$thisstars = $myreview[13];
			$totalstars += $thisstars;
		}
		$avgstars=round($totalstars/$rowscheck,0);
		
		$sqlcheck5 = mysql_query("UPDATE `advertisers` SET `avgstars`='$avgstars' WHERE `id`='$adid'", $db);
		
	}
	
	if ($calltype=="book" || $calltype=="taxi" || $calltype=="addtime") {
		$sqlcheck1 = mysql_query("INSERT INTO `$tablename` VALUES ('$employeeid','$userid','$adid','$kioskid','$date','$time','$sinceepoch','$adname','$kioskname','$username','$room','$hotel','$datefor','$timefor','$taxicall','$calltype')", $db);
		
	}

	

//mailer
		
		$room=stripslashes($room);
		$hotel=stripslashes($hotel);
		
		$adname=stripslashes($adname);
		$useremail=stripslashes($useremail);
		$userphone=stripslashes($userphone);
		$address=stripslashes($address);
		$country=stripslashes($country);
		
		$kioskname=stripslashes($kioskname);
		
		
		
			$to = "islandinteractive@gmail.com";

		if ($calltype=="review") {
		
			$subject = "Island Interactive Review";
			
			$message = '<div style="position:relative; border:1px solid black; background-color:#FFFFFF;padding:10px;height:180px;">
			  Island Interactive Review<br />
			<br />
			Visitor Information:<br /><br />
			Full Name:&nbsp;'.$fullname.'<br />
			Email:&nbsp;'.$useremail.'<br />
			Phone:&nbsp;'.$userphone.'<br />
			Country:&nbsp;'.$country.'<br />
			Room: '.$room.'<br />
			Accommodation: '.$hotel.'<br />
			<br />
			Message Details<br /><br />
			Sent From Kiosk: '.$kioskname.'<br />
			Sent to Advertiser: '.$adname.'<br />
			Comments: '.$comments.'<br />
			Number of IL Stars: '.$stars.'<br />
			Current Average Stars: '.$avgstars.'<br />
			
			  </div>';
			
			} elseif ($calltype=="book") {
				
				$subject = "Island Interactive Booking";
			
			$message = '<div style="position:relative; border:1px solid black; background-color:#FFFFFF;padding:10px;height:180px;">
			  Island Interactive Booking<br />
			<br />
			Visitor Information:<br /><br />
			Full Name:&nbsp;'.$fullname.'<br />
			Email:&nbsp;'.$useremail.'<br />
			Phone:&nbsp;'.$userphone.'<br />
			Country:&nbsp;'.$country.'<br />
			Room: '.$room.'<br />
			Accommodation: '.$hotel.'<br /><br />
			Booking Details<br /><br />
			Sent From Kiosk: '.$kioskname.'<br />
			Sent to Advertiser: '.$adname.'<br />
			Reservation Date: '.$datefor.'<br />
			Reservation Time: '.$timefor.'<br />
			Taxi Needed?: '.$taxicall.'<br />
			Special Information: '.$bookcomment.'<br />
						
			  </div>';
				
			} elseif ($calltype=="reserve") {
			
				$subject = "Island Interactive Table Reservation";
			
			$message = '<div style="position:relative; border:1px solid black; background-color:#FFFFFF;padding:10px;height:180px;">
			  Island Interactive Table Reservation<br />
			<br />
			Visitor Information:<br /><br />
			Full Name:&nbsp;'.$fullname.'<br />
			Email:&nbsp;'.$useremail.'<br />
			Phone:&nbsp;'.$userphone.'<br />
			Country:&nbsp;'.$country.'<br />
			Room: '.$room.'<br />
			Accommodation: '.$hotel.'<br /><br />
			Reservation Details<br /><br />
			Sent From Kiosk: '.$kioskname.'<br />
			Sent to Advertiser: '.$adname.'<br />
			Reservation Date: '.$datefor.'<br />
			Reservation Time: '.$timefor.'<br />
			Taxi Needed?: '.$taxicall.'<br />
			Special Information: '.$bookcomment.'<br />
						
			  </div>';
			
			} elseif ($calltype=="taxi") {
			
				$subject = "Island Interactive Taxi Call";
			
			$message = '<div style="position:relative; border:1px solid black; background-color:#FFFFFF;padding:10px;height:180px;">
			  Island Interactive Taxi Call<br />
			<br />
			Visitor Information:<br /><br />
			Full Name:&nbsp;'.$fullname.'<br />
			Email:&nbsp;'.$useremail.'<br />
			Phone:&nbsp;'.$userphone.'<br />
			Country:&nbsp;'.$country.'<br />
			Room: '.$room.'<br />
			Accommodation: '.$hotel.'<br /><br />
			Additional Details<br /><br />
			Sent From Kiosk: '.$kioskname.'<br />
			Sent to Advertiser: '.$adname.'<br />
			Reservation Date: '.$datefor.'<br />
			Reservation Time: '.$timefor.'<br />
			Special Information: '.$bookcomment.'<br />
						
			  </div>';
			  
			 } elseif ($calltype=="addtime") {
			
				$subject = "Island Interactive Scheduler";
			
			$message = '<div style="position:relative; border:1px solid black; background-color:#FFFFFF;padding:10px;height:180px;">
			  Island Interactive Add to Schedule<br />
			<br />
			Visitor Information:<br /><br />
			First Name:&nbsp;'.$firstname.'<br />
			Last Name: '.$lastname.'<br />
			Room: '.$room.'<br />
			Accommodation: '.$hotel.'<br /><br />
			Message Details<br /><br />
			Sent From Kiosk: '.$kioskname.'<br />
			Sent to Advertiser: '.$adname.'<br />
			Reservation Date: '.$datefor.'<br />
			Reservation Time: '.$timefor.'<br />
			Special Information: '.$bookcomment.'<br />
						
			  </div>';
			
			}
			// To send HTML mail, the Content-type header must be set
						
						
						// Additional headers
						
						$headers = 'From: II Prototype Kiosk <support@island-interactive.com>' . "\r\n";
						$headers .= 'Reply-to: support@island-interactive.com' . "\r\n";
						$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
						//$headers .= 'MIME-Version: 1.0' . "\r\n";
						//$headers .= 'Cc: admin@cflslu.com, customercare@cflslu.com' . "\r\n";
						$headers .= 'Bcc: rschouten@sbwcs.com, messages@island-interactive.com' . "\r\n";
						
						
						
						// Mail it
						mail($to, $subject, $message, $headers);
						//end mailing the registration information

		
		echo "<result>good</result>";
		
}	
?>
</xmlresponse>


