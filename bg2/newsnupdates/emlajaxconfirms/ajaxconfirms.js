function getCookie(c_name)
{
if (document.cookie.length>0)
  {
  c_start=document.cookie.indexOf(c_name + "=");
  if (c_start!=-1)
    { 
    c_start=c_start + c_name.length+1; 
    c_end=document.cookie.indexOf(";",c_start);
    if (c_end==-1) c_end=document.cookie.length;
    return unescape(document.cookie.substring(c_start,c_end));
    } 
  }
return "";
}

function nextPop(button,to,kioskcode) {
hider();
document.getElementById(button+'pop').style.display='block';
document.getElementById('advertto').value=to;
document.getElementById('kioskcode').value=kioskcode;
}

function checkCookie(calltype,to,kioskcode) {
	var username=getCookie('expirer');
	if (username!=null && username!="") {
		hider();
		if (calltype=="review") {
			if (document.getElementById('reviewtext').value=="" || document.getElementById('reviewtext').value=="Enter your review") {
				alert('Please enter your review and select a rating');
				return false;
			} else {
				sendConfirm('emlajaxconfirms/ajaxsendconf.php','review',to,kioskcode);
			}
		} else if (calltype=="book") {
			hider();
			document.getElementById('taxipop2').style.display="block";
		} else {
			document.getElementById('selecttimepop').style.display='block';
			document.getElementById('confirmtype').value=calltype;
		}
		
	} else {
		
		//display form here
		if (calltype=="addtime") {
			hider();
		document.getElementById('loginpop').style.display='block';
		document.getElementById('loginpop').innerHTML='<strong><br>This feature is coming soon.<br><br>Soon you will be able to plan your vacation using our trip scheduler. </strong><br><br><a href=\"javascript:;\" onclick=\"closePop(\'loginpop\')\"><img src=\"../images/button_close.gif\" border=\"0\" /></a>';
		} else if (calltype=="taxi") {
			hider();
			nextPop('register',to,kioskcode);
			document.getElementById('registerskipbutton').style.display="none";
			document.getElementById('registerclosebutton').style.display="block";
			//normal selecttime
		} else if (calltype=="book") {
			hider();
			nextPop('register',to,kioskcode);
			document.getElementById('registerskipbutton').style.display="none";
			document.getElementById('registerclosebutton').style.display="block";
			//normal selecttime
			//taxipop2
		} else if (calltype=="review") {
			if (document.getElementById('reviewtext').value=="" || document.getElementById('reviewtext').value=="Enter your review") {
				alert('Please enter your review and select a rating');
				return false;
			} else {
				hider();
				nextPop('register',to,kioskcode);
				document.getElementById('registerclosebutton').style.display="none";
				document.getElementById('registerskipbutton').style.display="block";
			}
			
			//show skip button
		}
		
	}
}

function preConfirm() {

document.getElementById('login').style.display='inline'; document.getElementById('loginContainer').style.backgroundImage='URL(images/back_login_new.gif)'; document.getElementById('registerButton').style.display='none'; document.getElementById('loginButton').style.display='none'; document.getElementById('myobj').style.height='421px'; document.getElementById('myobj').style.backgroundImage='URL(images/background_links_new.gif)'; document.getElementById('findoutButton').style.top="350px"; document.getElementById('loginContainer').style.height="150px"; 
//document.getElementById('loginButtonNew').style.display="block";

}

