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

function loaderShow() {
document.getElementById('content').style.left='-2000px';
document.getElementById('loader').style.left='480px';
}

function linkClick(cont) {
document.getElementById('content1').style.left='-2000px';
document.getElementById('content2').style.left='-2000px';
document.getElementById('content3').style.left='-2000px';
document.getElementById('content4').style.left='-2000px';
document.getElementById('content'+cont).style.left='230px';
}
//-->
</script>
</head>
<body onload=" MM_preloadImages('images/but_link1ovr.gif','images/but_link2ovr.gif','images/but_link3ovr.gif','images/but_link4ovr.gif','../images/but_homeovr.gif','../images/but_welcomeovr.gif','../images/but_newsovr.gif','../images/but_loginovr.gif','../images/but_registerovr.gif','../images/but_learnmoreovr.gif','../images/button_nextovr.gif','../images/button_backovr.gif');loaderHide()">

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
			
			echo 'fadeimages['.$i.']=["../'.$banner_file.'", "'.$banner_link.'", "'.$banner_target.'"];';
			$i++;
			
		}
	
	?>
//new fadeshow(../images_ARRAY_NAME, slideshow_width, slideshow_height, borderwidth, delay, pause (0=no, 1=yes), optionalRandomOrder)
new fadeshow(fadeimages, 629, 120, 0, 5000, 0, "R")
</script><!--<img src="../images/ad_columbian.gif" border="0" alt="Advertisment" style="position:absolute;left:185px;top:30px;"/>--></a></div>

<?php //++++++++++++++++=+++++++++++++++++++++++END BANNER+++++++++++++++++++++++++++++++++++++++++++++++++++?>

<div id="loader" style="position:absolute;left:480px;top:403px;"><img src="../images/loading.gif" alt="Loading" /></div>


<div id="content1" style="position:absolute;left:-2000px;top:170px;width:528px;height:490px; font-family:Times New Roman, Times, serif; font-size:14px;text-align:justify;">
	  <span style="line-height:17px; font-weight:normal;">
	Want to see St. Lucia from a different angle. Take to the air, and view the island from up above.<br />
	<br /><br />
	</span>
	
	<div id="itemcontent" style="position:absolute;top:100px;left:0px;width:100%;">
	
	<a href="profilepics.php?id=19" style="text-decoration:none;color:black;" onmousedown="style.color='#CC0000'" onmouseup="style.color='#000000'"><div id="item1" style="position:relative;top:0px;left:0px;width:100%;height:100px;">
	<div style="position:absolute;top:0px;left:0px;"><img border="0" src="../images/item_SLUHelicopters.gif" /></div>
	<div style="position:absolute;top:0px;left:150px; line-height:12px;"><img border="0" src="../images/stars.gif" /> - <strong>St. Lucia Helicopters</strong><br /><span style=" font-size:10px;">Avg User Rating</span>
</div>
	<div style="position:absolute;top:35px;left:150px;">Few places anywhere offer the spectacular scenery that is St. Lucia's. And there is no better way to take it all in than by helicopter.  </div></div></a>

	</div>
</div>


<div id="content2" style="position:absolute;left:-2000px;top:170px;width:528px;height:490px; font-family:Times New Roman, Times, serif; font-size:14px;text-align:justify;">
	  <span style="line-height:17px; font-weight:normal;">
	In St. Lucia there are always many adventurous things to do The Island has a range of recreational facilities from hiking, horse back riding, cycling , playing golf tennis or squash. One can also choose to take it slow and visit one of the many spas situated around the island.<br />
	<br />
	</span>
	<div id="itemcontent" style="position:absolute;top:100px;left:0px;width:100%;">
	<a href="javascript:;" style="text-decoration:none;color:black;" onmousedown="style.color='#CC0000'" onmouseup="style.color='#000000'"><div id="item1" style="position:relative;top:0px;left:0px;width:100%;height:100px;">
	<div style="position:absolute;top:0px;left:0px;"><img border="0" src="../images/item_placeholder.gif" /></div>
	<div style="position:absolute;top:0px;left:150px; line-height:12px;"><img border="0" src="../images/stars.gif" /> - <strong>Item Title / Name</strong><br /><span style=" font-size:10px;">Avg User Rating</span>
</div>
	<div style="position:absolute;top:35px;left:150px;">Sed do eiusmod tempor incididunt lorem ipsum dolor sit amet, in reprehenderit in voluptate. Eu fugiat nulla pariatur. Ut enim ad minim veniam, velit esse cillum dolore sunt in culpa. Cupidatat </div></div></a>

