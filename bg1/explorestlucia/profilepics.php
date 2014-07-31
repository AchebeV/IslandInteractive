<?php
$thiskioskcode="BG1";
$id=$_GET['id'];
$db = mysql_connect("localhost", "islandsupport", "stpecnoc");
		mysql_select_db("islandsupport",$db);
		$codeget = mysql_query("SELECT * FROM `advertisers` WHERE `id`='$id'",$db);
		while ($myrow = mysql_fetch_row($codeget)) {
		$itemid=$myrow[0];
		$name=$myrow[1];
		$email=$myrow[2];
		$phone=$myrow[3];
		$address=$myrow[4];
		$avgstars=$myrow[5];
		$text1=$myrow[6];
		$text2=$myrow[7];
		$text3=$myrow[8];
		$image1=$myrow[9];
		$image2=$myrow[10];
		$section=$myrow[11];
		$latitude=$myrow[12];
		$longitude=$myrow[13];
		$subsection=$myrow[14];
		$layouttype=$myrow[15];
		$adtext1=$myrow[16];
		$admedia1a=$myrow[17];
		$admedia2a=$myrow[18];
		$adtext2=$myrow[19];
		$expandedinfo=$myrow[20];
		$listingimage=$myrow[21];
		$website=$myrow[22];
		$media1big=$myrow[23];
		$media2big=$myrow[24];
		$paystatus=$myrow[25];
		$listingstatus=$myrow[26];
		$locationsettings=$myrow[27];
		$contractstart=$myrow[28];
		$contractend=$myrow[29];
		$imagegallery=$myrow[30];
		$tag_line=$myrow[31];
		}
		
		$date=date("m/d/Y",time());
$time=date("H:i:s",time());
$sinceepoch=time();
		
		$viewscheck = mysql_query("SELECT * FROM `viewstats`");
		$viewscount= mysql_num_rows($viewscheck);
		
		$newid=$viewscount+1;
		
		$viewins = mysql_query("INSERT INTO `viewstats` (`id` ,`userid` ,`adid` ,`kioskid` ,`date` ,`time` ,`sincepoch` ,`adname` ,`kioskname` ,`username` ,`room` ,`hotel` ,`usertotal` ,`adtotal` ,`kiosktotal`) VALUES ('$newid', 'na', '$id', '$thiskioskcode', '$date', '$time', '$sinceepoch', '$name', 'na', 'na', 'na', 'na', 'na', 'na', 'na')",$db);

?>
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
<?php
if (isset($_POST['submit'])) {

// subject

$to = "islandinteractive@gmail.com";// $_POST['store'];

$subject = "Island Interactive Comments BG1";

$message = '<div style="position:relative; border:1px solid black; background-color:#FFFFFF;padding:10px;">
  Comments from visitor about '.$name.'<br />
COMMENTS:
<br />
'.$_POST['comments'].'
<br />

  </div>';

// To send HTML mail, the Content-type header must be set
			
		// Additional headers
		
		$headers = 'From: II Bay Gardens Hotel <support@island-interactive.com>' . "\r\n";
		$headers .= 'Reply-to: support@island-interactive.com' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		//$headers .= 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Bcc: rschouten@sbwcs.com, messages@island-interactive.com' . "\r\n";

		// Mail it
		mail($to, $subject, $message, $headers);
		//end mailing the registration information

}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta content="Island Interactive - St. Lucia - Hotels, Restaurants, Reviews, Rentals, Taxis - Complete Tourism Information" />
<title>Island Interactive - St. Lucia - Hotels, Restaurants, Reviews, Rentals, Taxis - Complete Tourism Information</title>
<link rel="stylesheet" href="anim.css" type="text/css" />
<link rel="stylesheet" type="text/css" media="all" href="jsdatepicker/jsDatePick_ltr.css" />
<script type="text/javascript" src="jsdatepicker/jsDatePick.full.1.3.js"></script>
<script type="text/javascript" src="animhead.js">
</script>
<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<script type="text/javascript" src="emlajaxlogin/ajaxlogin.js"></script>
<script type="text/javascript" src="emlajaxconfirms/ajaxconfirms.js"></script>
<script type="text/javascript" src="emlajaxconfirms/contact.js"></script>
<link rel="stylesheet" href="css/lightbox.css" type="text/css" media="screen" />
<script type="text/javascript" src="js/prototype.js"></script>
<script type="text/javascript" src="js/scriptaculous.js?load=effects"></script>
<script type="text/javascript" src="js/lightbox.js"></script>
<script type="text/javascript">
      
/***********************************************
* Ultimate Fade-In Slideshow (v1.51): © Dynamic Drive (http://www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit http://www.dynamicdrive.com/ for this script and 100s more.
***********************************************/
 
var fadeimages=new Array()
//SET IMAGE PATHS. Extend or contract array as needed
fadeimages[0]=["../images/adsrotation/ad_Picture3.gif", "", ""] //image with link and target syntax
fadeimages[1]=["../images/adsrotation/ad_Picture2.gif", "", ""]
fadeimages[2]=["../images/adsrotation/ad_Picture1.gif", "", ""]
fadeimages[3]=["../images/adsrotation/ad_sbwcs.gif", "", ""]

 
var fadebgcolor=""

////NO need to edit beyond here/////////////
 
var fadearray=new Array() //array to cache fadeshow instances
var fadeclear=new Array() //array to cache corresponding clearinterval pointers
 
var dom=(document.getElementById) //modern dom browsers
var iebrowser=document.all
 
function fadeshow(theimages, fadewidth, fadeheight, borderwidth, delay, pause, displayorder){
this.pausecheck=pause
this.mouseovercheck=0
this.delay=delay
this.degree=10 //initial opacity degree (10%)
this.curimageindex=0
this.nextimageindex=1
fadearray[fadearray.length]=this
this.slideshowid=fadearray.length-1
this.canvasbase="canvas"+this.slideshowid
this.curcanvas=this.canvasbase+"_0"
if (typeof displayorder!="undefined")
theimages.sort(function() {return 0.5 - Math.random();}) //thanks to Mike (aka Mwinter) :)
this.theimages=theimages
this.imageborder=parseInt(borderwidth)
this.postimages=new Array() //preload images
for (p=0;p<theimages.length;p++){
this.postimages[p]=new Image()
this.postimages[p].src=theimages[p][0]
}
 
var fadewidth=fadewidth+this.imageborder*2
var fadeheight=fadeheight+this.imageborder*2
 
if (iebrowser&&dom||dom) //if IE5+ or modern browsers (ie: Firefox)
document.write('<div id="master'+this.slideshowid+'" style="position:relative;width:'+fadewidth+'px;height:'+fadeheight+'px;overflow:hidden;"><div id="'+this.canvasbase+'_0" style="position:absolute;width:'+fadewidth+'px;height:'+fadeheight+'px;top:0;left:0;filter:progid:DXImageTransform.Microsoft.alpha(opacity=10);opacity:0.1;-moz-opacity:0.1;-khtml-opacity:0.1;background-color:'+fadebgcolor+'"></div><div id="'+this.canvasbase+'_1" style="position:absolute;width:'+fadewidth+'px;height:'+fadeheight+'px;top:0;left:0;filter:progid:DXImageTransform.Microsoft.alpha(opacity=10);opacity:0.1;-moz-opacity:0.1;-khtml-opacity:0.1;background-color:'+fadebgcolor+'"></div></div>')
else
document.write('<div><img name="defaultslide'+this.slideshowid+'" src="'+this.postimages[0].src+'"></div>')
 
if (iebrowser&&dom||dom) //if IE5+ or modern browsers such as Firefox
this.startit()
else{
this.curimageindex++
setInterval("fadearray["+this.slideshowid+"].rotateimage()", this.delay)
}
}

function fadepic(obj){
if (obj.degree<100){
obj.degree+=10
if (obj.tempobj.filters&&obj.tempobj.filters[0]){
if (typeof obj.tempobj.filters[0].opacity=="number") //if IE6+
obj.tempobj.filters[0].opacity=obj.degree
else //else if IE5.5-
obj.tempobj.style.filter="alpha(opacity="+obj.degree+")"
}
else if (obj.tempobj.style.MozOpacity)
obj.tempobj.style.MozOpacity=obj.degree/101
else if (obj.tempobj.style.KhtmlOpacity)
obj.tempobj.style.KhtmlOpacity=obj.degree/100
else if (obj.tempobj.style.opacity&&!obj.tempobj.filters)
obj.tempobj.style.opacity=obj.degree/101
}
else{
clearInterval(fadeclear[obj.slideshowid])
obj.nextcanvas=(obj.curcanvas==obj.canvasbase+"_0")? obj.canvasbase+"_0" : obj.canvasbase+"_1"
obj.tempobj=iebrowser? iebrowser[obj.nextcanvas] : document.getElementById(obj.nextcanvas)
obj.populateslide(obj.tempobj, obj.nextimageindex)
obj.nextimageindex=(obj.nextimageindex<obj.postimages.length-1)? obj.nextimageindex+1 : 0
setTimeout("fadearray["+obj.slideshowid+"].rotateimage()", obj.delay)
}
}
 
fadeshow.prototype.populateslide=function(picobj, picindex){
var slideHTML=""
if (this.theimages[picindex][1]!="") //if associated link exists for image
slideHTML='<a href="'+this.theimages[picindex][1]+'" target="'+this.theimages[picindex][2]+'">'
slideHTML+='<img src="'+this.postimages[picindex].src+'" border="'+this.imageborder+'px">'
if (this.theimages[picindex][1]!="") //if associated link exists for image
slideHTML+='</a>'
picobj.innerHTML=slideHTML
}
 
 
fadeshow.prototype.rotateimage=function(){
if (this.pausecheck==1) //if pause onMouseover enabled, cache object
var cacheobj=this
if (this.mouseovercheck==1)
setTimeout(function(){cacheobj.rotateimage()}, 100)
else if (iebrowser&&dom||dom){
this.resetit()
var crossobj=this.tempobj=iebrowser? iebrowser[this.curcanvas] : document.getElementById(this.curcanvas)
crossobj.style.zIndex++
fadeclear[this.slideshowid]=setInterval("fadepic(fadearray["+this.slideshowid+"])",50)
this.curcanvas=(this.curcanvas==this.canvasbase+"_0")? this.canvasbase+"_1" : this.canvasbase+"_0"
}
else{
var ns4imgobj=document.images['defaultslide'+this.slideshowid]
ns4imgobj.src=this.postimages[this.curimageindex].src
}
this.curimageindex=(this.curimageindex<this.postimages.length-1)? this.curimageindex+1 : 0
}
 