//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++AJAX GET INFO
function sendConfirm(call,calltype,adid,kioskid) {
		
	var username=getCookie('expirer');	
		if (calltype=="book" || calltype=="addtime" || calltype=="taxi") {
			if (document.getElementById('datefor').value=="") {
				alert("Please select a date");
				return false;
			}
			if (document.getElementById('timefor').value=="") {
				alert("Please enter a time");
				return false;
			}
		} else if (calltype=="review") {
			//do nothing
		} else {
			alert("Call eh good");
				return false;
		}
      var xmlhttp =  new XMLHttpRequest();
      xmlhttp.open('POST', call, true);
	  
	        xmlhttp.onreadystatechange = function() {
          if (xmlhttp.readyState == 4) {
              if (xmlhttp.status == 200)
				 var result = xmlhttp.responseXML.getElementsByTagName('result');
				 //var msg = xmlhttp.responseXML.getElementsByTagName('msg');
				 var msg = xmlhttp.responseXML.getElementsByTagName('msg');
				 			
				 if (result.length>0) {				
				 //document.getElementById('loginloader').style.left='-1000px';
				 document.getElementById('thankyoupop').style.display='block';
				 document.getElementById('thankyoupop').innerHTML=decodeURIComponent(msg[0].firstChild.data);
				 document.getElementById('loader').style.left='-1000px';
				 hider();
				 //setTimeout("document.getElementById('thankyoupop').style.display='none'", 5000);
				 } else {
				 //document.getElementById('loginloader').style.left='-1000px';
				 //document.getElementById('loginbad').style.left='0px';
				 }
          }
      }
    	
		
		if (document.getElementById('reviewstars1').checked==true) {
			stars=document.getElementById('reviewstars1').value;
		} else if (document.getElementById('reviewstars2').checked==true) {
			stars=document.getElementById('reviewstars2').value;
		} else if (document.getElementById('reviewstars3').checked==true) {
			stars=document.getElementById('reviewstars3').value;
		} else if (document.getElementById('reviewstars4').checked==true) {
			stars=document.getElementById('reviewstars4').value;
		} else if (document.getElementById('reviewstars5').checked==true) {
			stars=document.getElementById('reviewstars5').value;
		} else {
			stars='';	
		}
		
		document.getElementById('loader').style.zIndex='999';
		document.getElementById('loader').style.left='480px';
      /* Send the POST request */
      xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	  
	  if (calltype=='review') {
		  
      	xmlhttp.send('username='+username+'&calltype='+calltype+'&adid='+adid+'&kioskid='+kioskid+'&comments='+document.getElementById('reviewtext').value+'&stars='+stars+'&fullname='+document.getElementById('fullname').value+'&email='+document.getElementById('email1').value+'&phone='+document.getElementById('phone').value+'&country='+document.getElementById('country').value+'&room='+document.getElementById('details').value+'&hotel='+document.getElementById('hotel').value+'&specialinfo='+document.getElementById('bookcomment').value);
		document.getElementById('confirmsiframe').src='http://common.island-interactive.com/iframecalls/iframeconfirms.php?username='+encodeURI(username)+'&calltype='+calltype+'&adid='+adid+'&kioskid='+kioskid+'&comments='+encodeURI(document.getElementById('reviewtext').value)+'&stars='+stars+'&fullname='+document.getElementById('fullname').value+'&email='+document.getElementById('email1').value+'&phone='+document.getElementById('phone').value+'&country='+document.getElementById('country').value+'&room='+document.getElementById('details').value+'&hotel='+document.getElementById('hotel').value+'&specialinfo='+document.getElementById('bookcomment').value;
	  
	  } else if (calltype=='book') {
		  
		  xmlhttp.send('username='+username+'&calltype='+calltype+'&adid='+adid+'&kioskid='+kioskid+'&datefor='+document.getElementById('datefor').value+'&timefor='+document.getElementById('timefor').value+'&fullname='+document.getElementById('fullname').value+'&email='+document.getElementById('email1').value+'&phone='+document.getElementById('phone').value+'&country='+document.getElementById('country').value+'&room='+document.getElementById('details').value+'&hotel='+document.getElementById('hotel').value+'&taxineeded='+document.getElementById('taxineeded').value+'&specialinfo='+document.getElementById('bookcomment').value);
		  document.getElementById('confirmsiframe').src='http://common.island-interactive.com/iframecalls/iframeconfirms.php?username='+encodeURI(username)+'&calltype='+calltype+'&adid='+adid+'&kioskid='+kioskid+'&datefor='+encodeURI(document.getElementById('datefor').value)+'&timefor='+encodeURI(document.getElementById('timefor').value)+'&fullname='+document.getElementById('fullname').value+'&email='+document.getElementById('email1').value+'&phone='+document.getElementById('phone').value+'&country='+document.getElementById('country').value+'&room='+document.getElementById('details').value+'&hotel='+document.getElementById('hotel').value+'&taxineeded='+document.getElementById('taxineeded').value+'&specialinfo='+document.getElementById('bookcomment').value;
		  
  	  } else if (calltype=='taxi') {
		  
		  xmlhttp.send('username='+username+'&calltype='+calltype+'&adid='+adid+'&kioskid='+kioskid+'&datefor='+document.getElementById('datefor').value+'&timefor='+document.getElementById('timefor').value+'&fullname='+document.getElementById('fullname').value+'&email='+document.getElementById('email1').value+'&phone='+document.getElementById('phone').value+'&country='+document.getElementById('country').value+'&room='+document.getElementById('details').value+'&hotel='+document.getElementById('hotel').value+'&specialinfo='+document.getElementById('bookcomment').value);
		  document.getElementById('confirmsiframe').src='http://common.island-interactive.com/iframecalls/iframeconfirms.php?username='+encodeURI(username)+'&calltype='+calltype+'&adid='+adid+'&kioskid='+kioskid+'&datefor='+encodeURI(document.getElementById('datefor').value)+'&timefor='+encodeURI(document.getElementById('timefor').value+'&fullname='+document.getElementById('fullname').value+'&email='+document.getElementById('email1').value+'&phone='+document.getElementById('phone').value+'&country='+document.getElementById('country').value+'&room='+document.getElementById('details').value+'&hotel='+document.getElementById('hotel').value+'&specialinfo='+document.getElementById('bookcomment').value);
	 
	 } else if (calltype=='addtime') {
		 
		  xmlhttp.send('username='+username+'&calltype='+calltype+'&adid='+adid+'&kioskid='+kioskid+'&datefor='+document.getElementById('datefor').value+'&timefor='+document.getElementById('timefor').value+'&fullname='+document.getElementById('fullname').value+'&email='+document.getElementById('email1').value+'&phone='+document.getElementById('phone').value+'&country='+document.getElementById('country').value+'&room='+document.getElementById('details').value+'&hotel='+document.getElementById('hotel').value+'&specialinfo='+document.getElementById('bookcomment').value);
		  document.getElementById('confirmsiframe').src='http://common.island-interactive.com/iframecalls/iframeconfirms.php?username='+encodeURI(username)+'&calltype='+calltype+'&adid='+adid+'&kioskid='+kioskid+'&datefor='+encodeURI(document.getElementById('datefor').value)+'&timefor='+encodeURI(document.getElementById('timefor').value)+'&fullname='+document.getElementById('fullname').value+'&email='+document.getElementById('email1').value+'&phone='+document.getElementById('phone').value+'&country='+document.getElementById('country').value+'&room='+document.getElementById('details').value+'&hotel='+document.getElementById('hotel').value+'&specialinfo='+document.getElementById('bookcomment').value;
		  
	  }


}


//document.getElementById('loginpop').style.display='block';
//document.getElementById('loginpop').innerHTML='<strong><br>Thank you for previewing Island Interactive.<br><br>You must be logged in to use this feature. <br>Please press the login or register button to the bottom left of any screen.</strong><br><br><a href=\"javascript:;\" onclick=\"closePop(\'loginpop\')\"><img src=\"../images/button_close.gif\" border=\"0\" /></a>';