<a href="javascript:;" style="text-decoration:none;color:black;" onmousedown="style.color='#CC0000'" onmouseup="style.color='#000000'"><div id="item2" style="position:relative;top:0px;left:0px;width:100%;height:100px;">
	<div style="position:absolute;top:0px;left:0px;"><img border="0" src="../images/item_placeholder.gif" /></div>
	<div style="position:absolute;top:0px;left:150px; line-height:12px;"><img border="0" src="../images/stars.gif" /> - <strong>Item Title / Name</strong><br /><span style=" font-size:10px;">Avg User Rating</span>
</div>
	<div style="position:absolute;top:35px;left:150px;">Sed do eiusmod tempor incididunt lorem ipsum dolor sit amet, in reprehenderit in voluptate. Eu fugiat nulla pariatur. Ut enim ad minim veniam, velit esse cillum dolore sunt in culpa. Cupidatat </div></div></a>
	
	<a href="javascript:;" style="text-decoration:none;color:black;" onmousedown="style.color='#CC0000'" onmouseup="style.color='#000000'"><div id="item3" style="position:relative;top:0px;left:0px;width:100%;height:100px;">
	<div style="position:absolute;top:0px;left:0px;"><img border="0" src="../images/item_placeholder.gif" /></div>
	<div style="position:absolute;top:0px;left:150px; line-height:12px;"><img border="0" src="../images/stars.gif" /> - <strong>Item Title / Name</strong><br /><span style=" font-size:10px;">Avg User Rating</span>
</div>
	<div style="position:absolute;top:35px;left:150px;">Sed do eiusmod tempor incididunt lorem ipsum dolor sit amet, in reprehenderit in voluptate. Eu fugiat nulla pariatur. Ut enim ad minim veniam, velit esse cillum dolore sunt in culpa. Cupidatat </div></div></a>
	
	<a href="javascript:;" style="text-decoration:none;color:black;" onmousedown="style.color='#CC0000'" onmouseup="style.color='#000000'"><div id="item4" style="position:relative;top:0px;left:0px;width:100%;height:100px;">
	<div style="position:absolute;top:0px;left:0px;"><img border="0" src="../images/item_placeholder.gif" /></div>
	<div style="position:absolute;top:0px;left:150px; line-height:12px;"><img border="0" src="../images/stars.gif" /> - <strong>Item Title / Name</strong><br /><span style=" font-size:10px;">Avg User Rating</span>
</div>
	<div style="position:absolute;top:35px;left:150px;">Sed do eiusmod tempor incididunt lorem ipsum dolor sit amet, in reprehenderit in voluptate. Eu fugiat nulla pariatur. Ut enim ad minim veniam, velit esse cillum dolore sunt in culpa. Cupidatat </div></div></a>
		
	</div>
</div>

<div id="content3" style="position:absolute;left:-2000px;top:170px;width:528px;height:490px; font-family:Times New Roman, Times, serif; font-size:14px;text-align:justify;">
	  <span style="line-height:17px; font-weight:normal;">
	Visitors may enjoy the leisurely pleasures of touring the island by chartering a yacht for a day cruise or evening sail, or relax and go whale watching off the beautiful coast lines. For those who enjoy the thrill of more vigorous pursuits, there are plenty of places to windsurf, deep sea dive and water-ski as well.<br />
	<br />
	</span>
	<div id="itemcontent" style="position:absolute;top:100px;left:0px;width:100%;">
	<a href="javascript:;" style="text-decoration:none;color:black;" onmousedown="style.color='#CC0000'" onmouseup="style.color='#000000'"><div id="item1" style="position:relative;top:0px;left:0px;width:100%;height:100px;">
	<div style="position:absolute;top:0px;left:0px;"><img border="0" src="../images/item_placeholder.gif" /></div>
	<div style="position:absolute;top:0px;left:150px; line-height:12px;"><img border="0" src="../images/stars.gif" /> - <strong>Item Title / Name</strong><br /><span style=" font-size:10px;">Avg User Rating</span>
</div>
	<div style="position:absolute;top:35px;left:150px;">Sed do eiusmod tempor incididunt lorem ipsum dolor sit amet, in reprehenderit in voluptate. Eu fugiat nulla pariatur. Ut enim ad minim veniam, velit esse cillum dolore sunt in culpa. Cupidatat </div></div></a>