fadeshow.prototype.resetit=function(){
this.degree=10
var crossobj=iebrowser? iebrowser[this.curcanvas] : document.getElementById(this.curcanvas)
if (crossobj.filters&&crossobj.filters[0]){
if (typeof crossobj.filters[0].opacity=="number") //if IE6+
crossobj.filters(0).opacity=this.degree
else //else if IE5.5-
crossobj.style.filter="alpha(opacity="+this.degree+")"
}
else if (crossobj.style.MozOpacity)
crossobj.style.MozOpacity=this.degree/101
else if (crossobj.style.KhtmlOpacity)
crossobj.style.KhtmlOpacity=this.degree/100
else if (crossobj.style.opacity&&!crossobj.filters)
crossobj.style.opacity=this.degree/101
}
 
 
fadeshow.prototype.startit=function(){
var crossobj=iebrowser? iebrowser[this.curcanvas] : document.getElementById(this.curcanvas)
this.populateslide(crossobj, this.curimageindex)
if (this.pausecheck==1){ //IF SLIDESHOW SHOULD PAUSE ONMOUSEOVER
var cacheobj=this
var crossobjcontainer=iebrowser? iebrowser["master"+this.slideshowid] : document.getElementById("master"+this.slideshowid)
crossobjcontainer.onmouseover=function(){cacheobj.mouseovercheck=1}
crossobjcontainer.onmouseout=function(){cacheobj.mouseovercheck=0}
}
this.rotateimage()
}

</script>

<?php //EXIT ==================================================?>
<script type="text/javascript">
var xxx = 0; var yyy = 0;
var endPos = 0;
function start() {
var w = objWidth('myobj');
xxx = 11;
yyy = 154;
endPos = xxx - w - 11;
moveit();
setObjVis('myobj','visible');
}
function moveit() {
var x = (posLeft()+xxx) + 'px';
var y = (posTop()+yyy) + 'px';
moveObjTo('myobj',x,y);
}
function moverHome() {
	if (xxx > endPos) {
	xxx -=15; moveit(); setTimeout('moverHome()',1);
	} else {
	setTimeout('window.location=\'../\';',200);
	}
}
function moverAbout() {
	if (xxx > endPos) {
	xxx -=15; moveit(); setTimeout('moverAbout()',1);
	} else {
	setTimeout('window.location=\'../about.php\';',200);
	}
}
</script>
<?php //ENTRANCE ==================================================?>
<script type="text/javascript">
var xxx = 0; var yyy = 0;
var endPos = 0;
function start2() {
var w = objWidth('myobj');
xxx = 0-w-11;
yyy = 154;
endPos = 11;
moveit2();
setObjVis('myobj','visible');
}
function moveit2() {
var x = (posLeft()+xxx) + 'px';
var y = (posTop()+yyy) + 'px';
moveObjTo('myobj',x,y);
}
function mover2() {
	if (xxx < endPos) {
	xxx +=15; moveit2(); setTimeout('mover2()',1);
	}
}
</script>
<script type="text/JavaScript">
<!--
function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
pagenum=1;
totalpages=1;
function loaderHide() {
document.getElementById('loader').style.left='-1000px';
document.getElementById('content'+pagenum).style.left='230px';
}

function moveNext() {
	if (pagenum==totalpages) {
	showNextStopPop();	
	} else {
		currentpage=totalpages-1;
		if (pagenum==currentpage) {
		document.getElementById('nextbutton').style.display='none';
		document.getElementById('plainnext').style.display='block';
		} else {
		document.getElementById('nextbutton').style.display='block';
		document.getElementById('plainnext').style.display='none';
		document.getElementById('backbutton').style.display='block';
		document.getElementById('plainback').style.display='none';
		}
	document.getElementById('content'+pagenum).style.left='-2000px';
	pagenum++;
	document.getElementById('content'+pagenum).style.left='230px';
	}
}

function moveBack() {
	if (pagenum==1) {
	showBackStopPop();	
	} else {
	currentpage=2;
		if (pagenum==currentpage) {
		document.getElementById('backbutton').style.display='none';
		document.getElementById('plainback').style.display='block';
		} else {
		document.getElementById('backbutton').style.display='block';
		document.getElementById('plainback').style.display='none';
		document.getElementById('nextbutton').style.display='block';
		document.getElementById('plainnext').style.display='none';
		}
	document.getElementById('content'+pagenum).style.left='-2000px';
	pagenum--;
	document.getElementById('content'+pagenum).style.left='230px';
	}
}

function showBackStopPop() {
document.getElementById('popbackstop').style.display='block';
setTimeout('document.getElementById("popbackstop").style.display="none"',2000);
}

function showNextStopPop() {
document.getElementById('popnextstop').style.display='block';
setTimeout('document.getElementById("popnextstop").style.display="none"',2000);
}

function hider() {
document.getElementById('taxipop').style.display='none';
document.getElementById('taxipop2').style.display='none';
document.getElementById('bookpop').style.display='none';
document.getElementById('reviewpop').style.display='none';
document.getElementById('mappop').style.display='none';
document.getElementById('addtimepop').style.display='none';
document.getElementById('registerpop').style.display='none';
document.getElementById('selecttimepop').style.display='none';
}

function showPopBasic(button) {
hider();
document.getElementById(button+'pop').style.display='block';
//setTimeout('document.getElementById(button+\'pop\').style.display="none"',3000);
}

function showPop(button) {
hider();
document.getElementById(button+'pop').style.display='block';
//setTimeout('document.getElementById(button+\'pop\').style.display="none"',3000);
document.getElementById('calltype').value=button;
document.getElementById('confirmtype').value=button;
}

function showpdf(pdffile) {
	document.getElementById('pdfbackground').style.display="block";
	document.getElementById('pdfviewer').style.display="block";
	document.getElementById('pdfviewer').src=pdffile;
}

function hidepdf() {
	document.getElementById('pdfviewer').style.display="none";
	document.getElementById('pdfbackground').style.display="none";
}

function closePop(popup) {
document.getElementById(popup).style.display='none';
//setTimeout('document.getElementById(button+\'pop\').style.display="none"',3000);
}

function sendPop(popup) {
document.getElementById(popup).style.display='none';
//setTimeout('document.getElementById(button+\'pop\').style.display="none"',3000);
}

function loaderShow() {
document.getElementById('content').style.left='-2000px';
document.getElementById('loader').style.left='480px';
}

function sendstat() {
document.getElementById('viewstatsiframe').src="http://common.island-interactive.com/iframecalls/iframeview.php?newid=<?php echo $newid ?>&thiskioskcode=<?php echo $thiskioskcode ?>&date=<?php echo $date ?>&time=<?php echo $time ?>&sinceepoch=<?php echo $sinceepoch ?>&name=<?php echo $name ?>";
}

//-->
</script>
</head>
<body onload="MM_preloadImages('images/but_link1ovr.gif','images/but_link2ovr.gif','images/but_link3ovr.gif','images/but_link4ovr.gif','../images/but_homeovr.gif','../images/but_welcomeovr.gif','../images/but_newsovr.gif','../images/but_loginovr.gif','../images/but_registerovr.gif','../images/but_learnmoreovr.gif','../images/button_nextovr.gif','../images/button_backovr.gif','../images/button_plainovr.gif','../images/pop_taxi.gif','../images/button_close.gif','../images/pop_map.gif','../images/pop_book.gif','../images/pop_review.gif','../images/pop_rest.gif');loaderHide();sendstat();">

<?php //==============================================START RIGHT ADS SECTION ?>

<div id="rightads" style="position:absolute;left:1005px;top:0px;width:248px;height:747px; background-color:#E9EEF4;">

<?php

// server detector

//echo $_SERVER['HTTP_HOST']; //--> www.island-interactive.com / localhost

$serverhost=$_SERVER['HTTP_HOST'];

$pos = strrpos($serverhost, "localhost");

if ($pos === false) { // webserver web
				$adcontenturl="http://island-interactive.com/dbsyncs/adimages/";
				$linkurl="http://".$serverhost."/";
			} else { // localhost
				$adcontenturl="http://localhost/islandintsyncs/adimages/";
				$linkurl="http://localhost/islandinteractive/";
			}

?>
<?php //echo $adcontenturl ?>
<?php //echo $linkurl ?>

<?php 
		$db = mysql_connect("localhost", "islandsupport", "stpecnoc");
		mysql_select_db("islandsupport",$db);
?>
    <img src="../images/rightadsnew2.gif" border="0" />
    
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

<div style="position:absolute;left:0px;top:0px;width:1005px;height:747px; background-image:url(../images/background_main.jpg); background-position:left top;">
<a href="index.php"><img src="../images/logo_ilive.gif" border="0" alt="Welcome to Island Interactive" style="position:absolute;left:6px;top:38px"/></a>

<?php //====================================================================================================== ?>
	<div id="myobj" style="position:absolute;width:188px;height:369px; background-image:url(../images/background_links.gif); background-position:left top;visibility:visible;top:154px;left:11px;">

<a href="javascript:;" onmouseout="MM_swapImgRestore()"onmouseup="MM_swapImgRestore()" onmousedown="MM_swapImage('Image3','','../images/but_homeovr.gif',1)" onclick="start();moverHome();return false;"><img src="../images/but_home.gif" alt="Home" name="Image3" width="188" height="69" border="0" id="Image3" style="position:absolute;left:0px;top:4px;"/></a>

<a href="index.php" onmouseout="MM_swapImgRestore()"onmouseup="MM_swapImgRestore()" onmousedown="MM_swapImage('Image4','','images/but_link1ovr.gif',1)"><img src="images/but_link1.gif" alt="Explore St. Lucia" name="Image4" width="188" height="69" border="0" id="Image4" style="position:absolute;left:0px;top:48px;" /></a>

<a href="land.php" onmouseout="MM_swapImgRestore()"onmouseup="MM_swapImgRestore()" onmousedown="MM_swapImage('Image5','','images/but_link2ovr.gif',1)"><img src="images/but_link2.gif" alt="By Land" name="Image5" width="188" height="69" border="0" id="Image5" style="position:absolute;left:0px;top:92px;" /></a>

<a href="sea.php" onmouseout="MM_swapImgRestore()"onmouseup="MM_swapImgRestore()" onmousedown="MM_swapImage('Image6','','images/but_link3ovr.gif',1)"><img src="images/but_link3.gif" alt="On The Sea" name="Image6" width="188" height="69" border="0" id="Image6" style="position:absolute;left:0px;top:136px;"/></a>

<a href="sky.php" onmouseout="MM_swapImgRestore()"onmouseup="MM_swapImgRestore()" onmousedown="MM_swapImage('Image7','','images/but_link4ovr.gif',1)"><img src="images/but_link4.gif" alt="In The Sky" name="Image7" width="188" height="69" border="0" id="Image7" style="position:absolute;left:0px;top:180px;"/></a>

