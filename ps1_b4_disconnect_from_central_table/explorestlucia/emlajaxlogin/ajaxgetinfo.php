<?php
  header('Content-type: text/xml');
  
  $clientid= "254652";//$_POST['clientid'];
    
?>
<xmlresponse>
<?php
if (empty($clientid)) {
?>
<result>IT</result>
<result>bad</result>
<result>yes</result>
<?php
} else	{
	
	$itemtotal=0;
	$invoicetotal=0;
	$totalhits=0;
	$totalviews=0;
	
	$db = mysql_connect("localhost", "sbwcssupport", "stpecnoc");
		mysql_select_db("sbwcssupport",$db);
		$codeget = mysql_query("SELECT * FROM `clients` WHERE `userid`='$clientid'",$db);
		while ($myrow = mysql_fetch_row($codeget)) {
		echo "<firstname>".$myrow[1]."</firstname>";
		echo "<lastname>".$myrow[2]."</lastname>";
		
			$codeget2 = mysql_query("SELECT * FROM `client_details` WHERE `id`='$clientid'",$db);
			while ($myrow2 = mysql_fetch_row($codeget2)) {
			echo "<renewaldate>".$myrow2[1]."</renewaldate>";
			}
			//get invoice total
			$codeget3 = mysql_query("SELECT * FROM `inv".$clientid,$db);
			while ($myrow3 = mysql_fetch_row($codeget3)) {
			$item=$myrow3[0];
			$quantity=$myrow3[1];
				
				$codeget4 = mysql_query("SELECT * FROM `products` WHERE `item`='$item'",$db);
				while ($myrow4 = mysql_fetch_row($codeget4)) {
				$price=$myrow4[3];
				$unit=$myrow4[4];
				}
			
			$itemtotal=$quantity*$price;
			$invoicetotal+=$itemtotal;
				
			}
			echo "<invoicetotal>".$invoicetotal."</invoicetotal>";
			
			//get statistics
			$codeget5 = mysql_query("SELECT * FROM `rep".$clientid,$db);
			while ($myrow5 = mysql_fetch_row($codeget5)) {
			$hits=$myrow5[1];
			$views=$myrow5[2];
			$totalhits+=$hits;
			$totalviews+=$views;			
			}
			echo "<totalhits>".$totalhits."</totalhits>";
			echo "<totalviews>".$totalviews."</totalviews>";
		
		}
		echo "<result>good</result>";
		
}	
?>
</xmlresponse>