<a href="javascript:;" style="text-decoration:none;color:black;" onmousedown="style.color='#CC0000'" onmouseup="style.color='#000000'"><div id="item2" style="position:relative;top:0px;left:0px;width:100%;height:100px;">
	<div style="position:absolute;top:0px;left:0px;"><img border="0" src="../images/item_placeholder.gif" /></div>
	<div style="position:absolute;top:0px;left:150px; line-height:12px;"><img border="0" src="../images/stars.gif" /> - <strong>Item Title / Name</strong><br /><span style=" font-size:10px;">Avg User Rating</span>
</div>
	<div style="position:absolute;top:35px;left:150px;">Sed do eiusmod tempor incididunt lorem ipsum dolor sit amet, in reprehenderit in voluptate. Eu fugiat nulla pariatur. Ut enim ad minim veniam, velit esse cillum dolore sunt in culpa. Cupidatat </div></div></a>
	
	<a href="javascript:;" style="text-decoration:none;color:black;" onmousedown="style.color='#CC0000'" onmouseup="style.color='#000000'"><div id="item3" style="position:relative;top:0px;left:0px;width:100%;height:100px;">
	<div style="position:absolute;top:0px;left:0px;"><img border="0" src="../images/item_placeholder.gif" /></div>
	<div style="position:absolute;top:0px;left:150px; line-height:12px;"><img border="0" src="../images/stars.gif" /> - <strong>Item Title / Name</strong><br /><span style=" font-size:10px;">Avg User Rating</span>
</div>
	<div style="position:absolute;top:35px;left:150px;">Sed do eiusmod tempor incididunt lorem ipsum dolor sit amet, in reprehenderit in voluptate. Eu fugiat nulla pariatur. Ut enim ad minim veniam, velit esse cillum dolore sunt in culpa. Cupidatat </div></div></a>
	
	<a href="javascript:;" style="text-decoration:none;color:black;" onmousedown="style.color='#CC0000'" onmouseup="style.color='#000000'"><div id="item4" style="position:relative;top:0px;left:0px;width:100%;height:100px;">
	<div style="position:absolute;top:0px;left:0px;"><img border="0" src="../images/item_placeholder.gif" /></div>
	<div style="position:absolute;top:0px;left:150px; line-height:12px;"><img border="0" src="../images/stars.gif" /> - <strong>Item Title / Name</strong><br /><span style=" font-size:10px;">Avg User Rating</span>
</div>
	<div style="position:absolute;top:35px;left:150px;">Sed do eiusmod tempor incididunt lorem ipsum dolor sit amet, in reprehenderit in voluptate. Eu fugiat nulla pariatur. Ut enim ad minim veniam, velit esse cillum dolore sunt in culpa. Cupidatat </div></div></a>
		</div>
	
</div>

<div id="content4" style="position:absolute;left:-2000px;top:170px;width:528px;height:490px; font-family:Times New Roman, Times, serif; font-size:14px;text-align:justify;">
	  <span style="line-height:17px; font-weight:normal;">
	Sed do eiusmod tempor incididunt lorem ipsum dolor sit amet, in reprehenderit in voluptate. Eu fugiat nulla pariatur. Ut enim ad minim veniam, velit esse cillum dolore sunt in culpa. CupidatatSed do eiusmod tempor incididunt lorem ipsum dolor sit amet, in reprehenderit in voluptate. Eu fugiat nulla pariatur. Ut enim ad minim veniam, velit esse cillum dolore sunt in culpa. Cupidatat<br />
	<br />
	</span>
	<div id="itemcontent" style="position:absolute;top:100px;left:0px;width:100%;">
	<a href="javascript:;" style="text-decoration:none;color:black;" onmousedown="style.color='#CC0000'" onmouseup="style.color='#000000'"><div id="item1" style="position:relative;top:0px;left:0px;width:100%;height:100px;">
	<div style="position:absolute;top:0px;left:0px;"><img border="0" src="../images/item_placeholder.gif" /></div>
	<div style="position:absolute;top:0px;left:150px; line-height:12px;"><img border="0" src="../images/stars.gif" /> - <strong>Item Title / Name</strong><br /><span style=" font-size:10px;">Avg User Rating</span>
</div>
	<div style="position:absolute;top:35px;left:150px;">Sed do eiusmod tempor incididunt lorem ipsum dolor sit amet, in reprehenderit in voluptate. Eu fugiat nulla pariatur. Ut enim ad minim veniam, velit esse cillum dolore sunt in culpa. Cupidatat </div></div></a>