<?php if (!isset($_COOKIE['expirer'])) { ?>
<div id="loginContainer" style="position:absolute;top:224px;left:0px;width:188px;height:98px; background-image:url(../images/back_login.gif); background-position:left top; background-repeat:no-repeat; z-index:3;">

  <a href="javascript:;" id="loginButton" onclick="showLogin()" onmouseout="MM_swapImgRestore()" onmouseup="MM_swapImgRestore()" onmousedown="MM_swapImage('Image10','','../images/but_loginovr.gif',1)"><img src="../images/but_login.gif" alt="Login" name="Image10" width="65" height="46" border="0" id="Image10" style="position:absolute;top:35px;left:19px;" /></a>
  
<?php } else { ?>

<div id="loginContainer" style="position:absolute;top:224px;left:0px;width:188px;height:150px; background-image:url(../images/back_login_new.gif); background-position:left top; background-repeat:no-repeat; z-index:3;">

  <a href="javascript:;" id="loginButton" onclick="showLogin()" onmouseout="MM_swapImgRestore()" onmouseup="MM_swapImgRestore()" onmousedown="MM_swapImage('Image10','','../images/but_loginovr.gif',1)"><img src="../images/but_login.gif" alt="Login" name="Image10" width="65" height="46" border="0" id="Image10" style="display:none;position:absolute;top:35px;left:19px;" /></a>

<?php } ?>  
 

	<?php if (!isset($_COOKIE['expirer'])) { ?>
	<div id="login" style="position:absolute;display:none;top:-10px;left:17px;width:145px;height:108px;border:solid 0px #FFFFFF;color:#000000; font-family:Arial, Helvetica, sans-serif; font-size:12px; font-weight:bold;padding:5px;text-align:center;"><br />
		EMAIL<br />
		<input style="height:15px;width:140px;vertical-align:middle;" type="text" name="username" id="username"><br />
		PASSWORD<br />
		<input style="height:15px;width:140px;vertical-align:middle;" type="password" name="password" id="password"><br />

<img id="loginButtonNew" src="../images/button_login.gif" onmousedown="this.src='../images/button_loginovr.gif'" onmouseup="this.src='../images/button_login.gif'" style="position:absolute;top:110px;left:0px;" onclick="ajaxLogin('emlajaxlogin/ajaxlogin.php')" />

<img id="loginButtonNew" src="../images/closeloginbutton.gif" onmousedown="this.src='../images/closeloginbuttonovr.gif'" onmouseup="this.src='../images/closeloginbutton.gif'" style="position:absolute;top:110px;left:120px;" onclick="hideLogin()" />


	</div>
	<?php } else { ?>
	<div id="loggedin" style="position:absolute;top:-10px;left:17px;width:145px;height:108px;border:solid 0px #FFFFFF;color:#000000; font-family:Arial, Helvetica, sans-serif; font-size:12px;padding:5px;font-weight:bold;text-align:center;">
<br />Welcome back&nbsp;<?php echo $_SESSION['firstname'] ?><br />
#&nbsp;<?php echo $_SESSION['room'] ?>,&nbsp;<?php echo $_SESSION['hotel'] ?>
	
	<a href="../members.php"><img id="myaccButton" src="../images/button_myacc.gif" border="0" onmousedown="this.src='../images/button_myaccovr.gif'" onmouseup="this.src='../images/button_myacc.gif'" onmouseout="this.src='../images/button_myacc.gif'" style="position:absolute;top:70px;left:15px;display:block;" /></a>
	
<img id="logoutButton" src="../images/button_logout.gif" onmousedown="this.src='../images/button_logoutovr.gif'" onmouseup="this.src='../images/button_logout.gif'" onmouseout="this.src='../images/button_logout.gif'" style="position:absolute;top:110px;left:15px;display:block;" onclick="ajaxLogout()" />
	
	</div>
	<?php } ?>
	
	<div id="loginloader" style="position:absolute;top:0px;left:-1000px;width:145px;height:108px;border:solid 0px #FFFFFF;color:#000000; font-family:Arial, Helvetica, sans-serif; font-size:12px;font-weight:bold;padding:5px; text-align:center;"><br /><br />
	<img src="../images/loading.gif" alt="Loading" /><br /><br />
	Loading Data
	</div>
	
	<div id="logingood" style="position:absolute;top:-10px;left:-1000px;width:145px;height:108px;border:solid 0px #FFFFFF;color:#000000; font-family:Arial, Helvetica, sans-serif; font-size:12px;font-weight:bold;padding:5px;text-align:center;">
	</div>
	
	<div id="loginbad" style="position:absolute;top:-10px;left:-1000px;width:145px;height:108px;border:solid 0px #FFFFFF;color:#000000; font-family:Arial, Helvetica, sans-serif; font-size:12px;font-weight:bold;padding:5px;text-align:center;"><br /><br />
<br />
<br />
	Login was bad
	</div>

<?php if (!isset($_COOKIE['expirer'])) { ?>

  <a href="../register.php"  id="registerButton" onmouseout="MM_swapImgRestore()"onmouseup="MM_swapImgRestore()" onmousedown="MM_swapImage('Image11','','../images/but_registerovr.gif',1)"><img src="../images/but_register.gif" alt="Register" name="Image11" width="85" height="46" border="0" id="Image11" style="position:absolute;top:35px;left:86px;"/></a> </div>

<a href="javascript:;" onmouseout="MM_swapImgRestore()" onclick="start();moverAbout();return false;" onmouseup="MM_swapImgRestore()" onmousedown="MM_swapImage('Image12','','../images/but_learnmoreovr.gif',1)"><img id="findoutButton" src="../images/but_learnmore.gif" alt="Learn More" name="Image12" width="188" height="68" border="0" id="Image12" style="position:absolute;top:298px;left:0px;"/></a>

<?php } else { ?>

<a href="../register.php"  id="registerButton" onmouseout="MM_swapImgRestore()"onmouseup="MM_swapImgRestore()" onmousedown="MM_swapImage('Image11','','../images/but_registerovr.gif',1)"><img src="../images/but_register.gif" alt="Register" name="Image11" width="85" height="46" border="0" id="Image11" style="display:none;position:absolute;top:35px;left:86px;"/></a> </div>

<a href="javascript:;" onmouseout="MM_swapImgRestore()" onclick="start();moverAbout();return false;" onmouseup="MM_swapImgRestore()" onmousedown="MM_swapImage('Image12','','../images/but_learnmoreovr.gif',1)"><img id="findoutButton" src="../images/but_learnmore.gif" alt="Learn More" name="Image12" width="188" height="68" border="0" id="Image12" style="position:absolute;top:350px;left:0px;"/></a>

<?php } ?>

</div>
<?php //====================================================================================================== ?>

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
//new fadeshow(../images_ARRAY_NAME, slideshow_width, slideshow_height, borderwidth, delay, pause (0=no, 1=yes), optionalRandomOrder)
new fadeshow(fadeimages, 629, 120, 0, 5000, 0, "R")
</script><!--<img src="../images/ad_columbian.gif" border="0" alt="Advertisment" style="position:absolute;left:185px;top:30px;"/>--></a></div>

<?php //++++++++++++++++=+++++++++++++++++++++++END BANNER+++++++++++++++++++++++++++++++++++++++++++++++++++?>

<div id="loader" style="position:absolute;left:480px;top:403px;"><img src="../images/loading.gif" alt="Loading" /></div>


<div id="content1" style="position:absolute;left:-2000px;top:170px;width:528px;height:490px; font-family:Times New Roman, Times, serif; font-size:14px;text-align:justify;">
<?php

// server detector

//echo $_SERVER['HTTP_HOST']; //--> www.island-interactive.com / localhost

$serverhost=$_SERVER['HTTP_HOST'];

$pos = strrpos($serverhost, "localhost");

if ($pos === false) { // webserver web
				$adcontenturl="http://island-interactive.com/dbsyncs/adimages/";
				$linkurl="http://".$serverhost."/";
			} else { // localhost
				$adcontenturl="http://localhost/islandintsyncs/adimages/";
				$linkurl="http://localhost/islandinteractive/";
			}

?>

<?php

// admedia composer

$ext1 = substr($admedia1a, -3);
$ext2 = substr($admedia2a, -3);

$file1 = substr($admedia1a, 0, -4);
$file2 = substr($admedia2a, 0, -4);

$bigext1 = substr($media1big, -3);
$bigext2 = substr($media2big, -3);

$bigfile1 = substr($media1big, 0, -4);
$bigfile2 = substr($media2big, 0, -4);

if ($ext1 == "flv") {
$admedia1 = "<script type=\"text/javascript\">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,0,0','width','240','height','180','id','FLVPlayer','src','FLVPlayer_Progressive','flashvars','&MM_ComponentVersion=1&skinName=Clear_Skin_1&streamName=".$adcontenturl.$file1."&autoPlay=true&autoRewind=false','quality','high','scale','noscale','name','FLVPlayer','salign','lt','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','movie','FLVPlayer_Progressive','wmode','transparent' ); //end AC code 
</script><noscript><object classid=\"clsid:D27CDB6E-AE6D-11cf-96B8-444553540000\" codebase=\"http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,0,0\" width=\"240\" height=\"180\" id=\"FLVPlayer\">
  <param name=\"movie\" value=\"FLVPlayer_Progressive.swf\" />
  <param name=\"salign\" value=\"lt\" />
  <param name=\"quality\" value=\"high\" />
  <param name=\"scale\" value=\"noscale\" />
  <param name=\"wmode\" value=\"transparent\" />
  <param name=\"FlashVars\" value=\"&MM_ComponentVersion=1&skinName=Clear_Skin_1&streamName=".$adcontenturl.$file1."&autoPlay=true&autoRewind=false\" />
  <embed src=\"FLVPlayer_Progressive.swf\" flashvars=\"&MM_ComponentVersion=1&skinName=Clear_Skin_1&streamName=".$adcontenturl.$file1."&autoPlay=true&autoRewind=false\" quality=\"high\" scale=\"noscale\" width=\"240\" height=\"180\" name=\"FLVPlayer\" salign=\"LT\" type=\"application/x-shockwave-flash\" pluginspage=\"http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash\" wmode=\"transparent\" />
</object></noscript>";
} else if ($ext1 == "swf") {
$admedia1 ="<script type=\"text/javascript\">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0','width','220','height','144','src','".$adcontenturl.$file1."','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','movie','".$adcontenturl.$file1."','wmode','transparent','loop','true' ); //end AC code
</script><noscript>".'<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" width="220" height="144">
  <param name="movie" value="'.$adcontenturl.$file1.'.'.$ext1.'" />
  <param name="quality" value="high" />
  <param name="loop" value="true" />
  <param name="wmode" value="transparent" />
  <embed src="'.$adcontenturl.$file1.'.'.$ext1.'" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="220" height="144" wmode="transparent" loop="true"></embed>
</object></noscript>';
} else if ($itemid=="256142") {
$admedia1 = '<a href="javascript:;" onclick="showpdf(\''.$adcontenturl.'Kite surfing pricelist.pdf\')"><img src="'.$adcontenturl.$file1.'.'.$ext1.'" border="0" /></a>';
} else if ($itemid=="303752") {
$admedia1 = '<a href="javascript:;" onclick="showpdf(\''.$adcontenturl.'adrenalinepdftest.pdf\')"><img src="'.$adcontenturl.$file1.'.'.$ext1.'" border="0" /></a>';
} else if ($itemid=="400155") {
$admedia1 = '<a href="javascript:;" onclick="showvideo(\''.$adcontenturl.'trimair.flv\')"><img src="'.$adcontenturl.$file1.'.'.$ext1.'" border="0" /></a>';
} else if ($bigext1 == 'pdf') {
$admedia1 = '<a href="javascript:;" onclick="showpdf(\''.$adcontenturl.$bigfile1.'.pdf\')"><img src="'.$adcontenturl.$file1.'.'.$ext1.'" border="0" /></a>';
} else if ($bigext1 == "flv") {
$admedia1 = '<a href="javascript:;" onclick="showvideo(\''.$adcontenturl.$media1big.'\')"><img src="'.$adcontenturl.$file1.'.'.$ext1.'" border="0" /></a>';
} else if ($ext1 == "jpg" || $ext1 == "JPG" || $ext1 == "gif" || $ext1 == "png" || $ext1 == "PNG" || $ext1 == "GIF") {
$admedia1 = '<a href="'.$adcontenturl.$file1.'big.'.$ext1.'"  rel="lightbox[admedia1]" class="text" title="'.$name.'"><img src="'.$adcontenturl.$file1.'.'.$ext1.'" border="0" /></a>';
}


