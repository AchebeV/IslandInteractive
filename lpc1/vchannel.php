<?php
session_start();
if (isset($_COOKIE['expirer'])) {
$user=$_COOKIE['expirer'];

	if (!isset($_SESSION['firstname'])) {
		

		$db = mysql_connect("localhost", "islandsupport", "stpecnoc");
		mysql_select_db("islandsupport",$db);
		$codeget = mysql_query("SELECT * FROM `clients` WHERE `username`='$user'",$db);
		while ($myrow = mysql_fetch_row($codeget)) {
		$clientid=$myrow[0];
		$_SESSION['firstname']=$myrow[1];
		$_SESSION['lastname']=$myrow[2];
		$_SESSION['room']=$myrow[10];
		$_SESSION['hotel']=$myrow[11];
		
		}
	}
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta content="Island Interactive - St. Lucia - Hotels, Restaurants, Reviews, Rentals, Taxis - Complete Tourism Information" />
<title>Island Interactive - St. Lucia - Hotels, Restaurants, Reviews, Rentals, Taxis - Complete Tourism Information</title>
<link rel="stylesheet" href="anim.css" type="text/css" />
<script type="text/javascript" src="animhead.js">
</script>
<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<script type="text/javascript" src="emlajaxlogin/ajaxlogin.js"></script>
<script type="text/javascript" src="emlajaxconfirms/ajaxconfirms.js"></script>
<script type="text/javascript" src="main.js"></script>

<?php

// server detector

//echo $_SERVER['HTTP_HOST']; //--> www.island-interactive.com / localhost

$serverhost=$_SERVER['HTTP_HOST'];

$pos = strrpos($serverhost, "localhost");

if ($pos === false) { // webserver
    $adcontenturl="http://island-interactive.com/dbsyncs/adimages/";
	$linkurl="http://".$serverhost."/";
} else { // localhost
	$adcontenturl="http://localhost/islandintsyncs/adimages/";
	$linkurl="http://localhost/islandinteractive/";
}

?>

</head>
<body onload="start2();mover2();MM_preloadImages('images/but_welcomeovr.gif','images/but_newsovr.gif','images/but_festivalsovr.gif','images/but_mealovr.gif','images/but_exploreovr.gif','images/but_shoppingovr.gif','images/but_investmentovr.gif','images/but_loginovr.gif','images/but_registerovr.gif','images/but_learnmoreovr.gif','images/button_nextovr.gif','images/button_backovr.gif','images/but_accomovr.gif','images/but_downloadsovr.gif');loaderHide(); <?php echo 'showvideo(\''.$adcontenturl.'vchannel.flv\')'; ?>">

<?php //==============================================START RIGHT ADS SECTION ?>

<div id="rightads" style="position:absolute;left:1005px;top:0px;width:248px;height:747px; background-color:#E9EEF4;">


<?php //echo $adcontenturl ?>
<?php //echo $linkurl ?>

<?php 
		$db = mysql_connect("localhost", "islandsupport", "stpecnoc");
		mysql_select_db("islandsupport",$db);
?>
    <img src="images/rightadsnew2.gif" border="0" />
    
    <div id="rightad1" style="position:absolute;left:12px;top:29px;width:225px;height:125px; border:#000000 solid 0px;">
    <?php 
		$adsget = mysql_query("SELECT * FROM `buttons1`",$db);
		$numads= mysql_num_rows($adsget);
			if ($numads == 0) {
				$defadsget = mysql_query("SELECT * FROM `buttondefault`",$db);
				while ($myrow2 = mysql_fetch_row($defadsget)) {
					$image_default=$myrow2[1];
					$linkdef=$myrow2[2];
					$alttextdef=$myrow2[3];
					?>
						<a href="<?php echo $linkurl ?><?php echo $linkdef ?>">
							<img src="<?php echo $adcontenturl ?><?php echo $image_default ?>" alt="<?php echo $alttextdef ?>" border="0" />
						</a>                
					<?php
				}
			} else if ($numads == 1) {
				while ($myrow = mysql_fetch_row($adsget)) {
					$image_file=$myrow[1];
					$link=$myrow[2];
					$alttext=$myrow[3];
					?>
    					<a href="<?php echo $linkurl ?><?php echo $link ?>">
                        	<img src="<?php echo $adcontenturl ?><?php echo $image_file ?>" alt="<?php echo $alttext ?>" border="0" />
                        </a>                
                    <?php
				}
			} else if ($numads > 1) {
				$i=0;
				?>
                	<script type="text/javascript">
					var fadeimagesad4=new Array()
					//SET IMAGE PATHS. Extend or contract array as needed
						<?php
						while ($myrow = mysql_fetch_row($adsget)) {
							$image_file=$myrow[1];
							$link=$myrow[2];
							$alttext=$myrow[3];
							?>
								fadeimagesad4[<?php echo $i ?>]=["<?php echo $adcontenturl ?><?php echo $image_file ?>", "<?php echo $linkurl ?><?php echo $link ?>", ""]	
							<?php
							$i++;
						}
						?>
					</script>
                	<script type="text/javascript">
						new fadeshow(fadeimagesad4, 225, 125, 0, 5000, 0, "R")
					</script>
                <?php
			}
	?>
    
    </div>
    
	<div id="rightad2" style="position:absolute;left:12px;top:170px;width:225px;height:125px; border:#000000 solid 0px; background-color:#000000;">
        <?php 
		$adsget = mysql_query("SELECT * FROM `buttons2`",$db);
		$numads= mysql_num_rows($adsget);
			if ($numads == 0) {
				$defadsget = mysql_query("SELECT * FROM `buttondefault`",$db);
				while ($myrow2 = mysql_fetch_row($defadsget)) {
					$image_default=$myrow2[1];
					$linkdef=$myrow2[2];
					$alttextdef=$myrow2[3];
					?>
						<a href="<?php echo $linkurl ?><?php echo $linkdef ?>">
							<img src="<?php echo $adcontenturl ?><?php echo $image_default ?>" alt="<?php echo $alttextdef ?>" border="0" />
						</a>                
					<?php
				}
			} else if ($numads == 1) {
				while ($myrow = mysql_fetch_row($adsget)) {
					$image_file=$myrow[1];
					$link=$myrow[2];
					$alttext=$myrow[3];
					?>
    					<a href="<?php echo $linkurl ?><?php echo $link ?>">
                        	<img src="<?php echo $adcontenturl ?><?php echo $image_file ?>" alt="<?php echo $alttext ?>" border="0" />
                        </a>                
                    <?php
				}
			} else if ($numads > 1) {
				$i=0;
				?>
                	<script type="text/javascript">
					var fadeimagesad5=new Array()
					//SET IMAGE PATHS. Extend or contract array as needed
						<?php
						while ($myrow = mysql_fetch_row($adsget)) {
							$image_file=$myrow[1];
							$link=$myrow[2];
							$alttext=$myrow[3];
							?>
								fadeimagesad5[<?php echo $i ?>]=["<?php echo $adcontenturl ?><?php echo $image_file ?>", "<?php echo $linkurl ?><?php echo $link ?>", ""]	
							<?php
							$i++;
						}
						?>
					</script>
                	<script type="text/javascript">
						new fadeshow(fadeimagesad5, 225, 125, 0, 5000, 0, "R")
					</script>
                <?php
			}
	?>
	</div>
    
    <div id="rightad3" style="position:absolute;left:12px;top:311px;width:225px;height:125px; border:#000000 solid 0px;">
      	 <?php 
		$adsget = mysql_query("SELECT * FROM `buttons3`",$db);
		$numads= mysql_num_rows($adsget);
			if ($numads == 0) {
				$defadsget = mysql_query("SELECT * FROM `buttondefault`",$db);
				while ($myrow2 = mysql_fetch_row($defadsget)) {
					$image_default=$myrow2[1];
					$linkdef=$myrow2[2];
					$alttextdef=$myrow2[3];
					?>
						<a href="<?php echo $linkurl ?><?php echo $linkdef ?>">
							<img src="<?php echo $adcontenturl ?><?php echo $image_default ?>" alt="<?php echo $alttextdef ?>" border="0" />
						</a>                
					<?php
				}
			} else if ($numads == 1) {
				while ($myrow = mysql_fetch_row($adsget)) {
					$image_file=$myrow[1];
					$link=$myrow[2];
					$alttext=$myrow[3];
					?>
    					<a href="<?php echo $linkurl ?><?php echo $link ?>">
                        	<img src="<?php echo $adcontenturl ?><?php echo $image_file ?>" alt="<?php echo $alttext ?>" border="0" />
                        </a>                
                    <?php
				}
			} else if ($numads > 1) {
				$i=0;
				?>
                	<script type="text/javascript">
					var fadeimagesad6=new Array()
					//SET IMAGE PATHS. Extend or contract array as needed
						<?php
						while ($myrow = mysql_fetch_row($adsget)) {
							$image_file=$myrow[1];
							$link=$myrow[2];
							$alttext=$myrow[3];
							?>
								fadeimagesad6[<?php echo $i ?>]=["<?php echo $adcontenturl ?><?php echo $image_file ?>", "<?php echo $linkurl ?><?php echo $link ?>", ""]	
							<?php
							$i++;
						}
						?>
					</script>
                	<script type="text/javascript">
						new fadeshow(fadeimagesad6, 225, 125, 0, 5000, 0, "R")
					</script>
                <?php
			}
	?>
    </div>
    
   
    <div id="rightad4" style="position:absolute;left:12px;top:452px;width:225px;height:125px; border:#000000 solid 0px;">
		 <?php 
		$adsget = mysql_query("SELECT * FROM `buttons4`",$db);
		$numads= mysql_num_rows($adsget);
			if ($numads == 0) {
				$defadsget = mysql_query("SELECT * FROM `buttondefault`",$db);
				while ($myrow2 = mysql_fetch_row($defadsget)) {
					$image_default=$myrow2[1];
					$linkdef=$myrow2[2];
					$alttextdef=$myrow2[3];
					?>
						<a href="<?php echo $linkurl ?><?php echo $linkdef ?>">
							<img src="<?php echo $adcontenturl ?><?php echo $image_default ?>" alt="<?php echo $alttextdef ?>" border="0" />
						</a>                
					<?php
				}
			} else if ($numads == 1) {
				while ($myrow = mysql_fetch_row($adsget)) {
					$image_file=$myrow[1];
					$link=$myrow[2];
					$alttext=$myrow[3];
					?>
    					<a href="<?php echo $linkurl ?><?php echo $link ?>">
                        	<img src="<?php echo $adcontenturl ?><?php echo $image_file ?>" alt="<?php echo $alttext ?>" border="0" />
                        </a>                
                    <?php
				}
			} else if ($numads > 1) {
				$i=0;
				?>
                	<script type="text/javascript">
					var fadeimagesad7=new Array()
					//SET IMAGE PATHS. Extend or contract array as needed
						<?php
						while ($myrow = mysql_fetch_row($adsget)) {
							$image_file=$myrow[1];
							$link=$myrow[2];
							$alttext=$myrow[3];
							?>
								fadeimagesad7[<?php echo $i ?>]=["<?php echo $adcontenturl ?><?php echo $image_file ?>", "<?php echo $linkurl ?><?php echo $link ?>", ""]	
							<?php
							$i++;
						}
						?>
					</script>
                	<script type="text/javascript">
						new fadeshow(fadeimagesad7, 225, 125, 0, 5000, 0, "R")
					</script>
                <?php
			}
	?>
    </div>
    
    <div id="rightad5" style="position:absolute;left:12px;top:593px;width:225px;height:125px; border:#000000 solid 0px;">
    	 <?php 
		$adsget = mysql_query("SELECT * FROM `buttons5`",$db);
		$numads= mysql_num_rows($adsget);
			if ($numads == 0) {
				$defadsget = mysql_query("SELECT * FROM `buttondefault`",$db);
				while ($myrow2 = mysql_fetch_row($defadsget)) {
					$image_default=$myrow2[1];
					$linkdef=$myrow2[2];
					$alttextdef=$myrow2[3];
					?>
						<a href="<?php echo $linkurl ?><?php echo $linkdef ?>">
							<img src="<?php echo $adcontenturl ?><?php echo $image_default ?>" alt="<?php echo $alttextdef ?>" border="0" />
						</a>                
					<?php
				}
			} else if ($numads == 1) {
				while ($myrow = mysql_fetch_row($adsget)) {
					$image_file=$myrow[1];
					$link=$myrow[2];
					$alttext=$myrow[3];
					?>
    					<a href="<?php echo $linkurl ?><?php echo $link ?>">
                        	<img src="<?php echo $adcontenturl ?><?php echo $image_file ?>" alt="<?php echo $alttext ?>" border="0" />
                        </a>                
                    <?php
				}
			} else if ($numads > 1) {
				$i=0;
				?>
                	<script type="text/javascript">
					var fadeimagesad8=new Array()
					//SET IMAGE PATHS. Extend or contract array as needed
						<?php
						while ($myrow = mysql_fetch_row($adsget)) {
							$image_file=$myrow[1];
							$link=$myrow[2];
							$alttext=$myrow[3];
							?>
								fadeimagesad8[<?php echo $i ?>]=["<?php echo $adcontenturl ?><?php echo $image_file ?>", "<?php echo $linkurl ?><?php echo $link ?>", ""]	
							<?php
							$i++;
						}
						?>
					</script>
                	<script type="text/javascript">
						new fadeshow(fadeimagesad8, 225, 125, 0, 5000, 0, "R")
					</script>
                <?php
			}
	?>
    </div>
    
</div>

<?php //===================================================================END OF RIGHT ADS COLUMNS ?>

<div style="position:absolute;left:0px;top:0px;width:1005px;height:747px; background-image:url(images/background_main.jpg); background-position:left top;">
<a href="index.php"><img src="images/logo_ilive.gif" border="0" alt="Welcome to Island Interactive" style="position:absolute;left:6px;top:38px"/></a>

<?php //=============================MAIN MENU====================================================================?>

	<div id="myobj">

<a href="index.php" onmouseout="MM_swapImgRestore()"onmouseup="MM_swapImgRestore()" onmousedown="MM_swapImage('Image3','','images/but_welcomeovr.gif',1)"><img src="images/but_welcome.gif" alt="Welcome" name="Image3" width="188" height="69" border="0" id="Image3" style="position:absolute;left:0px;top:4px;"/></a>

<a href="javascript:;" onmouseout="MM_swapImgRestore()"onmouseup="MM_swapImgRestore()" onmousedown="MM_swapImage('Image40','','images/but_accomovr.gif',1)" onclick="start();moverG();return false;"><img src="images/but_accom.gif" alt="Accommodation" name="Image40" width="188" height="69" border="0" id="Image40" style="position:absolute;left:0px;top:48px;" /></a>

<a href="javascript:;" onmouseout="MM_swapImgRestore()"onmouseup="MM_swapImgRestore()" onmousedown="MM_swapImage('Image4','','images/but_newsovr.gif',1)" onclick="start();moverA();return false;"><img src="images/but_news.gif" alt="News &amp; Updates" name="Image4" width="188" height="69" border="0" id="Image4" style="position:absolute;left:0px;top:92px;" /></a>

<a href="javascript:;" onmouseout="MM_swapImgRestore()"onmouseup="MM_swapImgRestore()" onmousedown="MM_swapImage('Image5','','images/but_festivalsovr.gif',1)" onclick="start();moverB();return false;"><img src="images/but_festivals.gif" alt="Festivals &amp; Parties" name="Image5" width="188" height="69" border="0" id="Image5" style="position:absolute;left:0px;top:136px;" /></a>

<a href="javascript:;" onmouseout="MM_swapImgRestore()"onmouseup="MM_swapImgRestore()" onmousedown="MM_swapImage('Image6','','images/but_mealovr.gif',1)" onclick="start();moverC();return false;"><img src="images/but_meal.gif" alt="Fancy a Meal?" name="Image6" width="188" height="69" border="0" id="Image6" style="position:absolute;left:0px;top:180px;"/></a>

<a href="javascript:;" onmouseout="MM_swapImgRestore()"onmouseup="MM_swapImgRestore()" onmousedown="MM_swapImage('Image71','','images/but_experienceovr.gif',1)" onclick="start();moverDA();return false;"><img src="images/but_experience.gif" alt="Experience St. Lucia" name="Image71" width="188" height="69" border="0" id="Image71" style="position:absolute;left:0px;top:224px;"/></a>

<a href="javascript:;" onmouseout="MM_swapImgRestore()"onmouseup="MM_swapImgRestore()" onmousedown="MM_swapImage('Image7','','images/but_exploreovr.gif',1)" onclick="start();moverD();return false;"><img src="images/but_explore.gif" alt="Explore St. Lucia" name="Image7" width="188" height="69" border="0" id="Image7" style="position:absolute;left:0px;top:268px;"/></a>

<a href="javascript:;" onmouseout="MM_swapImgRestore()"onmouseup="MM_swapImgRestore()" onmousedown="MM_swapImage('Image8','','images/but_shoppingovr.gif',1)" onclick="start();moverE();return false;"><img src="images/but_shopping.gif" alt="Let's Go Shopping" name="Image8" width="188" height="69" border="0" id="Image8" style="position:absolute;left:0px;top:312px;"/></a>

<a href="javascript:;" onmouseout="MM_swapImgRestore()"onmouseup="MM_swapImgRestore()" onmousedown="MM_swapImage('Image9','','images/but_investmentovr.gif',1)" onclick="start();moverF();return false;"><img src="images/but_investment.gif" alt="Investment &amp; Real Estate" name="Image9" width="188" height="69" border="0" id="Image9" style="position:absolute;left:0px;top:356px;"/></a>

<a href="javascript:;" onmouseout="MM_swapImgRestore()"onmouseup="MM_swapImgRestore()" onmousedown="MM_swapImage('Image90','','images/but_downloadsovr.gif',1)" onclick="start();moverH();return false;"><img src="images/but_downloads.gif" alt="Downloads" name="Image90" width="188" height="69" border="0" id="Image90" style="position:absolute;left:0px;top:400px;"/></a>

<?php //=============================LOGIN ACCESS====================================================================?>
<div id="loginContainer" style="position:absolute;top:444px;left:0px;width:188px;height:98px; background-image:url(images/back_login.gif); background-position:left top; background-repeat:no-repeat; z-index:3;">

  <a href="javascript:;" id="loginButton" onclick="showLogin()" onmouseout="MM_swapImgRestore()" onmouseup="MM_swapImgRestore()" onmousedown="MM_swapImage('Image10','','images/but_loginovr.gif',1)"><img src="images/but_login.gif" alt="Login" name="Image10" width="65" height="46" border="0" id="Image10" style="position:absolute;top:35px;left:19px;" /></a>
  
 

	<?php if (!isset($_COOKIE['expirer'])) { ?>
	<div id="login" style="position:absolute;display:none;top:-10px;left:17px;width:145px;height:108px;border:solid 0px #FFFFFF;color:#000000; font-family:Arial, Helvetica, sans-serif; font-size:12px; font-weight:bold;padding:5px;text-align:center;"><br />
		EMAIL<br />
		<input style="height:15px;width:140px;vertical-align:middle;" type="text" name="username" id="username"><br />
		PASSWORD<br />
		<input style="height:15px;width:140px;vertical-align:middle;" type="password" name="password" id="password"><br />

<img id="loginButtonNew" src="images/button_login.gif" onmousedown="this.src='images/button_loginovr.gif'" onmouseup="this.src='images/button_login.gif'" style="position:absolute;top:110px;left:0px;" onclick="ajaxLogin('emlajaxlogin/ajaxlogin.php')" />

<img id="loginButtonNew" src="images/closeloginbutton.gif" onmousedown="this.src='images/closeloginbuttonovr.gif'" onmouseup="this.src='images/closeloginbutton.gif'" style="position:absolute;top:110px;left:120px;" onclick="hideLogin()" />


	</div>
	<?php } else { ?>
	<div id="loggedin" style="position:absolute;top:-10px;left:17px;width:145px;height:108px;border:solid 0px #FFFFFF;color:#000000; font-family:Arial, Helvetica, sans-serif; font-size:12px;padding:5px;font-weight:bold;text-align:center;">
<br />Welcome back&nbsp;<?php echo $_SESSION['firstname'] ?><br />
#&nbsp;<?php echo $_SESSION['room'] ?>,&nbsp;<?php echo $_SESSION['hotel'] ?>
	
	<a href="members.php"><img id="myaccButton" src="images/button_myacc.gif" border="0" onmousedown="this.src='images/button_myaccovr.gif'" onmouseup="this.src='images/button_myacc.gif'" onmouseout="this.src='images/button_myacc.gif'" style="position:absolute;top:70px;left:15px;display:block;" /></a>
	
<img id="logoutButton" src="images/button_logout.gif" onmousedown="this.src='images/button_logoutovr.gif'" onmouseup="this.src='images/button_logout.gif'" onmouseout="this.src='images/button_logout.gif'" style="position:absolute;top:110px;left:15px;display:block;" onclick="ajaxLogout()" />
	
	</div>
	<?php } ?>
	
	<div id="loginloader" style="position:absolute;top:0px;left:-1000px;width:145px;height:108px;border:solid 0px #FFFFFF;color:#000000; font-family:Arial, Helvetica, sans-serif; font-size:12px;font-weight:bold;padding:5px; text-align:center;"><br /><br />
	<img src="images/loading.gif" alt="Loading" /><br /><br />
	Loading Data
	</div>
	
	<div id="logingood" style="position:absolute;top:-10px;left:-1000px;width:145px;height:108px;border:solid 0px #FFFFFF;color:#000000; font-family:Arial, Helvetica, sans-serif; font-size:12px;font-weight:bold;padding:5px;text-align:center;">
	</div>
	
	<div id="loginbad" style="position:absolute;top:-10px;left:-1000px;width:145px;height:108px;border:solid 0px #FFFFFF;color:#000000; font-family:Arial, Helvetica, sans-serif; font-size:12px;font-weight:bold;padding:5px;text-align:center;"><br /><br />
<br />
<br />
	Login was bad
	</div>

  <a href="register.php"  id="registerButton" onmouseout="MM_swapImgRestore()"onmouseup="MM_swapImgRestore()" onmousedown="MM_swapImage('Image11','','images/but_registerovr.gif',1)"><img src="images/but_register.gif" alt="Register" name="Image11" width="85" height="46" border="0" id="Image11" style="position:absolute;top:35px;left:86px;"/></a> </div>

<?php //=============================END LOGIN SECTION====================================================================?>

<a href="about.php" onmouseout="MM_swapImgRestore()"onmouseup="MM_swapImgRestore()" onmousedown="MM_swapImage('Image12','','images/but_learnmoreovr.gif',1)"><img id="findoutButton" src="images/but_learnmore.gif" alt="Learn More" name="Image12" width="188" height="68" border="0" id="Image12" style="position:absolute;top:516px;left:0px;"/></a>


</div>

<?php //======================================END MAIN MENU===========================================================?>


<?php //++++++++++++++++=+++++++++++++++++++++++BANNER+++++++++++++++++++++++++++++++++++++++++++++++++++?>

<div style="position:absolute;left:185px;top:30px;">
<a href="javascript:;">
<script type="text/javascript">
var fadeimages=new Array()
//SET IMAGE PATHS. Extend or contract array as needed
	<?php 
	$i=0;
	$bannersget = mysql_query("SELECT * FROM `banners`",$db);
		while ($myrow2 = mysql_fetch_row($bannersget)) {
			$banner_file=$myrow2[1];
			$banner_link=$myrow2[2];
			$banner_target=$myrow2[3];
			
			echo 'fadeimages['.$i.']=["'.$banner_file.'", "'.$banner_link.'", "'.$banner_target.'"];';
			$i++;
			
		}
	
	?>
//new fadeshow(IMAGES_ARRAY_NAME, slideshow_width, slideshow_height, borderwidth, delay, pause (0=no, 1=yes), optionalRandomOrder)
new fadeshow(fadeimages, 629, 120, 0, 5000, 0, "R")
</script><!--<img src="images/ad_columbian.gif" border="0" alt="Advertisment" style="position:absolute;left:185px;top:30px;"/>--></a></div>

<?php //++++++++++++++++=+++++++++++++++++++++++END BANNER+++++++++++++++++++++++++++++++++++++++++++++++++++?>

<div id="loader" style="position:absolute;left:480px;top:403px;"><img src="images/loading.gif" alt="Loading" /></div>

<div id="content1" style="position:absolute;left:230px;top:170px;width:548px;height:570px; font-family:Arial, Helvetica, sans-serif; font-size:14px;text-align:justify;overflow:auto;">

  <?php

// admedia composer

$admedia1a = "vchannel.flv";

$ext1 = substr($admedia1a, -3);

$file1 = substr($admedia1a, 0, -4);

$admedia1 = '<a href="javascript:;" onclick="showvideo(\''.$adcontenturl.'vchannel.flv\')"><img src="'.$adcontenturl.$file1.'.'.$ext1.'" border="0" /></a>';


?>
      

</div>


<a href="dailyschedule.php"><img src="images/logo_cocoresorts.gif" alt="Bay Gardens Beach Resort" style="position:absolute;top:60px;left:791px;" border="0"/></a>

<?php $thiskiosknum="PROTO" ?>
<a href="vchannel.php" id="viewmap"><img src="images/tower_ad_visitorchannel.gif" border="0" alt="View Map" style="position:absolute;top:232px;left:791px;"/></a>

<!-- <a href="vchannel.php" id="viewmap"><img src="images/tower_ad_visitorchannel.gif" border="0" alt="View Map" style="position:absolute;top:232px;left:791px;"/></a> -->

<a href="govorgs.php"><img src="images/but_gov.gif" alt="Government and Other Associations" style="position:absolute;top:351px;left:791px;" border="0"/></a>

<a href="slaspafidspre.php"><img src="images/slaspafids.gif" alt="Check Your Flight" border="0" style="position:absolute;top:470px;left:791px;"/></a>

<div style="position:absolute;top:200px;left:791px; font-family:Arial, Helvetica, sans-serif; font-weight:normal; font-size:14px;">Need Help? Call (758) 484-3511</div>

<a href="comment.php"><img border="0" src="images/back_comment.gif" alt="Leave a comment" style="position:absolute;top:598px;left:791px;"/></a>


</div>
<script type="text/javascript">
function showvideo(videofile) {
	document.getElementById('videobackground').style.display="block";
	document.getElementById('videoviewer').style.display="block";
	//document.getElementById('videoviewer').src=videofile;
}

function hidevideo() {
	document.getElementById('videoviewer').style.display="none";
	document.getElementById('videobackground').style.display="none";
}
</script>

<div id="videoviewer" style="position:absolute; top:30px; left:175px; z-index:999; display:none;" width="900" height="600" border="1">
<?php
echo "<script type=\"text/javascript\">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,0,0','width','800','height','600','id','FLVPlayer','src','FLVPlayer_Progressive','flashvars','&MM_ComponentVersion=1&skinName=Clear_Skin_1&streamName=".$adcontenturl."vchannel&autoPlay=true&autoRewind=false','quality','high','scale','noscale','name','FLVPlayer','salign','lt','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','movie','FLVPlayer_Progressive','wmode','transparent' ); //end AC code 
</script><noscript><object classid=\"clsid:D27CDB6E-AE6D-11cf-96B8-444553540000\" codebase=\"http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,0,0\" width=\"800\" height=\"600\" id=\"FLVPlayer\">
  <param name=\"movie\" value=\"FLVPlayer_Progressive.swf\" />
  <param name=\"salign\" value=\"lt\" />
  <param name=\"quality\" value=\"high\" />
  <param name=\"scale\" value=\"noscale\" />
  <param name=\"wmode\" value=\"transparent\" />
  <param name=\"FlashVars\" value=\"&MM_ComponentVersion=1&skinName=Clear_Skin_1&streamName=".$adcontenturl."vchannel&autoPlay=true&autoRewind=false\" />
  <embed src=\"FLVPlayer_Progressive.swf\" flashvars=\"&MM_ComponentVersion=1&skinName=Clear_Skin_1&streamName=".$adcontenturl."vchannel&autoPlay=true&autoRewind=false\" quality=\"high\" scale=\"noscale\" width=\"800\" height=\"600\" name=\"FLVPlayer\" salign=\"LT\" type=\"application/x-shockwave-flash\" pluginspage=\"http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash\" wmode=\"transparent\" />
</object></noscript>";
?>
<a href="javascript:;" onclick="location.href='index.php'"><img src="images/closelabel.gif" style="position:absolute;bottom:45px;right:15px;" /></a>
</div>

<div id="videobackground" style="position:absolute; top:0px; left:0px; z-index:997; display:none; background-color:#000000; opacity:0.7; filter:alpha(opacity=70); width:100%; height:100%;" onclick="location.href='index.php'">

</div>

</body>
</html>
<?php if (isset($_COOKIE['expirer'])) { ?>
<script type="text/javascript">
showLoggedIn();
</script>
<?php } ?>