<a href="javascript:;" style="text-decoration:none;color:black;" onmousedown="style.color='#CC0000'" onmouseup="style.color='#000000'"><div id="item2" style="position:relative;top:0px;left:0px;width:100%;height:100px;">
	<div style="position:absolute;top:0px;left:0px;"><img border="0" src="../images/item_placeholder.gif" /></div>
	<div style="position:absolute;top:0px;left:150px; line-height:12px;"><img border="0" src="../images/stars.gif" /> - <strong>Item Title / Name</strong><br /><span style=" font-size:10px;">Avg User Rating</span>
</div>
	<div style="position:absolute;top:35px;left:150px;">Sed do eiusmod tempor incididunt lorem ipsum dolor sit amet, in reprehenderit in voluptate. Eu fugiat nulla pariatur. Ut enim ad minim veniam, velit esse cillum dolore sunt in culpa. Cupidatat </div></div></a>
	
	<a href="javascript:;" style="text-decoration:none;color:black;" onmousedown="style.color='#CC0000'" onmouseup="style.color='#000000'"><div id="item3" style="position:relative;top:0px;left:0px;width:100%;height:100px;">
	<div style="position:absolute;top:0px;left:0px;"><img border="0" src="../images/item_placeholder.gif" /></div>
	<div style="position:absolute;top:0px;left:150px; line-height:12px;"><img border="0" src="../images/stars.gif" /> - <strong>Item Title / Name</strong><br /><span style=" font-size:10px;">Avg User Rating</span>
</div>
	<div style="position:absolute;top:35px;left:150px;">Sed do eiusmod tempor incididunt lorem ipsum dolor sit amet, in reprehenderit in voluptate. Eu fugiat nulla pariatur. Ut enim ad minim veniam, velit esse cillum dolore sunt in culpa. Cupidatat </div></div></a>
	
	<a href="javascript:;" style="text-decoration:none;color:black;" onmousedown="style.color='#CC0000'" onmouseup="style.color='#000000'"><div id="item4" style="position:relative;top:0px;left:0px;width:100%;height:100px;">
	<div style="position:absolute;top:0px;left:0px;"><img border="0" src="../images/item_placeholder.gif" /></div>
	<div style="position:absolute;top:0px;left:150px; line-height:12px;"><img border="0" src="../images/stars.gif" /> - <strong>Item Title / Name</strong><br /><span style=" font-size:10px;">Avg User Rating</span>
</div>
	<div style="position:absolute;top:35px;left:150px;">Sed do eiusmod tempor incididunt lorem ipsum dolor sit amet, in reprehenderit in voluptate. Eu fugiat nulla pariatur. Ut enim ad minim veniam, velit esse cillum dolore sunt in culpa. Cupidatat </div></div></a>
		
	</div>
</div>


<a href="javascript:;" style="display:none" onmouseout="MM_swapImgRestore()" onmouseup="MM_swapImgRestore()" onmousedown="MM_swapImage('Image14','','../images/button_backovr.gif',1)"><img src="../images/button_back.gif" alt="Back" name="Image14" width="116" height="40" border="0" id="Image14" style="position:absolute;top:679px;left:221px;"/></a>

<a href="javascript:;" style="display:none" onmouseout="MM_swapImgRestore()" onmouseup="MM_swapImgRestore()" onmousedown="MM_swapImage('Image13','','../images/button_nextovr.gif',1)"><img src="../images/button_next.gif" alt="Next" name="Image13" width="115" height="40" border="0" id="Image13" style="position:absolute;top:679px;left:654px;"/></a>

<a href="../dailyschedule.php"><img src="../images/logo_cocoresorts.gif" alt="Bay Gardens Beach Resort" style="position:absolute;top:60px;left:791px;" border="0"/></a>

<?php $thiskiosknum="PROTO" ?>
<a href="http://common.island-interactive.com/gmapget.php?kid=<?php echo $thiskiosknum ?>" id="viewmap"><img src="../images/tower_admap.gif" border="0" alt="View Map" style="position:absolute;top:232px;left:791px;"/></a>

<a href="../govorgs.php"><img src="../images/but_gov.gif" alt="Government and Other Associations" style="position:absolute;top:351px;left:791px;" border="0"/></a>

<a href="../slaspafidspre.php"><img src="../images/slaspafids.gif" alt="Check Your Flight" border="0" style="position:absolute;top:470px;left:791px;"/></a>

<div style="position:absolute;top:200px;left:791px; font-family:Arial, Helvetica, sans-serif; font-weight:normal; font-size:14px;">Need Help? Call (758) 484-3511</div>

<a href="../comment.php"><img border="0" src="../images/back_comment.gif" alt="Leave a comment" style="position:absolute;top:598px;left:791px;"/></a>

</div>
</body>
</html>