if ($ext2 == "flv") {
$admedia2 = "<script type=\"text/javascript\">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,0,0','width','240','height','180','id','FLVPlayer','src','FLVPlayer_Progressive','flashvars','&MM_ComponentVersion=1&skinName=Clear_Skin_1&streamName=".$adcontenturl.$file2."&autoPlay=true&autoRewind=false','quality','high','scale','noscale','name','FLVPlayer','salign','lt','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','movie','FLVPlayer_Progressive','wmode','transparent' ); //end AC code 
</script><noscript><object classid=\"clsid:D27CDB6E-AE6D-11cf-96B8-444553540000\" codebase=\"http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,0,0\" width=\"240\" height=\"180\" id=\"FLVPlayer\">
  <param name=\"movie\" value=\"FLVPlayer_Progressive.swf\" />
  <param name=\"salign\" value=\"lt\" />
  <param name=\"quality\" value=\"high\" />
  <param name=\"scale\" value=\"noscale\" />
  <param name=\"wmode\" value=\"transparent\" />
  <param name=\"FlashVars\" value=\"&MM_ComponentVersion=1&skinName=Clear_Skin_1&streamName=".$adcontenturl.$file2."&autoPlay=true&autoRewind=false\" />
  <embed src=\"FLVPlayer_Progressive.swf\" flashvars=\"&MM_ComponentVersion=1&skinName=Clear_Skin_1&streamName=".$adcontenturl.$file2."&autoPlay=true&autoRewind=false\" quality=\"high\" scale=\"noscale\" width=\"240\" height=\"180\" name=\"FLVPlayer\" salign=\"LT\" type=\"application/x-shockwave-flash\" pluginspage=\"http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash\" wmode=\"transparent\" />
</object></noscript>";
} else if ($ext2 == "swf") {
$admedia2 ="<script type=\"text/javascript\">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0','width','220','height','144','src','".$adcontenturl.$file2."','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','movie','".$adcontenturl.$file2."','wmode','transparent','loop','true' ); //end AC code
</script><noscript>".'<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" width="220" height="144">
  <param name="movie" value="'.$adcontenturl.$file2.'.'.$ext2.'" />
  <param name="quality" value="high" />
  <param name="loop" value="true" />
  <param name="wmode" value="transparent" />
  <embed src="'.$adcontenturl.$file2.'.'.$ext2.'" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="220" height="144" wmode="transparent" loop="true"></embed>
</object></noscript>';
} else if ($itemid=="294808") {
$admedia2 = '<a href="javascript:;" onclick="showpdf(\''.$adcontenturl.'Soufriere Land Tour.pdf\')"><img src="'.$adcontenturl.$file2.'.'.$ext2.'" border="0" /></a>';
} else if ($bigext2 == 'pdf') {
$admedia2 = '<a href="javascript:;" onclick="showpdf(\''.$adcontenturl.$bigfile2.'.pdf\')"><img src="'.$adcontenturl.$file2.'.'.$ext2.'" border="0" /></a>';
} else if ($bigext2 == "flv") {
$admedia2 = '<a href="javascript:;" onclick="showvideo(\''.$adcontenturl.$media2big.'\')"><img src="'.$adcontenturl.$file2.'.'.$ext2.'" border="0" /></a>';
} else if ($ext2 == "jpg" || $ext2 == "JPG" || $ext2 == "gif" || $ext2 == "png" || $ext2 == "PNG" || $ext2 == "GIF") {
	if (!empty($imagegallery)) {
		
		$first=1;
		function get_text($filename) {
		    $fp_load = fopen("$filename", "rb");
		    if ( $fp_load ) {
		            while ( !feof($fp_load) ) {
		                $content .= fgets($fp_load, 8192);
		            }
		            fclose($fp_load);
		            return $content;
		    }
		}
		$matches = array();
		preg_match_all("/(a href\=\")([^\?\"]*)(\")/i", get_text($adcontenturl.$imagegallery), $matches);
		foreach($matches[2] as $match) {
			if($first==1) {
				$admedia2 = '<a href="'.$adcontenturl.$imagegallery.'/'.$match.'"  rel="lightbox[admedia2]" class="text" title="'.$name.'"><img src="'.$adcontenturl.$file2.'.'.$ext2.'" border="0" /></a>';
				$first++;
			} else {
				$admedia2 .= '<a href="'.$adcontenturl.$imagegallery.'/'.$match.'"  rel="lightbox[admedia2]" class="text" title="'.$name.'" style="display:none;"></a>';
			}
		    //echo $match . '<br>';
		}
	} else {
		$admedia2 = '<a href="'.$adcontenturl.$file2.'big.'.$ext2.'"  rel="lightbox[admedia2]" class="text" title="'.$name.'"><img src="'.$adcontenturl.$file2.'.'.$ext2.'" border="0" /></a>';
	}
}

?>

<?php

		if ($email=="" || $email == "coming soon" || empty($email) || $email == "na") {
			$infoprint="";
		} else {
			$infoprint="Email: ".$email."";
		}
		
		if ($phone=="" || $phone == "coming soon" || empty($phone) || $phone == "na") {
			$infoprint.="";
		} else {
			$infoprint.="&nbsp;&nbsp;<strong>/</strong>&nbsp;&nbsp;Phone: ".$phone."";
		}
		
		if ($address=="" || $address == "coming soon" || empty($address) || $address == "na") {
			$infoprint.="";
		} else {
			$infoprint.="&nbsp;&nbsp;<strong>/</strong>&nbsp;&nbsp;Address: ".$address;
		}

