<?php

  header('Content-type: text/xml'); 
  $db2 = mysql_connect("localhost", "islandsupport", "stpecnoc");
		mysql_select_db("islandsupport",$db2);
		
  $password= mysql_real_escape_string($_POST['pass']);
	$user= mysql_real_escape_string($_POST['user']);
	

//verification functions ===============================================================================
function seekercheck($user)

{

$db = mysql_connect("localhost", "islandsupport", "stpecnoc");
	mysql_select_db("islandsupport",$db);

$userget = mysql_query("SELECT * FROM `clients`",$db);

while ($myrow = mysql_fetch_row($userget)) {
	
		$existinguser = $myrow[5];

		if ($myrow[5] == $user) {
		
		$existinguser = $myrow[5];		

		return $existinguser;
		
		}		

}

}


function seekerpasswordcheck($password, $user)

{

$db = mysql_connect("localhost", "islandsupport", "stpecnoc");
	mysql_select_db("islandsupport",$db);

$passwordget = mysql_query("SELECT * FROM `clients` WHERE username='$user'",$db);

while ($myrow = mysql_fetch_row($passwordget)) {
	
		$existingpassword = $myrow[6];

		if ($myrow[6] == $password) {
		
		$existingpassword = $myrow[6];		

		return $existingpassword;		

		}

}

}


?>
<xmlresponse>
<?php
if (!empty($switch)) {

} else	{ 


$db2 = mysql_connect("localhost", "islandsupport", "stpecnoc");
		mysql_select_db("islandsupport",$db2);
		
// verify user

	if ($user) {

		$usercheckresult = seekercheck($user);

		if ($usercheckresult == $user) {
			
			if ($password) {
			
			$passwordcheckresult = seekerpasswordcheck($password, $user);
			
				if ($passwordcheckresult == $password) {  
				
				
						$db = mysql_connect("localhost", "islandsupport", "stpecnoc");
						mysql_select_db("islandsupport",$db);
						
						$userget = mysql_query("SELECT * FROM `clients` WHERE username='$user'",$db);
						
						while ($myrow = mysql_fetch_row($userget)) {
											
						echo "<result>good</result>";
						echo "<msg>".rawurlencode("Welcome&nbsp;back&nbsp;".$myrow[1]."<br>#&nbsp;".$myrow[10].",&nbsp;".$myrow[11])."</msg>";
						echo "<clientid>".$myrow[0]."</clientid>";
					
						}
						
				} else {
				echo "<result>pass</result>";
				echo "<msg>".rawurlencode("You entered an incorrect password<br><br>Please try again...")."</msg>";
				}
			} else {
			echo "<result>nopass</result>";
			echo "<msg>".rawurlencode("You did not enter a password<br><br>Please wait...")."</msg>";
			}
		} else {
		echo "<result>notuser</result>";
		echo "<msg>".rawurlencode("The email address does not seem to be registered<br><br>Please try again...")."</msg>";
		}
	} else {
	echo "<result>nouser</result>";
	echo "<msg>".rawurlencode("You did not enter an email address<br><br>Please wait...")."</msg>";
	}

?>

	<?php	
}	
?>
</xmlresponse>


