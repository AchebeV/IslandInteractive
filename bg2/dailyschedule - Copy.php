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
<script type="text/javascript">
      
/***********************************************
* Ultimate Fade-In Slideshow (v1.51): © Dynamic Drive (http://www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit http://www.dynamicdrive.com/ for this script and 100s more.
***********************************************/
 
var fadeimages=new Array()
//SET IMAGE PATHS. Extend or contract array as needed
fadeimages[0]=["images/adsrotation/ad_Picture3.gif", "", ""] //image with link and target syntax
fadeimages[1]=["images/adsrotation/ad_Picture2.gif", "", ""]
fadeimages[2]=["images/adsrotation/ad_Picture1.gif", "", ""]
fadeimages[3]=["images/adsrotation/ad_sbwcs.gif", "", ""]

 
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
var goto = 0;
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
function moverA() {
	if (xxx > endPos) {
	xxx -=15; moveit(); setTimeout('moverA()',1);
	} else {
	setTimeout('window.location=\'newsnupdates/index.php?from=out\';',200);
	}
}
function moverB() {
	if (xxx > endPos) {
	xxx -=15; moveit(); setTimeout('moverB()',1);
	} else {
	setTimeout('window.location=\'festivalsnparties/index.php?from=out\';',200);
	}
}
function moverC() {
	if (xxx > endPos) {
	xxx -=15; moveit(); setTimeout('moverC()',1);
	} else {
	setTimeout('window.location=\'fancyameal/index.php?from=out\';',200);
	}
}
function moverD() {
	if (xxx > endPos) {
	xxx -=15; moveit(); setTimeout('moverD()',1);
	} else {
	setTimeout('window.location=\'explorestlucia/index.php?from=out\';',200);
	}
}
function moverE() {
	if (xxx > endPos) {
	xxx -=15; moveit(); setTimeout('moverE()',1);
	} else {
	setTimeout('window.location=\'letsgoshopping/index.php?from=out\';',200);
	}
}
function moverF() {
	if (xxx > endPos) {
	xxx -=15; moveit(); setTimeout('moverF()',1);
	} else {
	setTimeout('window.location=\'investments/index.php?from=out\';',200);
	}
}

function moverG() {
	if (xxx > endPos) {
	xxx -=15; moveit(); setTimeout('moverG()',1);
	} else {
	setTimeout('window.location=\'accommodation/index.php?from=out\';',200);
	}
}