if ($layouttype==NULL || $layouttype=="" || $layouttype=="na" || $layouttype=="Preview") {

?>
<div id="title" style="position:absolute;top:0px;left:0px;width:280px;font-family:Arial, Helvetica, sans-serif; font-size:12px;"><strong><?php echo $name ?></strong></div>

<div id="itemcontent" style="position:absolute;top:30px;left:0px;width:100%;">
	
	<div id="text1" style="position:absolute;top:-5px;left:-10px;width:280px;height:150px;border:0px solid black;margin:10px;font-family:Arial, Helvetica, sans-serif; font-size:12px; text-align:justify;overflow:hidden;">
	Phone: <?php echo $phone ?><br />
<br />
	Email: <?php echo $email ?><br />
<br />
	Location: <?php echo $address ?>
	</div>
	
    <?php if ($image1==NULL || $image1=="") { 
	$image1 = "item_holderbig.gif";
	} ?>
    
     <div id="item1" style="position:relative;top:0px;left:298px;width:297px;height:155px;">
	<img border="0" src="http://localhost/islandintsyncs/adimages/<?php echo $image1 ?>">
	</div>   
        
    <div id="text2" style="position:relative;top:0px;left:-10px;width:528px;height:50px;border:0px solid black;margin:10px; font-family:Arial, Helvetica, sans-serif; font-size:12px; text-align:justify; overflow:hidden;">
	Thank you for using Island Interactive. This customer's full profile will be coming soon. If you're interested in seeing more, please leave comment below. Enjoy your stay in St. Lucia.<br />
<br />

<!--<div align="center"><a href="../comment.php"><img src="../images/button_comment.gif" alt="Comment" width="115" height="40" border="0" /></a></div>-->

	</div>
    
<script type="text/javascript">
function validForm() {
	if (document.getElementById('comments').value=="") {
	alert("Please type your comments using the touchscreen keyboard.\nTouch the message box to bring up the keyboard.");
	return false;
	}
return true;

}
</script>
 <form method="post" action="profilepics.php?id=<?php echo $_GET['id'] ?>&bp=<?php echo $_GET['bp'] ?>" onsubmit="return validForm()">
  <div style="position:relative; border:0px solid black; padding:10px;height:180px;text-align:center;">
  
  <?php

if (isset($_POST['submit'])) {
?>
Thank you for your comments.<br />
<br />
Your message has been sent.
<?php
} else {

?>
  <input type="hidden" value="submit" name="submit" id="submit" />
<textarea name="comments" id="comments" style="width:442px;height:100px;"></textarea>
<br /><br />
<input type="image" name="submit" id="submit" src="../images/button_comment.gif" />
<?php 
}
?>
  </div>
  </form>
    
	</div>

<?php } else if ($layouttype=="Default") { ?>
    <div id="title" style="position:absolute;top:0px;left:0px;width:280px;font-family:Arial, Helvetica, sans-serif; font-size:12px;"><strong><?php echo $name ?></strong></div>
        		
	<div id="itemcontent" style="position:absolute;top:30px;left:0px;width:100%;">
	
	<div id="text1" style="position:absolute;top:-15px;left:-10px;width:280px;height:150px;border:0px solid black;margin:10px;font-family:Arial, Helvetica, sans-serif; font-size:12px; text-align:justify;overflow:hidden;">
	<?php echo $text1 ?>
	</div>
	
	<div id="item1" style="position:relative;top:0px;left:298px;width:297px;height:155px;">
	<img border="0" src="http://localhost/islandintsyncs/adimages/<?php echo $image1 ?>">
	</div>
	<div id="text2" style="position:relative;top:0px;left:-10px;width:528px;height:75px;border:0px solid black;margin:10px; font-family:Arial, Helvetica, sans-serif; font-size:12px; text-align:justify; overflow:hidden;">
	<?php echo $text2 ?>
	</div>
	<div id="item2" style="position:relative;top:0px;left:0px;width:297px;height:200px;">
	<?php if (empty($text3) || $text3=="") {
	//do nothing
	} else {
	echo "<img border=\"0\" src=\"http://localhost/islandintsyncs/adimages/".$image2."\">";
	}
	?>
	</div>
	
	<div id="text3" style="position:absolute;bottom:40px;right:-10px;width:280px;height:152px;border:0px solid black;margin:10px;font-family:Arial, Helvetica, sans-serif; font-size:12px; text-align:justify;overflow:hidden;">
	<?php echo $text3 ?>
	</div>
	
	</div>

<?php } else if ($layouttype=="Text Only") { ?>
    <div id="title" style="position:absolute;top:-5px;left:0px;width:520px;font-family:Arial, Helvetica, sans-serif; font-size:12px;"><strong><?php echo $name ?></strong>&nbsp; - &nbsp;<?php echo $infoprint ?></div>
        		
	<div id="itemcontent" style="position:absolute;top:30px;left:0px;width:100%;">
	
	<div id="text1" style="position:absolute;top:0px;left:0px;width:530px;height:405px;font-family:Arial, Helvetica, sans-serif; font-size:12px; text-align:justify;overflow:hidden;border:#000000 0px solid ">
	<?php echo $adtext1 ?>
	</div>
	
	<!--<div id="item1" style="position:absolute;top:210px;left:0px;width:530px;height:195px;font-family:Arial, Helvetica, sans-serif; font-size:12px; text-align:justify;overflow:hidden; border:#000000 0px solid">
	<?php echo $admedia2 ?>
	</div>-->
	
	<!--<div id="item2" style="position:absolute;top:210px;left:0px;width:530px;height:195px;font-family:Arial, Helvetica, sans-serif; font-size:12px; text-align:justify;overflow:hidden; border:#000000 0px solid"><?php echo $admedia1 ?>
	</div>-->
	
	<!--<div id="text3" style="position:absolute;top:210px;left:275px;width:255px;height:195px;font-family:Arial, Helvetica, sans-serif; font-size:12px; text-align:justify;overflow:hidden;border:#000000 0px solid">
	<?php echo $admedia2 ?>
	</div> -->
	
	</div>

<?php } else if ($layouttype=="Media Only") { ?>
    <div id="title" style="position:absolute;top:-5px;left:0px;width:520px;font-family:Arial, Helvetica, sans-serif; font-size:12px;"><strong><?php echo $name ?></strong>&nbsp; - &nbsp;<?php echo $infoprint ?></div>
        		
	<div id="itemcontent" style="position:absolute;top:30px;left:0px;width:100%;">
	
	<div id="text1" style="position:absolute;top:0px;left:0px;width:530px;height:405px;font-family:Arial, Helvetica, sans-serif; font-size:12px; text-align:justify;overflow:hidden;border:#000000 0px solid ">
	<?php echo $admedia1 ?>
	</div>
	
	<!--<div id="item1" style="position:absolute;top:210px;left:0px;width:530px;height:195px;font-family:Arial, Helvetica, sans-serif; font-size:12px; text-align:justify;overflow:hidden; border:#000000 0px solid">
	<?php echo $admedia2 ?>
	</div>-->
	
	<!--<div id="item2" style="position:absolute;top:210px;left:0px;width:530px;height:195px;font-family:Arial, Helvetica, sans-serif; font-size:12px; text-align:justify;overflow:hidden; border:#000000 0px solid"><?php echo $admedia1 ?>
	</div>-->
	
	<!--<div id="text3" style="position:absolute;top:210px;left:275px;width:255px;height:195px;font-family:Arial, Helvetica, sans-serif; font-size:12px; text-align:justify;overflow:hidden;border:#000000 0px solid">
	<?php echo $admedia2 ?>
	</div> -->
	
	</div>

<?php } else if ($layouttype=="Text Left - Media Right") { ?>
    <div id="title" style="position:absolute;top:-5px;left:0px;width:520px;font-family:Arial, Helvetica, sans-serif; font-size:12px;"><strong><?php echo $name ?></strong>&nbsp; - &nbsp;<?php echo $infoprint ?></div>
        		
	<div id="itemcontent" style="position:absolute;top:30px;left:0px;width:100%;">
	
	<div id="text1" style="position:absolute;top:0px;left:0px;width:255px;height:405px;font-family:Arial, Helvetica, sans-serif; font-size:12px; text-align:justify;overflow:hidden;border:#000000 0px solid ">
	<?php echo $adtext1 ?>
	</div>
	
	<div id="item1" style="position:absolute;top:0px;left:275px;width:255px;height:405px;font-family:Arial, Helvetica, sans-serif; font-size:12px; text-align:justify;overflow:hidden; border:#000000 0px solid">
	<?php echo $admedia1 ?>
	</div>
	
	<!--<div id="item2" style="position:absolute;top:210px;left:0px;width:530px;height:195px;font-family:Arial, Helvetica, sans-serif; font-size:12px; text-align:justify;overflow:hidden; border:#000000 0px solid"><?php echo $admedia1 ?>
	</div>-->
	
	<!--<div id="text3" style="position:absolute;top:210px;left:275px;width:255px;height:195px;font-family:Arial, Helvetica, sans-serif; font-size:12px; text-align:justify;overflow:hidden;border:#000000 0px solid">
	<?php echo $admedia2 ?>
	</div> -->
	
	</div>
    
<?php } else if ($layouttype=="Media Left - Text Right") { ?>
    <div id="title" style="position:absolute;top:-5px;left:0px;width:520px;font-family:Arial, Helvetica, sans-serif; font-size:12px;"><strong><?php echo $name ?></strong>&nbsp; - &nbsp;<?php echo $infoprint ?></div>
        		
	<div id="itemcontent" style="position:absolute;top:30px;left:0px;width:100%;">
	
	<div id="text1" style="position:absolute;top:0px;left:0px;width:255px;height:405px;font-family:Arial, Helvetica, sans-serif; font-size:12px; text-align:justify;overflow:hidden;border:#000000 0px solid ">
	<?php echo $admedia1 ?>
	</div>
	
	<div id="item1" style="position:absolute;top:0px;left:275px;width:255px;height:405px;font-family:Arial, Helvetica, sans-serif; font-size:12px; text-align:justify;overflow:hidden; border:#000000 0px solid">
	<?php echo $adtext1 ?>
	</div>
	
	<!--<div id="item2" style="position:absolute;top:210px;left:0px;width:530px;height:195px;font-family:Arial, Helvetica, sans-serif; font-size:12px; text-align:justify;overflow:hidden; border:#000000 0px solid"><?php echo $admedia1 ?>
	</div>-->
	
	<!--<div id="text3" style="position:absolute;top:210px;left:275px;width:255px;height:195px;font-family:Arial, Helvetica, sans-serif; font-size:12px; text-align:justify;overflow:hidden;border:#000000 0px solid">
	<?php echo $admedia2 ?>
	</div> -->
	
	</div>

<?php } else if ($layouttype=="Text Top - Media Bottom") { ?>
    <div id="title" style="position:absolute;top:-5px;left:0px;width:520px;font-family:Arial, Helvetica, sans-serif; font-size:12px;"><strong><?php echo $name ?></strong>&nbsp; - &nbsp;<?php echo $infoprint ?></div>
        		
	<div id="itemcontent" style="position:absolute;top:30px;left:0px;width:100%;">
	
	<div id="text1" style="position:absolute;top:0px;left:0px;width:530px;height:195px;font-family:Arial, Helvetica, sans-serif; font-size:12px; text-align:justify;overflow:hidden;border:#000000 0px solid ">
	<?php echo $adtext1 ?>
	</div>
	
	<!--<div id="item1" style="position:absolute;top:0px;left:275px;width:255px;height:195px;font-family:Arial, Helvetica, sans-serif; font-size:12px; text-align:justify;overflow:hidden; border:#000000 0px solid">
	<?php echo $adtext2 ?>
	</div>-->
	
	<div id="item2" style="position:absolute;top:210px;left:0px;width:530px;height:195px;font-family:Arial, Helvetica, sans-serif; font-size:12px; text-align:justify;overflow:hidden; border:#000000 0px solid"><?php echo $admedia1 ?>
	</div>
	
	<!--<div id="text3" style="position:absolute;top:210px;left:275px;width:255px;height:195px;font-family:Arial, Helvetica, sans-serif; font-size:12px; text-align:justify;overflow:hidden;border:#000000 0px solid">
	<?php echo $admedia2 ?>
	</div> -->
	
	</div>

<?php } else if ($layouttype=="Media Top - Text Bottom") { ?>
    <div id="title" style="position:absolute;top:-5px;left:0px;width:520px;font-family:Arial, Helvetica, sans-serif; font-size:12px;"><strong><?php echo $name ?></strong>&nbsp; - &nbsp;<?php echo $infoprint ?></div>
        		
	<div id="itemcontent" style="position:absolute;top:30px;left:0px;width:100%;">
	
	<div id="text1" style="position:absolute;top:0px;left:0px;width:530px;height:195px;font-family:Arial, Helvetica, sans-serif; font-size:12px; text-align:justify;overflow:hidden;border:#000000 0px solid ">
	<?php echo $admedia1 ?>
	</div>
	
	<!--<div id="item1" style="position:absolute;top:0px;left:275px;width:255px;height:195px;font-family:Arial, Helvetica, sans-serif; font-size:12px; text-align:justify;overflow:hidden; border:#000000 0px solid">
	<?php echo $adtext2 ?>
	</div>-->
	
	<div id="item2" style="position:absolute;top:210px;left:0px;width:530px;height:195px;font-family:Arial, Helvetica, sans-serif; font-size:12px; text-align:justify;overflow:hidden; border:#000000 0px solid"><?php echo $adtext1 ?>
	</div>
	
	<!--<div id="text3" style="position:absolute;top:210px;left:275px;width:255px;height:195px;font-family:Arial, Helvetica, sans-serif; font-size:12px; text-align:justify;overflow:hidden;border:#000000 0px solid">
	<?php echo $admedia2 ?>
	</div> -->
	
	</div>

<?php } else if ($layouttype=="Media Top - Media Bottom") { ?>
    <div id="title" style="position:absolute;top:-5px;left:0px;width:520px;font-family:Arial, Helvetica, sans-serif; font-size:12px;"><strong><?php echo $name ?></strong>&nbsp; - &nbsp;<?php echo $infoprint ?></div>
        		
	<div id="itemcontent" style="position:absolute;top:30px;left:0px;width:100%;">
	
	<div id="text1" style="position:absolute;top:0px;left:0px;width:530px;height:195px;font-family:Arial, Helvetica, sans-serif; font-size:12px; text-align:justify;overflow:hidden;border:#000000 0px solid ">
	<?php echo $admedia1 ?>
	</div>
	
	<!--<div id="item1" style="position:absolute;top:0px;left:275px;width:255px;height:195px;font-family:Arial, Helvetica, sans-serif; font-size:12px; text-align:justify;overflow:hidden; border:#000000 0px solid">
	<?php echo $adtext2 ?>
	</div>-->
	
	<div id="item2" style="position:absolute;top:210px;left:0px;width:530px;height:195px;font-family:Arial, Helvetica, sans-serif; font-size:12px; text-align:justify;overflow:hidden; border:#000000 0px solid"><?php echo $admedia2 ?>
	</div>
	
	<!--<div id="text3" style="position:absolute;top:210px;left:275px;width:255px;height:195px;font-family:Arial, Helvetica, sans-serif; font-size:12px; text-align:justify;overflow:hidden;border:#000000 0px solid">
	<?php echo $admedia2 ?>
	</div> -->
	
	</div>

<?php } else if ($layouttype=="Three Panel - One Text Top - Two Media Bottom") { ?>
    <div id="title" style="position:absolute;top:-5px;left:0px;width:520px;font-family:Arial, Helvetica, sans-serif; font-size:12px;"><strong><?php echo $name ?></strong>&nbsp; - &nbsp;<?php echo $infoprint ?></div>
        		
	<div id="itemcontent" style="position:absolute;top:30px;left:0px;width:100%;">
	
	<div id="text1" style="position:absolute;top:0px;left:0px;width:530px;height:195px;font-family:Arial, Helvetica, sans-serif; font-size:12px; text-align:justify;overflow:hidden;border:#000000 0px solid ">
	<?php echo $adtext1 ?>
	</div>
	
	<!--<div id="item1" style="position:absolute;top:0px;left:275px;width:255px;height:195px;font-family:Arial, Helvetica, sans-serif; font-size:12px; text-align:justify;overflow:hidden; border:#000000 0px solid">
	<?php echo $adtext2 ?>
	</div>-->
	
	<div id="item2" style="position:absolute;top:210px;left:0px;width:255px;height:195px;font-family:Arial, Helvetica, sans-serif; font-size:12px; text-align:justify;overflow:hidden; border:#000000 0px solid"><?php echo $admedia1 ?>
	</div>
	
	<div id="text3" style="position:absolute;top:210px;left:275px;width:255px;height:195px;font-family:Arial, Helvetica, sans-serif; font-size:12px; text-align:justify;overflow:hidden;border:#000000 0px solid">
	<?php echo $admedia2 ?>
	</div> 
	
	</div>

<?php } else if ($layouttype=="Three Panel - One Media Top - Two Text Bottom") { ?>
    <div id="title" style="position:absolute;top:-5px;left:0px;width:520px;font-family:Arial, Helvetica, sans-serif; font-size:12px;"><strong><?php echo $name ?></strong>&nbsp; - &nbsp;<?php echo $infoprint ?></div>
        		
	<div id="itemcontent" style="position:absolute;top:30px;left:0px;width:100%;">
	
	<div id="text1" style="position:absolute;top:0px;left:0px;width:530px;height:195px;font-family:Arial, Helvetica, sans-serif; font-size:12px; text-align:justify;overflow:hidden;border:#000000 0px solid ">
	<?php echo $admedia1 ?>
	</div>
	
	<!--<div id="item1" style="position:absolute;top:0px;left:275px;width:255px;height:195px;font-family:Arial, Helvetica, sans-serif; font-size:12px; text-align:justify;overflow:hidden; border:#000000 0px solid">
	<?php echo $adtext2 ?>
	</div>-->
	
	<div id="item2" style="position:absolute;top:210px;left:0px;width:255px;height:195px;font-family:Arial, Helvetica, sans-serif; font-size:12px; text-align:justify;overflow:hidden; border:#000000 0px solid"><?php echo $adtext1 ?>
	</div>
	
	<div id="text3" style="position:absolute;top:210px;left:275px;width:255px;height:195px;font-family:Arial, Helvetica, sans-serif; font-size:12px; text-align:justify;overflow:hidden;border:#000000 0px solid">
	<?php echo $adtext2 ?>
	</div> 
	
	</div>

<?php } else if ($layouttype=="Three Panel - Two Text Top - One Media Bottom") { ?>
    <div id="title" style="position:absolute;top:-5px;left:0px;width:520px;font-family:Arial, Helvetica, sans-serif; font-size:12px;"><strong><?php echo $name ?></strong>&nbsp; - &nbsp;<?php echo $infoprint ?></div>
        		
	<div id="itemcontent" style="position:absolute;top:30px;left:0px;width:100%;">
	
	<div id="text1" style="position:absolute;top:0px;left:0px;width:255px;height:195px;font-family:Arial, Helvetica, sans-serif; font-size:12px; text-align:justify;overflow:hidden;border:#000000 0px solid ">
	<?php echo $adtext1 ?>
	</div>
	
	<div id="item1" style="position:absolute;top:0px;left:275px;width:255px;height:195px;font-family:Arial, Helvetica, sans-serif; font-size:12px; text-align:justify;overflow:hidden; border:#000000 0px solid">
	<?php echo $adtext2 ?>
	</div>
	
	<div id="item2" style="position:absolute;top:210px;left:0px;width:530px;height:195px;font-family:Arial, Helvetica, sans-serif; font-size:12px; text-align:justify;overflow:hidden; border:#000000 0px solid"><?php echo $admedia1 ?>
	</div>
	
	<!--<div id="text3" style="position:absolute;top:210px;left:275px;width:255px;height:195px;font-family:Arial, Helvetica, sans-serif; font-size:12px; text-align:justify;overflow:hidden;border:#000000 0px solid">
	<?php echo $admedia1 ?>
	</div> -->
	
	</div>

<?php } else if ($layouttype=="Three Panel - Two Media Top - One Text Bottom") { ?>
    <div id="title" style="position:absolute;top:-5px;left:0px;width:520px;font-family:Arial, Helvetica, sans-serif; font-size:12px;"><strong><?php echo $name ?></strong>&nbsp; - &nbsp;<?php echo $infoprint ?></div>
        		
	<div id="itemcontent" style="position:absolute;top:30px;left:0px;width:100%;">
	
	<div id="text1" style="position:absolute;top:0px;left:0px;width:255px;height:195px;font-family:Arial, Helvetica, sans-serif; font-size:12px; text-align:justify;overflow:hidden;border:#000000 0px solid ">
	<?php echo $admedia1 ?>
	</div>
	
	<div id="item1" style="position:absolute;top:0px;left:275px;width:255px;height:195px;font-family:Arial, Helvetica, sans-serif; font-size:12px; text-align:justify;overflow:hidden; border:#000000 0px solid">
	<?php echo $admedia2 ?>
	</div>
	
	<div id="item2" style="position:absolute;top:210px;left:0px;width:530px;height:195px;font-family:Arial, Helvetica, sans-serif; font-size:12px; text-align:justify;overflow:hidden; border:#000000 0px solid"><?php echo $adtext1 ?>
	</div>
	
	<!--<div id="text3" style="position:absolute;top:210px;left:275px;width:255px;height:195px;font-family:Arial, Helvetica, sans-serif; font-size:12px; text-align:justify;overflow:hidden;border:#000000 0px solid">
	<?php echo $adtext2 ?>
	</div> -->
	
	</div>

<?php } else if ($layouttype=="Four Panel - Two Media Left - Two Text Right") { ?>
    <div id="title" style="position:absolute;top:-5px;left:0px;width:520px;font-family:Arial, Helvetica, sans-serif; font-size:12px;"><strong><?php echo $name ?></strong>&nbsp; - &nbsp;<?php echo $infoprint ?></div>
        		
	<div id="itemcontent" style="position:absolute;top:30px;left:0px;width:100%;">
	
	<div id="text1" style="position:absolute;top:0px;left:0px;width:255px;height:195px;font-family:Arial, Helvetica, sans-serif; font-size:12px; text-align:justify;overflow:hidden;border:#000000 0px solid ">
	<?php echo $admedia1 ?>
	</div>
	
	<div id="item1" style="position:absolute;top:0px;left:275px;width:255px;height:195px;font-family:Arial, Helvetica, sans-serif; font-size:12px; text-align:justify;overflow:hidden; border:#000000 0px solid">
	<?php echo $adtext1 ?>
	</div>
	
	<div id="item2" style="position:absolute;top:210px;left:0px;width:255px;height:195px;font-family:Arial, Helvetica, sans-serif; font-size:12px; text-align:justify;overflow:hidden; border:#000000 0px solid"><?php echo $admedia2 ?>
	</div>
	
	<div id="text3" style="position:absolute;top:210px;left:275px;width:255px;height:195px;font-family:Arial, Helvetica, sans-serif; font-size:12px; text-align:justify;overflow:hidden;border:#000000 0px solid">
	<?php echo $adtext2 ?>
	</div>
	
	</div>

<?php } else if ($layouttype=="Four Panel - Two Text Left - Two Media Right") { ?>
    <div id="title" style="position:absolute;top:-5px;left:0px;width:520px;font-family:Arial, Helvetica, sans-serif; font-size:12px;"><strong><?php echo $name ?></strong>&nbsp; - &nbsp;<?php echo $infoprint ?></div>
        		
	<div id="itemcontent" style="position:absolute;top:30px;left:0px;width:100%;">
	
	<div id="text1" style="position:absolute;top:0px;left:0px;width:255px;height:195px;font-family:Arial, Helvetica, sans-serif; font-size:12px; text-align:justify;overflow:hidden;border:#000000 0px solid ">
	<?php echo $adtext1 ?>
	</div>
	
	<div id="item1" style="position:absolute;top:0px;left:275px;width:255px;height:195px;font-family:Arial, Helvetica, sans-serif; font-size:12px; text-align:justify;overflow:hidden; border:#000000 0px solid">
	<?php echo $admedia1 ?>
	</div>
	
	<div id="item2" style="position:absolute;top:210px;left:0px;width:255px;height:195px;font-family:Arial, Helvetica, sans-serif; font-size:12px; text-align:justify;overflow:hidden; border:#000000 0px solid"><?php echo $adtext2 ?>
	</div>
	
	<div id="text3" style="position:absolute;top:210px;left:275px;width:255px;height:195px;font-family:Arial, Helvetica, sans-serif; font-size:12px; text-align:justify;overflow:hidden;border:#000000 0px solid">
	<?php echo $admedia2 ?>
	</div>
	
	</div>

<?php } else if ($layouttype=="Four Panel - Two Media Top - Two Text Bottom") { ?>
    <div id="title" style="position:absolute;top:-5px;left:0px;width:520px;font-family:Arial, Helvetica, sans-serif; font-size:12px;"><strong><?php echo $name ?></strong>&nbsp; - &nbsp;<?php echo $infoprint ?></div>
        		
	<div id="itemcontent" style="position:absolute;top:30px;left:0px;width:100%;">
	
	<div id="text1" style="position:absolute;top:0px;left:0px;width:255px;height:195px;font-family:Arial, Helvetica, sans-serif; font-size:12px; text-align:justify;overflow:hidden;border:#000000 0px solid ">
	<?php echo $admedia1 ?>
	</div>
	
	<div id="item1" style="position:absolute;top:0px;left:275px;width:255px;height:195px;font-family:Arial, Helvetica, sans-serif; font-size:12px; text-align:justify;overflow:hidden; border:#000000 0px solid">
	<?php echo $admedia2 ?>
	</div>
	
	<div id="item2" style="position:absolute;top:210px;left:0px;width:255px;height:195px;font-family:Arial, Helvetica, sans-serif; font-size:12px; text-align:justify;overflow:hidden; border:#000000 0px solid"><?php echo $adtext1 ?>
	</div>
	
	<div id="text3" style="position:absolute;top:210px;left:275px;width:255px;height:195px;font-family:Arial, Helvetica, sans-serif; font-size:12px; text-align:justify;overflow:hidden;border:#000000 0px solid">
	<?php echo $adtext2 ?>
	</div>
	
	</div>

<?php } else if ($layouttype=="Four Panel - Two Text Top - Two Media Bottom") { ?>
    <div id="title" style="position:absolute;top:-5px;left:0px;width:520px;font-family:Arial, Helvetica, sans-serif; font-size:12px;"><strong><?php echo $name ?></strong>&nbsp; - &nbsp;<?php echo $infoprint ?></div>
        		
	<div id="itemcontent" style="position:absolute;top:30px;left:0px;width:100%;">
	
	<div id="text1" style="position:absolute;top:0px;left:0px;width:255px;height:195px;font-family:Arial, Helvetica, sans-serif; font-size:12px; text-align:justify;overflow:hidden;border:#000000 0px solid ">
	<?php echo $adtext1 ?>
	</div>
	
	<div id="item1" style="position:absolute;top:0px;left:275px;width:255px;height:195px;font-family:Arial, Helvetica, sans-serif; font-size:12px; text-align:justify;overflow:hidden; border:#000000 0px solid">
	<?php echo $adtext2 ?>
	</div>
	
	<div id="item2" style="position:absolute;top:210px;left:0px;width:255px;height:195px;font-family:Arial, Helvetica, sans-serif; font-size:12px; text-align:justify;overflow:hidden; border:#000000 0px solid"><?php echo $admedia1 ?>
	</div>
	
	<div id="text3" style="position:absolute;top:210px;left:275px;width:255px;height:195px;font-family:Arial, Helvetica, sans-serif; font-size:12px; text-align:justify;overflow:hidden;border:#000000 0px solid">
	<?php echo $admedia2 ?>
	</div>
	
	</div>


<?php } else if ($layouttype=="Four Panel - Top Media Text - Bottom Text Media") { ?>
    <div id="title" style="position:absolute;top:-5px;left:0px;width:520px;font-family:Arial, Helvetica, sans-serif; font-size:12px;"><strong><?php echo $name ?></strong>&nbsp; - &nbsp;<?php echo $infoprint ?></div>
        		
	<div id="itemcontent" style="position:absolute;top:30px;left:0px;width:100%;">
	
	<div id="text1" style="position:absolute;top:0px;left:0px;width:255px;height:195px;font-family:Arial, Helvetica, sans-serif; font-size:12px; text-align:justify;overflow:hidden;border:#000000 0px solid ">
	<?php echo $admedia1 ?>
	</div>
	
	<div id="item1" style="position:absolute;top:0px;left:275px;width:255px;height:195px;font-family:Arial, Helvetica, sans-serif; font-size:12px; text-align:justify;overflow:hidden; border:#000000 0px solid">
	<?php echo $adtext1 ?>
	</div>
	
	<div id="item2" style="position:absolute;top:210px;left:0px;width:255px;height:195px;font-family:Arial, Helvetica, sans-serif; font-size:12px; text-align:justify;overflow:hidden; border:#000000 0px solid"><?php echo $adtext2 ?>
	</div>
	
	<div id="text3" style="position:absolute;top:210px;left:275px;width:255px;height:195px;font-family:Arial, Helvetica, sans-serif; font-size:12px; text-align:justify;overflow:hidden;border:#000000 0px solid">
	<?php echo $admedia2 ?>
	</div>
	
	</div> 
 
    
<?php } else if ($layouttype=="Four Panel - Top Text Media - Bottom Media Text") { ?>
    <div id="title" style="position:absolute;top:-5px;left:0px;width:520px;font-family:Arial, Helvetica, sans-serif; font-size:12px;"><strong><?php echo $name ?></strong>&nbsp; - &nbsp;<?php echo $infoprint ?></div>
        		
	<div id="itemcontent" style="position:absolute;top:30px;left:0px;width:100%;">
	
	<div id="text1" style="position:absolute;top:0px;left:0px;width:255px;height:195px;font-family:Arial, Helvetica, sans-serif; font-size:12px; text-align:justify;overflow:hidden;border:#000000 0px solid ">
	<?php echo $adtext1 ?>
	</div>
	
	<div id="item1" style="position:absolute;top:0px;left:275px;width:255px;height:195px;font-family:Arial, Helvetica, sans-serif; font-size:12px; text-align:justify;overflow:hidden; border:#000000 0px solid">
	<?php echo $admedia1 ?>
	</div>
	
	<div id="item2" style="position:absolute;top:210px;left:0px;width:255px;height:195px;font-family:Arial, Helvetica, sans-serif; font-size:12px; text-align:justify;overflow:hidden; border:#000000 0px solid"><?php echo $admedia2 ?>
	</div>
	
	<div id="text3" style="position:absolute;top:210px;left:275px;width:255px;height:195px;font-family:Arial, Helvetica, sans-serif; font-size:12px; text-align:justify;overflow:hidden;border:#000000 0px solid">
	<?php echo $adtext2 ?>
	</div>
	
	</div>
    
<?php } ?>	
    
