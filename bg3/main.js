// JavaScript Document


// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++FADE IN SLIDE SHOW

/***********************************************
* Ultimate Fade-In Slideshow (v1.51): © Dynamic Drive (http://www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit http://www.dynamicdrive.com/ for this script and 100s more.
***********************************************/


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
document.write('<div><img name="defaultslide'+this.slideshowid+'" src="'+this.postimages[0].src+'" /></div>')
 
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
slideHTML+='<img src="'+this.postimages[picindex].src+'" border="'+this.imageborder+'px" />'
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



function MM_CheckFlashVersion(reqVerStr,msg){
  with(navigator){
    var isIE  = (appVersion.indexOf("MSIE") != -1 && userAgent.indexOf("Opera") == -1);
    var isWin = (appVersion.toLowerCase().indexOf("win") != -1);
    if (!isIE || !isWin){  
      var flashVer = -1;
      if (plugins && plugins.length > 0){
        var desc = plugins["Shockwave Flash"] ? plugins["Shockwave Flash"].description : "";
        desc = plugins["Shockwave Flash 2.0"] ? plugins["Shockwave Flash 2.0"].description : desc;
        if (desc == "") flashVer = -1;
        else{
          var descArr = desc.split(" ");
          var tempArrMajor = descArr[2].split(".");
          var verMajor = tempArrMajor[0];
          var tempArrMinor = (descArr[3] != "") ? descArr[3].split("r") : descArr[4].split("r");
          var verMinor = (tempArrMinor[1] > 0) ? tempArrMinor[1] : 0;
          flashVer =  parseFloat(verMajor + "." + verMinor);
        }
      }
      // WebTV has Flash Player 4 or lower -- too low for video
      else if (userAgent.toLowerCase().indexOf("webtv") != -1) flashVer = 4.0;

      var verArr = reqVerStr.split(",");
      var reqVer = parseFloat(verArr[0] + "." + verArr[2]);
  
      if (flashVer < reqVer){
        if (confirm(msg))
          window.location = "http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash";
      }
    }
  } 
}


//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++END FADE IN SLIDE SHOW


// ==============================================================MAIN MENU EXIT

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
function moverDA() {
	if (xxx > endPos) {
	xxx -=15; moveit(); setTimeout('moverDA()',1);
	} else {
	setTimeout('window.location=\'experiencestlucia/index.php?from=out\';',200);
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

// ============================================================ END MAIN MENU EXIT


// ============================================================ MAIN MENU ENTRANCE

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


// ============================================================ END MAIN MENU ENTRANCE


// ============================================================ SUPPLEMENTARY FUNCTIONS

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


function loaderHide() {
document.getElementById('loader').style.left='-1000px';
document.getElementById('content'+pagenum).style.left='230px';
}

pagenum=1;
function loaderShow() {
document.getElementById('content').style.left='-2000px';
document.getElementById('loader').style.left='480px';
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}


pagenum=1;
totalpages=4;
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

// ============================================================ END SUPPLEMENTARY FUNCTIONS