function moverH() {
	if (xxx > endPos) {
	xxx -=15; moveit(); setTimeout('moverH()',1);
	} else {
	setTimeout('window.location=\'downloads/index.php?from=out\';',200);
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

pagenum=1;
totalpages=8;
function loaderHide() {
document.getElementById('loader').style.left='-1000px';
document.getElementById('content'+pagenum).style.left='230px';
}

function moveNext() {
	if (pagenum==totalpages) {
	//showNextStopPop();	
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
	//showBackStopPop();	
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

function loaderShow() {
document.getElementById('content').style.left='-2000px';
document.getElementById('loader').style.left='480px';
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
//-->
</script>
<style type="text/css">
<!--
.style1 {
	font-size: 16px;
	font-weight: bold;
}
-->
</style>
</head>
<body onload="start2();mover2();MM_preloadImages('images/but_welcomeovr.gif','images/but_newsovr.gif','images/but_festivalsovr.gif','images/but_mealovr.gif','images/but_exploreovr.gif','images/but_shoppingovr.gif','images/but_investmentovr.gif','images/but_loginovr.gif','images/but_registerovr.gif','images/but_learnmoreovr.gif','images/button_nextovr.gif','images/button_backovr.gif','images/but_accomovr.gif','images/but_downloadsovr.gif');loaderHide()">

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

<?php //=================================================================================================?>

	<div id="myobj">

<a href="index.php" onmouseout="MM_swapImgRestore()"onmouseup="MM_swapImgRestore()" onmousedown="MM_swapImage('Image3','','images/but_welcomeovr.gif',1)"><img src="images/but_welcome.gif" alt="Welcome" name="Image3" width="188" height="69" border="0" id="Image3" style="position:absolute;left:0px;top:4px;"/></a>

<a href="javascript:;" onmouseout="MM_swapImgRestore()"onmouseup="MM_swapImgRestore()" onmousedown="MM_swapImage('Image40','','images/but_accomovr.gif',1)" onclick="start();moverG();return false;"><img src="images/but_accom.gif" alt="Accommodation" name="Image40" width="188" height="69" border="0" id="Image40" style="position:absolute;left:0px;top:48px;" /></a>

<a href="javascript:;" onmouseout="MM_swapImgRestore()"onmouseup="MM_swapImgRestore()" onmousedown="MM_swapImage('Image4','','images/but_newsovr.gif',1)" onclick="start();moverA();return false;"><img src="images/but_news.gif" alt="News &amp; Updates" name="Image4" width="188" height="69" border="0" id="Image4" style="position:absolute;left:0px;top:92px;" /></a>

<a href="javascript:;" onmouseout="MM_swapImgRestore()"onmouseup="MM_swapImgRestore()" onmousedown="MM_swapImage('Image5','','images/but_festivalsovr.gif',1)" onclick="start();moverB();return false;"><img src="images/but_festivals.gif" alt="Festivals &amp; Parties" name="Image5" width="188" height="69" border="0" id="Image5" style="position:absolute;left:0px;top:136px;" /></a>

<a href="javascript:;" onmouseout="MM_swapImgRestore()"onmouseup="MM_swapImgRestore()" onmousedown="MM_swapImage('Image6','','images/but_mealovr.gif',1)" onclick="start();moverC();return false;"><img src="images/but_meal.gif" alt="Fancy a Meal?" name="Image6" width="188" height="69" border="0" id="Image6" style="position:absolute;left:0px;top:180px;"/></a>

<a href="javascript:;" onmouseout="MM_swapImgRestore()"onmouseup="MM_swapImgRestore()" onmousedown="MM_swapImage('Image7','','images/but_exploreovr.gif',1)" onclick="start();moverD();return false;"><img src="images/but_explore.gif" alt="Explore St. Lucia" name="Image7" width="188" height="69" border="0" id="Image7" style="position:absolute;left:0px;top:224px;"/></a>

<a href="javascript:;" onmouseout="MM_swapImgRestore()"onmouseup="MM_swapImgRestore()" onmousedown="MM_swapImage('Image8','','images/but_shoppingovr.gif',1)" onclick="start();moverE();return false;"><img src="images/but_shopping.gif" alt="Let's Go Shopping" name="Image8" width="188" height="69" border="0" id="Image8" style="position:absolute;left:0px;top:268px;"/></a>

<a href="javascript:;" onmouseout="MM_swapImgRestore()"onmouseup="MM_swapImgRestore()" onmousedown="MM_swapImage('Image9','','images/but_investmentovr.gif',1)" onclick="start();moverF();return false;"><img src="images/but_investment.gif" alt="Investment &amp; Real Estate" name="Image9" width="188" height="69" border="0" id="Image9" style="position:absolute;left:0px;top:312px;"/></a>

<a href="javascript:;" onmouseout="MM_swapImgRestore()"onmouseup="MM_swapImgRestore()" onmousedown="MM_swapImage('Image90','','images/but_downloadsovr.gif',1)" onclick="start();moverH();return false;"><img src="images/but_downloads.gif" alt="Downloads" name="Image90" width="188" height="69" border="0" id="Image90" style="position:absolute;left:0px;top:356px;"/></a>

<div id="loginContainer" style="position:absolute;top:400px;left:0px;width:188px;height:98px; background-image:url(images/back_login.gif); background-position:left top; background-repeat:no-repeat; z-index:3;">

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


<a href="javascript:;" onmouseout="MM_swapImgRestore()"onmouseup="MM_swapImgRestore()" onmousedown="MM_swapImage('Image12','','images/but_learnmoreovr.gif',1)"><img src="images/but_learnmore.gif" alt="Learn More" name="Image12" width="188" height="68" border="0" id="Image12" style="position:absolute;top:472px;left:0px;"/></a>


</div>

<?php //=================================================================================================?>



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

<div id="loader" style="position:absolute;left:480px;top:403px;"><img src="images/loading.gif" alt="Loading" /></div>


<div id="content1" style="position:absolute;left:250px;top:170px;width:528px;height:490px; font-family:Arial, Helvetica, sans-serif; font-size:14px;text-align:justify;">
<p><strong>Toll Free from the USA  &amp; Canada  877-620 3200</strong><br />
      <strong>Toll Free from UK 0808 101 7370</strong><br />
      <strong>Local: 1 758 457 8006/8007</strong><br />
      <strong>E-mail: info@baygardensresorts.com</strong></p>
  <p><strong>BAY GARDENS INN</strong><br />
    P.O. Box 1892   Castries<br />
    Tel: (758) 452 8200<br />
    Fax: (758) 452 8002<br />
    E-mail: baygardensinn@candw.lc<br />
  www.baygardensinn.com</p>
  Bay Gardens Inn compliments its sister resort, Bay  Gardens Hotel.&nbsp; The two properties are  next door to one another.&nbsp; The Inn has 33 air-conditioned rooms, each with a  refrigerator, cable television, direct dialing, data port, hair dryer, coffee  and tea making facilities and internet caf&eacute;.&nbsp;  There is a restaurant, bar, conference facility and swimming pool. We  offer free shuttle service to our sister property Bay   Gardens Beach  resort where you can also use their facilities.&nbsp;  The hotel also specializes in weddings and honey-moons. &nbsp;Bay Gardens Inn is situated in Rodney Bay,  five minutes from the beach and Rodney Bay Village with its numerous  restaurants and popular night spots.&nbsp; We  are also 5 minutes away from the newly opened Treasure Bay Casino.&nbsp; The only Casino on island<span style="line-height:20px; font-weight:normal;"><br />
<br />
<!--<ul><li>Breakfast: 7:30 a.m. - 10:30 a.m. at the High Tide Restaurant</li><li>
Pool Hours: 8:00 a.m. - 10:30 pm</li><li>
Tour Desk: </li><ul><li>
	Monday - Friday: 8:00 a.m. - 5:00 p.m. </li><li>                                                              
	Saturday: 8:00 a.m. - 12:00 p.m.</li><li>
	Sunday: Closed</li></ul><li>
Bar Snacks: 11:00 a.m. - 6:00 p.m. at the Low Tide Deli</li><li>
Pebbles Bar: 8:00 a.m. - 11:00 p.m.</li><li>
Aqua Vista Bar (Martini and Wine): 4:00 p.m. - 1:00 a.m.</li><li>
Lunch: 11:00 a.m. - 3:00 p.m. at the High Tide Restaurant</li><li>
Dinner: 6:30 p.m. -10:00 p.m. at the High Tide Restaurant</li></ul>-->
<br /><br />
<br /></span></div>


<div id="content2" style="position:absolute;left:-2000px;top:170px;width:528px;height:490px; font-family:Arial, Helvetica, sans-serif; font-size:14px;text-align:justify;">
<p>Since 1995, Bay Gardens  Resorts has been catering to <strong>local</strong> and <strong>international</strong> clients for  the hosting of their events. </p>
  <p>We are viewed by many as the <strong>preferred  choice</strong> of location for <strong>business</strong> <strong>meetings</strong>, <strong>conferences</strong>, <strong>corporate functions</strong>, private<strong> events</strong>, <strong>weddings</strong> and a whole  lot more.</p>
  <ol>
    <ol>
      <li>Our award winning  properties</li>
      <li>Great location</li>
      <li>Convenient  amenities</li>
      <li>Highly trained  staff</li>
      <li>Professional  management team</li>
      <li>State- of  &ndash;the-art equipment</li>
    </ol>
  </ol>
  <p>All make for compelling  reasons for choosing the Bay Gardens Resorts as the <strong>premier venue</strong> for  your next function. We have <strong>five conference centers</strong> across all three  properties which have various capacities, ranging from as many as 200 people to  small groups of 20 or less with various layouts available. Bay Gardens  Resorts has earned the <strong>unique reputation</strong> of rising to the occasion when  it comes to catering for events &ndash; however large, no matter the location or  under what conditions <strong>WE DELIVER!</strong>&nbsp; </p>
  
  
</div>


<div id="content3" style="position:absolute;left:-2000px;top:170px;width:528px;height:490px; font-family:Arial, Helvetica, sans-serif; font-size:14px;text-align:justify;">

  <ol>
    <li><strong>Bay Gardens  Inn</strong> </li>
    <ol>
      <li>Ixora Conference  Room (1088 sq. ft.)</li>
    </ol>
    <li><strong>Bay Gardens  Hotel</strong></li>
    <ol>
      <li>Bougainvillea  (1680 sq. ft.)</li>
      <li>Lantana (512 sq.  ft.)</li>
      <li>Begonia (494 sq.  ft.)</li>
    </ol>
    <li><strong>Bay</strong><strong> Gardens Beach</strong><strong> Resort &amp; Spa</strong></li>
    <ol>
      <li>Trios Conference Center (1166 sq. ft.)</li>
      <li>Board Room for  smaller private meetings</li>
    </ol>
  </ol>
  <p><strong>Our amenities for all  locations include:</strong></p>
  <ul>
    <li>Built in PA  System</li>
    <li>Projection Screen</li>
    <li>VCR/Television</li>
    <li>Podium with  microphone</li>
    <li>Flip Chart Easels</li>
    <li>Whiteboard</li>
    <li>WIFI</li>
  </ul>
  <p><strong>Optional Add-ons: </strong></p>
  
  <ul>
    <li>LCD Computer  Projector</li>
    <li>Desk&nbsp; and Lapel Microphones</li>
    <li>Laptop</li>
    <li>Flip Chart Paper  and Markers</li>
    <li>Secretariat  (Internet access included)</li>
    <li>Printing and  Photocopying</li>
  </ul>
</div>

<div id="content4" style="position:absolute;left:-2000px;top:170px;width:528px;height:490px; font-family:Arial, Helvetica, sans-serif; font-size:14px;text-align:justify;">
<p>We offer customized layouts  to accommodate our clients&rsquo; needs.&nbsp; Some  of our more common layouts are as follows:</p>
  <ol>
    <li><strong>U Shape &ndash; </strong>Encourages more interactivity<strong> </strong></li>
    <li><strong>Theater Style </strong>&ndash; Accommodates larger groups</li>
    <li><strong>Assembly Group </strong>-&nbsp;  Church and team gatherings</li>
    <li><strong>Classroom Set  Up </strong>&ndash; Training and Working Sessions</li>
    <li><strong>Hollow Square </strong>&ndash; Large Discussion Groups</li>
    <li><strong>Round Table  Set Up </strong>&ndash; Break out sessions,  cocktails and dinner settings<br />
        <br />
      (See more details in your Event Planner&rsquo;s Guide kit)</li>
  </ol>
  <p>Bay Gardens Resorts has earned the <strong>unique reputation</strong> of  rising to the occasion when it comes to catering for events &ndash; however large, no  matter the location or under what conditions <strong>WE DELIVER!</strong>&nbsp; </p>
  <p>Some of the larger offsite  events we have catered for are as follows:</p>
  <ul>
    <li>CHA 2009 - 3000  people</li>
    <li>FCCA 2009&nbsp; - 800 people</li>
    <li>Mandela&rsquo;s Welcome  Dinner &ndash; 800 people</li>
    <li>Cricket World Cup  &ndash; 500 people</li>
    <li>Lions Club  Convention &ndash; 500 people</li>
    <li>Located in the  hub of Rodney Bay Village</li>
    <li>15 Minutes drive  from one of the international airports and main seaport and 2 minutes from the  marina</li>
    <li>Walking distance  from banks, medical center, business center, shopping malls, duty free  shops,&nbsp; restaurants, bars and fast food  restaurants.</li>
    
  </ul>
</div>

<div id="content5" style="position:absolute;left:-2000px;top:170px;width:528px;height:490px; font-family:Arial, Helvetica, sans-serif; font-size:14px;text-align:justify;">
<ul>
<li>The Bay Gardens  Beach Resort is located on the world famous Reduit Beach.</li>
    <li>Other amenities  include dive shop, water sports facilities, state-of-the-art gym, full service  spa and beauty salon and gift shops. </li></ul>
    <p>Bay Gardens Resorts is renowned for its Weddings.&nbsp; We offer various settings</p>
  <ol>
    <li>Romantic Beach Weddings</li>
    <li>Exotic Garden Weddings</li>
    <li>Gazebo and Arch  Set Ups</li>
  </ol>
  <p>We completely <strong>customize</strong> your special day and have <strong>several options</strong> for <strong>indoor</strong> and <strong>outdoor</strong> dining and menu options.</p>
  <p>Please review our detailed  Weddings &amp; Honeymoon presentation including sample menus available in your  kit. <strong>We really outdo ourselves in this area</strong></p>
  <p><strong>Romantic Honeymoons</strong> is really our passion.&nbsp; Creating the <strong>ultimate getaway</strong> for  newly weds is really an experience that one will not soon forget.&nbsp; <strong>Complete pampering</strong> and special  attention is showered on our guests.</p>
  <ol>
    <li>Couples massages</li>
    <li>Personalized  island tours</li>
    <li>Private water  edge dining</li>
    <li>Special gourmet  meals</li>
  </ol>
  <p>&nbsp;</p>
  <p>YOUR WISH IS OUR COMMAND!<br />
      <strong>Coordinating your office  holiday party?</strong> </p>
    
</div>

<div id="content6" style="position:absolute;left:-2000px;top:170px;width:528px;height:490px; font-family:Arial, Helvetica, sans-serif; font-size:14px;text-align:justify;">
<p>We can assist in the complete  planning of your next holiday event. </p>
  <ol>
    <li>New Years Gala  Affair</li>
    <li>Romantic  Valentines</li>
    <li>Fun Easter  Celebrations</li>
    <li>Christmas</li>
    <li>Independence Day</li>
    <li>Jounen Kweyol</li>
    <li>National Day</li>
  </ol>
  <p>We make the atmosphere fun  and the whole place comes alive with <strong>great entertainment</strong>, <strong>food</strong>, <strong>decorations</strong> and all those special touches that will really bring the whole event together.</p>
  <p>BOOK EARLY! <br />
      <strong>New product launching?</strong><br />
      <strong>Need a place to WOW  potential clients?</strong></p>
  <p>We can provide a <strong>sophisticated</strong> <strong>atmosphere</strong> for your corporate functions.&nbsp;  You will have <strong>several</strong> <strong>options</strong>. </p>
  <ol>
    <li>Outdoor and  indoor </li>
    <li>Cocktail style  set ups</li>
    <li>Pool side</li>
    <li>Courtyard</li>
    <li>Private Lounge</li>
    <li>Patio</li>
    <li>On the Beach</li>
  </ol>
  
</div>

<div id="content7" style="position:absolute;left:-2000px;top:170px;width:528px;height:490px; font-family:Arial, Helvetica, sans-serif; font-size:14px;text-align:justify;">
<p>DIVERSITY IS OUR ADVANTAGE<br />
    Some memorable functions and  companies who have seized the opportunity and continue to utilize our venues  and coordination in making their corporate functions a success.</p>
 
  <ul>
    <li>Digicel</li>
    <li>Heineken</li>
    <li>ECFH</li>
    <li>Peter &amp;  Company</li>
    <li>Ectel</li>
    <li>Government</li>
  </ul>
  <p>Take the headache out of  planning that private party.&nbsp; Small and  intimate gatherings can be easily coordinated and customized for you and your  guests.&nbsp; We can accommodate groups with  accommodations as well as all inclusive packages.</p>
  <p>Here are some private  functions we have hosted in the past.</p>
  <ul>
    <li>Bridal Showers</li>
    <li>Birthdays</li>
    <li>Dinners</li>
    <li>Reunions</li>
  </ul>
</div>

<div id="content8" style="position:absolute;left:-2000px;top:170px;width:528px;height:490px; font-family:Arial, Helvetica, sans-serif; font-size:14px;text-align:justify;">
<p>LOCATION &ndash; LOCATION &ndash;  LOCATION</p>
  <p>Bay Gardens Resorts has been seen as a great location for video  and film production</p>
  <ol>
    <li>TV Commercials</li>
    <li>Music Videos</li>
    <li>Reality Shows</li>
  </ol>
  <p>We can accommodate your crew  as well as your actors with discounted group rates.</p>
  <p>LIGHTS, CAMERA &ndash; ACTION!<br />
    Very often one will hear Bay  Gardens Resorts referred to as your home away from home.&nbsp; </p>
  <p>For several of our <strong>corporate  repeat clients</strong>, we are able to <strong>accommodate</strong> them at our facilities on  a <strong>long term basis</strong> with options from our</p>
    <ol>
      <li>&nbsp;<strong>one or two bedroom Croton Suites Apartments</strong> or</li>
      <li>&nbsp;<strong>one or two bedroom suites at the Bay Gardens   Beach Resort &amp; Spa</strong></li>
    </ol>
  <p>Enjoy all the amenities and  conveniences that we have to offer and <strong>conduct your business</strong> in an  atmosphere which is <strong>professional</strong> and <strong>conducive</strong>. </p>
</div>


<div id="popbackstop" style="position:absolute;top:158px;left:240px;width:232px;height:137px;display:none; background-image:url(images/pop_back_back.gif); background-position:center center; background-repeat:no-repeat;"></div>

<div id="popnextstop" style="position:absolute;top:160px;left:220px;width:232px;height:137px;display:none; background-image:url(images/pop_next_back.gif); background-position:center center; background-repeat:no-repeat;"></div>

<a href="javascript:;" id="backbutton" onclick="moveBack()" style="display:none;" onmouseout="MM_swapImgRestore()" onmouseup="MM_swapImgRestore()" onmousedown="MM_swapImage('Image14','','images/button_backovr.gif',1)"><img src="images/button_back.gif" alt="Back" name="Image14" width="116" height="40" border="0" id="Image14" style="position:absolute;top:679px;left:221px;"/></a>

<a href="javascript:;" id="nextbutton" onclick="moveNext()" onmouseout="MM_swapImgRestore()" onmouseup="MM_swapImgRestore()" onmousedown="MM_swapImage('Image13','','images/button_nextovr.gif',1)"><img src="images/button_next.gif" alt="Next" name="Image13" width="115" height="40" border="0" id="Image13" style="position:absolute;top:679px;left:654px;"/></a> 

<a href="javascript:;" id="plainback" onclick="moveBack()" onmouseout="MM_swapImgRestore()" onmouseup="MM_swapImgRestore()" onmousedown="MM_swapImage('Image131','','images/button_plainovr.gif',1)"><img src="images/button_plain.gif" alt="Plain" name="Image131" width="115" height="40" border="0" id="Image131" style="position:absolute;top:679px;left:221px;"/></a>

<a href="javascript:;" id="plainnext" onclick="moveNext()" style="display:none;" onmouseout="MM_swapImgRestore()" onmouseup="MM_swapImgRestore()" onmousedown="MM_swapImage('Image130','','images/button_plainovr.gif',1)"><img src="images/button_plain.gif" alt="Plain" name="Image130" width="115" height="40" border="0" id="Image130" style="position:absolute;top:679px;left:654px;"/></a>

<a href="dailyschedule.php"><img src="images/logo_cocoresorts.gif" alt="Bay Gardens Beach Resort" style="position:absolute;top:60px;left:791px;" border="0"/></a>

<?php $thiskiosknum="BG2" ?>
<a href="vchannel.php" id="viewmap"><img src="images/tower_ad_visitorchannel.gif" border="0" alt="View Map" style="position:absolute;top:232px;left:791px;"/></a>

<a href="govorgs.php"><img src="images/but_gov.gif" alt="Government and Other Associations" style="position:absolute;top:351px;left:791px;" border="0"/></a>

<a href="slaspafidspre.php"><img src="images/slaspafids.gif" alt="Check Your Flight" border="0" style="position:absolute;top:470px;left:791px;"/></a>

<div style="position:absolute;top:200px;left:791px; font-family:Arial, Helvetica, sans-serif; font-weight:normal; font-size:14px;">Need Help? Call (758) 484-3511</div>

<a href="comment.php"><img border="0" src="images/back_comment.gif" alt="Leave a comment" style="position:absolute;top:598px;left:791px;"/></a>

</div>
</body>
</html>