</div>

<!-- POPUPS AND INTERACTIVE ACTIONS -->

<div id="mappop" style="position:absolute;top:160px;left:230px;width:530px;height:460px;display:none; background-image:url(../images/pop_map.gif); background-position:center center; background-repeat:no-repeat; "><a href="javascript:;" onclick="closePop('mappop')"><img src="../images/button_close.gif" border="0" style="position:absolute;left:381px;top:13px;"/></a></div>

<div id="bookpop" style="position:absolute;top:160px;left:230px;width:530px;height:460px;display:none; background-image:url(../images/pop_book.gif); background-position:center center; background-repeat:no-repeat; "><a href="javascript:;" onclick="checkCookie('book','<?php echo $id ?>','<?php echo $thiskioskcode ?>')"><img src="../images/button_next.gif" border="0" style="position:absolute;left:231px;top:13px;"/></a><a href="javascript:;" onclick="closePop('bookpop')"><img src="../images/button_cancel.gif" border="0" style="position:absolute;left:381px;top:13px;"/></a></div>

<div id="addtimepop" style="position:absolute;top:160px;left:230px;width:530px;height:460px;display:none; background-image:url(../images/pop_addtime.gif); background-position:center center; background-repeat:no-repeat; "><!--<a href="javascript:;" onclick="checkCookie('addtime','<?php echo $id ?>','<?php echo $thiskioskcode ?>')"><img src="../images/button_next.gif" border="0" style="position:absolute;left:231px;top:13px;"/></a>--><a href="javascript:;" onclick="closePop('addtimepop')"><img src="../images/button_close.gif" border="0" style="position:absolute;left:381px;top:13px;"/></a></div>

<div id="registerpop" style="position:absolute;top:160px;left:230px;width:530px;height:460px;display:none; background-image:url(../images/pop_register.gif); background-position:center center; background-repeat:no-repeat;"><a href="javascript:;" onclick="checkForm()" ><img src="../images/button_next.gif" border="0" style="position:absolute;left:231px;top:13px;"/></a>

<a href="javascript:;" id="registerclosebutton" onclick="closePop('registerpop')"><img src="../images/button_cancel.gif" border="0" style="position:absolute;left:381px;top:13px;"/></a>
<a href="javascript:;" id="registerskipbutton" onclick="sendConfirm('emlajaxconfirms/ajaxsendconf.php',document.getElementById('confirmtype').value,'<?php echo $id ?>','<?php echo $thiskioskcode ?>')"><img src="../images/button_skip.gif" border="0" style="position:absolute;left:381px;top:13px;"/></a>

 <!-- onclick="checkCookie('selecttime','<?php echo $id ?>')" -->

<div style="position:absolute;top:125px;left:35px;">

<img id="loader" style="position:absolute;left:-1000px;top:200px;" src="../images/loading.gif" />
				<div align="center" id="msg1"></div>
				  <form id="contactForm">
                  <input type="hidden" name="calltype" id="calltype" value="" />
                  <input type="hidden" name="advertto" id="advertto" value="" />
                  <input type="hidden" name="kioskcode" id="kioskcode" value="" />
				  <table width="500" id="contactTable" border="0" cellspacing="0" cellpadding="5">
                    <tr>
                      <td style="text-align:right;"><strong>Full Name:</strong><span style="color:red;">*</span></td>
                      <td><input type="text" id="fullname" /></td>
                    </tr>
					<tr>
                      <td style="text-align:right;"><strong>Email:</strong><span style="color:red;">*</span></td>
                      <td><input type="text" id="email1" /></td>
                    </tr>
					<!--<tr>
                      <td style="text-align:right;"><strong>Re-Type Email:</strong><span style="color:red;">*</span></td>
                      <td><input type="text" id="email2" /></td>
                    </tr>-->
					<tr>
                      <td style="text-align:right;"><strong>Phone:</strong><span style="color:red;">*</span></td>
                      <td><input type="text" id="phone" /></td>
                    </tr>
					<tr>
                      <td style="text-align:right;"><strong>Country:</strong><span style="color:red;">*</span></td>
                      <td><select name="country" id="country">
						<?php
						$db2 = mysql_connect("localhost", "islandsupport", "stpecnoc");
								mysql_select_db("islandsupport",$db2);
								
								echo "<option value=\"\" selected=\"selected\">--------&nbsp;Caribbean&nbsp;--------</option>";
								echo "<option value=\"\"></option>";
									$codeget = mysql_query("SELECT * FROM `allcountrycodes` WHERE `allcountryid` LIKE 'C0%' ORDER BY `allcountry`",$db2);
									while ($myrow = mysql_fetch_row($codeget)) {
										echo "<option value=\"";
										echo $myrow[0];
										echo "\">";
										echo $myrow[1];
										echo "</option>";
									}
									
									echo "<option value=\"\"></option>";
									echo "<option value=\"\">--------&nbsp;All Countries&nbsp;--------</option>";
									echo "<option value=\"\"></option>";
									$codeget2 = mysql_query("SELECT * FROM `allcountrycodes` WHERE `allcountryid` LIKE 'AC%' ORDER BY `allcountry`",$db2);
									while ($myrow2 = mysql_fetch_row($codeget2)) {
										echo "<option value=\"";
										echo $myrow2[0];
										echo "\">";
										echo $myrow2[1];
										echo "</option>";
									}
									mysql_close($db2);
									
									?>
						</select></td>
                    </tr>
					<!-- <tr id="registers1" style="display:none;">
                      <td style="text-align:right;">Password:</td>
                      <td><input type="password" name="pass1" id="pass1"></td>
                    </tr>
					<tr id="registers2" style="display:none;">
                      <td style="text-align:right;">Confirm Password:</td>
                      <td><input type="password" name="pass2" id="pass2"></td>
                    </tr>-->
					<tr>
                      <td style="text-align:right;vertical-align:top;"><strong>Room:</strong><span style="color:red;">*</span></td>
                      <td><input type="text" id="details" ></td>
                    </tr>
					<tr>
                      <td style="text-align:right;"><strong>Accommodation:</strong><span style="color:red;">*</span></td>
                      <td><select name="hotel" id="hotel">
						<?php
						$db2 = mysql_connect("localhost", "islandsupport", "stpecnoc");
								mysql_select_db("islandsupport",$db2);
								
								//echo "<option value=\"\" selected=\"selected\">--------&nbsp;Please Select&nbsp;--------</option>";
								//echo "<option value=\"\"></option>";
									$codeget = mysql_query("SELECT * FROM `hotelcodes` ORDER BY `hotel`",$db2);
									while ($myrow = mysql_fetch_row($codeget)) {
										/*echo "<option value=\"";
										echo $myrow[1];
										echo "\">";
										echo $myrow[1];
										echo "</option>";*/
									}
									
									mysql_close($db2);
									
									?>
                                    <option value="" selected="selected">-------- Please Select --------</option>
                                    <option value="Auberge Seraphine">Auberge Seraphine</option>
                                    <option value="Bay Gardens Beach Resort">Bay Gardens Beach Resort</option>
                                    <option value="Bay Gardens Inn">Bay Gardens Inn</option>
                                    <option value="Bay Gardens Hotel">Bay Gardens Hotel</option>
                                    <option value="Cruise Ship - La Place Carenage">Cruise Ship - La Place Carenage</option>
                                    <option value="Cruise Ship - Pointe Seraphine">Cruise Ship - Pointe Seraphine</option>
                                    <option value="IGY Marina">IGY Marina</option>
                                    <option value="St. Lucian by Rex Resorts">St. Lucian by Rex Resorts</option>
                                                                   
						</select></td>
                    </tr>
                    <tr>
                      <td style="text-align:right;vertical-align:top;"><strong>Special Information:</strong></td>
                      <td><textarea name="bookcomment" id="bookcomment" rows="5" cols="25"></textarea></td>
                    </tr>
                  </table></form></div>

</div>

<div id="selecttimepop" style="position:absolute;top:160px;left:230px;width:530px;height:460px;display:none; background-image:url(../images/pop_selecttime.gif); background-position:center center; background-repeat:no-repeat; "><input type="hidden" id="confirmtype" value="" /><a href="javascript:;" onclick="sendConfirm('emlajaxconfirms/ajaxsendconf.php',document.getElementById('confirmtype').value,'<?php echo $id ?>','<?php echo $thiskioskcode ?>')"><img src="../images/button_confirm.gif" border="0" style="position:absolute;left:231px;top:13px;"/></a><a href="javascript:;" onclick="closePop('selecttimepop')"><img src="../images/button_cancel.gif" border="0" style="position:absolute;left:381px;top:13px;"/></a>
<div id="adivman" style="position:absolute;top:120px;left:60px;"></div> 
<script type="text/javascript">
g_calendarObject = new JsDatePick({
        useMode:1,
        isStripped:true,
        target:"adivman",
	  cellColorScheme:"armygreen"
    });
    
    g_calendarObject.setOnSelectedDelegate(function(){
        var obj = g_calendarObject.getSelectedDay();
    
        alert("You have selected : " + obj.month + "/" + obj.day + "/" + obj.year +". Please enter a time in the next box.");
		document.getElementById("datefor").value = obj.month + "/" + obj.day + "/" + obj.year;
		
		document.getElementById("timefor").focus();

    });
</script>
<br />
<br />
<div id="clockface" style="position:absolute;top:120px;left:300px;"><img src="../images/clock.gif" width="200" /></div> 
<form>

<div style="position:absolute;top:350px;left:60px;">
Date Selected:<br />
<input type="text" name="datefor" id="datefor" />
</div> 

<div style="position:absolute;top:350px;left:300px;">
Time Selected:<br />
<input type="text" name="timefor" id="timefor" />
</div> 

</form>
</div>


<div id="reviewpop" style="position:absolute;top:160px;left:230px;width:530px;height:460px;display:none; background-image:url(../images/pop_review.gif); background-position:center center; background-repeat:no-repeat; ">
<a href="javascript:;" onclick="checkCookie('review','<?php echo $id ?>','<?php echo $thiskioskcode ?>')"><img src="../images/button_next.gif" border="0" style="position:absolute;left:231px;top:13px;"/></a>
<a href="javascript:;" onclick="closePop('reviewpop')"><img src="../images/button_cancel.gif" border="0" style="position:absolute;left:381px;top:13px;"/></a>

	<div id="reviewdiv" style="position:absolute;top:130px;left:25px;width:240px;height:294px; border:0px solid #000000;font-family:Arial, Helvetica, sans-serif; font-size:12px;; text-align:center;">
		<textarea name="reviewtext" id="reviewtext" style="width:240px;height:230px;" onclick="this.innerHTML=''">Enter your review</textarea><br /><br />
Number of Island Interactive Stars - <img src="../images/star0ne.gif" /><br />
		<input type="radio" name="reviewstars" id="reviewstars1" value="1" /><label for="reviewstars1">1</label>&nbsp;&nbsp;&nbsp;
		<input type="radio" name="reviewstars" id="reviewstars2" value="2" /><label for="reviewstars2">2</label>&nbsp;&nbsp;&nbsp;
		<input type="radio" name="reviewstars" id="reviewstars3" value="3" /><label for="reviewstars3">3</label>&nbsp;&nbsp;&nbsp;
		<input type="radio" name="reviewstars" id="reviewstars4" value="4" /><label for="reviewstars4">4</label>&nbsp;&nbsp;&nbsp;
		<input type="radio" name="reviewstars" id="reviewstars5" value="5" /><label for="reviewstars5">5</label>
	</div>

</div>

<div id="taxipop" style="position:absolute;top:160px;left:230px;width:530px;height:460px;display:none; background-image:url(../images/pop_taxi.gif); background-position:center center; background-repeat:no-repeat; ">
	<a href="javascript:;" onclick="checkCookie('taxi','<?php echo $id ?>','<?php echo $thiskioskcode ?>')"><img src="../images/button_next.gif" border="0" style="position:absolute;left:231px;top:13px;"/></a>
	<a href="javascript:;" onclick="closePop('taxipop')"><img src="../images/button_cancel.gif" border="0" style="position:absolute;left:381px;top:13px;"/></a>
</div>

<div id="taxipop2" style="position:absolute;top:160px;left:230px;width:530px;height:460px;display:none; background-image:url(../images/pop_taxi2.gif); background-position:center center; background-repeat:no-repeat; ">
	<a href="javascript:;" onclick="document.getElementById('taxineeded').value='Yes';showPopBasic('selecttime');"><img src="../images/button_yes.gif" border="0" style="position:absolute;left:231px;top:13px;"/></a>
	<a href="javascript:;" onclick="document.getElementById('taxineeded').value='No';showPopBasic('selecttime');"><img src="../images/button_no.gif" border="0" style="position:absolute;left:381px;top:13px;"/></a>
    <input type="hidden" name="taxineeded" id="taxineeded" value="" />
</div>

<div id="thankyoupop" style="position:absolute;top:264px;left:240px;width:510px;height:150px;display:none; background-image:url(../images/msgpopback.gif); background-position:center center; background-repeat:no-repeat; text-align:center;">
	
</div>

<div id="loginpop" style="position:absolute;top:264px;left:240px;width:510px;height:150px;display:none; background-image:url(../images/msgpopback.gif); background-position:center center; background-repeat:no-repeat; text-align:center;">
	
</div>

<a href="javascript:;" id="review" onclick="showPop(this.id)"><img src="../images/button_review.gif" alt="Review" name="" width="116" height="40" border="0" id="Image149" style="position:absolute;top:634px;left:221px;"/></a>

<a href="javascript:;" id="taxi" onclick="showPop(this.id)"><img src="../images/button_taxi.gif" alt="Taxi" name="" width="116" height="40" border="0" id="Image149" style="position:absolute;top:634px;left:438px;"/></a>
<?php
$id=$_GET['id'];

		?>
<a href="http://common.island-interactive.com/gmapget.php?a=<?php echo $id ?>&kid=<?php echo $thiskioskcode ?>" id="map"><img src="../images/button_map.gif" alt="Map" name="" width="116" height="40" border="0" id="Image149" style="position:absolute;top:634px;left:654px;"/></a>

<a href="javascript:;" id="book" onclick="showPop(this.id)"><img src="../images/button_booktour.gif" alt="Book-" name="" width="116" height="40" border="0" id="Image149" style="position:absolute;top:679px;left:438px;"/></a>

<a href="javascript:;" id="addtime" onclick="showPop(this.id)"><img src="../images/button_add.gif" alt="AddTime" name="Image14" width="116" height="40" border="0" id="Image14" style="position:absolute;top:679px;left:221px;"/></a>

<!-- END OF POPUPS AND INTERACTIVE ACTIONS -->

<a href="<?php echo $_GET['bp'] ?>.php" onmouseout="MM_swapImgRestore()" onmouseup="MM_swapImgRestore()" onmousedown="MM_swapImage('Image13','','../images/button_backovr.gif',1)"><img src="../images/button_back.gif" alt="Back" name="Image13" width="115" height="40" border="0" id="Image13" style="position:absolute;top:679px;left:654px;"/></a>

<a href="../dailyschedule.php"><img src="../images/logo_cocoresorts.gif" alt="Bay Gardens Beach Resort" style="position:absolute;top:60px;left:791px;" border="0"/></a>

<?php $thiskiosknum="BG1" ?>
<a href="http://common.island-interactive.com/gmapget.php?kid=<?php echo $thiskiosknum ?>" id="viewmap"><img src="../images/tower_admap.gif" border="0" alt="View Map" style="position:absolute;top:232px;left:791px;"/></a>

<a href="../govorgs.php"><img src="../images/but_gov.gif" alt="Government and Other Associations" style="position:absolute;top:351px;left:791px;" border="0"/></a>

<a href="../slaspafidspre.php"><img src="../images/slaspafids.gif" alt="Check Your Flight" border="0" style="position:absolute;top:470px;left:791px;"/></a>

<div style="position:absolute;top:200px;left:791px; font-family:Arial, Helvetica, sans-serif; font-weight:normal; font-size:14px;">Need Help? Call (758) 484-3511</div>

<a href="../comment.php"><img border="0" src="../images/back_comment.gif" alt="Leave a comment" style="position:absolute;top:598px;left:791px;"/></a>

</div>
<iframe id="confirmsiframe" width="0" height="0">

</iframe>
<iframe id="viewstatsiframe" width="0" height="0">

</iframe>

<iframe id="pdfviewer" style="position:absolute; top:30px; left:175px; z-index:999; display:none;" width="900" height="600" border="1" type="application/pdf">

</iframe>

<div id="pdfbackground" style="position:absolute; top:0px; left:0px; z-index:997; display:none; background-color:#000000; opacity:0.7; filter:alpha(opacity=70); width:100%; height:100%;" onclick="hidepdf()">

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
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,0,0','width','800','height','600','id','FLVPlayer','src','FLVPlayer_Progressive','flashvars','&MM_ComponentVersion=1&skinName=Clear_Skin_1&streamName=".$adcontenturl.$bigfile1."&autoPlay=true&autoRewind=false','quality','high','scale','noscale','name','FLVPlayer','salign','lt','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','movie','FLVPlayer_Progressive','wmode','transparent' ); //end AC code 
</script><noscript><object classid=\"clsid:D27CDB6E-AE6D-11cf-96B8-444553540000\" codebase=\"http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,0,0\" width=\"800\" height=\"600\" id=\"FLVPlayer\">
  <param name=\"movie\" value=\"FLVPlayer_Progressive.swf\" />
  <param name=\"salign\" value=\"lt\" />
  <param name=\"quality\" value=\"high\" />
  <param name=\"scale\" value=\"noscale\" />
  <param name=\"wmode\" value=\"transparent\" />
  <param name=\"FlashVars\" value=\"&MM_ComponentVersion=1&skinName=Clear_Skin_1&streamName=".$adcontenturl.$bigfile1."&autoPlay=true&autoRewind=false\" />
  <embed src=\"FLVPlayer_Progressive.swf\" flashvars=\"&MM_ComponentVersion=1&skinName=Clear_Skin_1&streamName=".$adcontenturl.$bigfile1."&autoPlay=true&autoRewind=false\" quality=\"high\" scale=\"noscale\" width=\"800\" height=\"600\" name=\"FLVPlayer\" salign=\"LT\" type=\"application/x-shockwave-flash\" pluginspage=\"http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash\" wmode=\"transparent\" />
</object></noscript>";
?>
<a href="javascript:;" onclick="location.reload()"><img src="images/closelabel.gif" style="position:absolute;bottom:45px;right:15px;" /></a>
</div>

<div id="videobackground" style="position:absolute; top:0px; left:0px; z-index:997; display:none; background-color:#000000; opacity:0.7; filter:alpha(opacity=70); width:100%; height:100%;" onclick="location.reload()">

</div>

</body>
</html>
