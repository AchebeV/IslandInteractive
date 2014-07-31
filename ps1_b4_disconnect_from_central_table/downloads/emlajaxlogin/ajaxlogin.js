
//===============================================================================================================MISC
loadImage= new Image();
loadImage.src="media/working.gif";

//var posits = findPos(document.getElementById("loadBar"))
//loadImage.style.top=0
//document.getElementById(elmnt).style.left=posits[0]-49

function hider() {
document.getElementById("editGoodMessage").style.display="none";
document.getElementById("editBadMessage").style.display="none";
document.getElementById("editClient").style.left="-1000px";
document.getElementById('listerTopOptions').style.display="none";
document.getElementById('listerTable').style.display="none";
document.getElementById("deleteGoodMessage").style.display="none";
document.getElementById("deleteBadMessage").style.display="none";
document.getElementById("endGoodMessage").style.display="none";
document.getElementById("addClientForm").style.left="-1000px";
document.getElementById("endBadMessage").style.display="none";
}

function showMe(div) {
hider();
	if (document.getElementById(div).style.left=="-1000px") {
		document.getElementById(div).style.left="200px";
		document.getElementById("endBadMessage").style.display="none";
		document.getElementById("endGoodMessage").style.display="none";
	}
}

function hideEdit() {
	document.getElementById('editClient').style.left="-1000px";
}

function delClientConf(clientid) {
  var r=confirm("Please Click Ok to Confirm Delete")
  if (r==true) {
    var del= deleteClient('loadBar','emlstrmmngr/ajaxdelnotice.php',clientid);
    } else {
    //do nothing
    }
  }

function stripslashes(str) {
str=str.replace(/\\'/g,'\'');
str=str.replace(/\\"/g,'"');
str=str.replace(/\\\\/g,'\\');
str=str.replace(/\\0/g,'\0');
return str;
}

function encodePlease(string) {
var encoded=encodeURIComponent(string);
return encoded;
}

function onConf(user) {
  var r=confirm("Click OK to turn on the DBS Live Stream. Your name will be recorded for this manual override.")
  if (r==true) {
    var turn= switchStatus('emlstrmmngr/ajaxstream.php','on',user);
    } else {
    //do nothing
    }
  }
  
function offConf(user) {
  var r=confirm("Click OK to turn off the DBS Live Stream. Your name will be recorded for this manual override.")
  if (r==true) {
    var turn= switchStatus('emlstrmmngr/ajaxstream.php','off',user);
    } else {
    //do nothing
    }
  }

function showLogin() {

document.getElementById('login').style.display='inline'; document.getElementById('loginContainer').style.backgroundImage='URL(images/back_login_new.gif)'; document.getElementById('registerButton').style.display='none'; document.getElementById('loginButton').style.display='none'; document.getElementById('myobj').style.height='421px'; document.getElementById('myobj').style.backgroundImage='URL(images/background_links_new.gif)'; document.getElementById('findoutButton').style.top="350px"; document.getElementById('loginContainer').style.height="150px"; 
//document.getElementById('loginButtonNew').style.display="block";

}

function hideLogin() {

document.getElementById('login').style.display='none'; document.getElementById('loginContainer').style.backgroundImage='URL(images/back_login.gif)'; document.getElementById('registerButton').style.display='inline'; document.getElementById('loginButton').style.display='inline'; document.getElementById('myobj').style.height='369px'; document.getElementById('myobj').style.backgroundImage='URL(images/background_links.gif)'; document.getElementById('findoutButton').style.top="298px"; document.getElementById('loginContainer').style.height="98px"; 
//document.getElementById('loginButtonNew').style.display="block";

}

function showLoggedIn() {

document.getElementById('loggedin').style.display='inline'; document.getElementById('loginContainer').style.backgroundImage='URL(images/back_login_new.gif)'; document.getElementById('registerButton').style.display='none'; document.getElementById('loginButton').style.display='none'; document.getElementById('myobj').style.height='421px'; document.getElementById('myobj').style.backgroundImage='URL(images/background_links_new.gif)'; document.getElementById('findoutButton').style.top="350px"; document.getElementById('loginContainer').style.height="150px"; 
//document.getElementById('loginButtonNew').style.display="block";

}
//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++AJAX LOGOUT
function ajaxLogout() {
	window.location='../dologout.php';
}

//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++AJAX GET INFO
function ajaxGetInfo(call,clientid) {

      var xmlhttp =  new XMLHttpRequest();
      xmlhttp.open('POST', call, true);
	  
	        xmlhttp.onreadystatechange = function() {
          if (xmlhttp.readyState == 4) {
              if (xmlhttp.status == 200)
				 var result = xmlhttp.responseXML.getElementsByTagName('result');
				 //var msg = xmlhttp.responseXML.getElementsByTagName('msg');
				 var firstname = xmlhttp.responseXML.getElementsByTagName('firstname');
				 var lastname = xmlhttp.responseXML.getElementsByTagName('lastname');
				 var renewaldate = xmlhttp.responseXML.getElementsByTagName('renewaldate');
				 var invoicetotal = xmlhttp.responseXML.getElementsByTagName('invoicetotal');
				 var totalhits = xmlhttp.responseXML.getElementsByTagName('totalhits');
				 var totalviews = xmlhttp.responseXML.getElementsByTagName('totalviews');
				 if (result.length>0) {				
				 //document.getElementById('loginloader').style.left='-1000px';
				 document.getElementById('logingood').style.left='0px';	
				 document.getElementById('logingood').innerHTML='<span style="font-weight:bold;">Welcome&nbsp;'+decodeURIComponent(firstname[0].firstChild.data)+'&nbsp;'+decodeURIComponent(lastname[0].firstChild.data)+'<br><br>My Renewal Info<br>Date:&nbsp;'+decodeURIComponent(renewaldate[0].firstChild.data)+'&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;Amount:&nbsp;$'+decodeURIComponent(invoicetotal[0].firstChild.data)+'<br><br>Quick Statistics<br>'+decodeURIComponent(totalhits[0].firstChild.data)+'&nbsp;Hits&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;'+decodeURIComponent(totalviews[0].firstChild.data)+'&nbsp;Visitors</span>';
				 } else {
				 document.getElementById('loginloader').style.left='-1000px';
				 document.getElementById('loginbad').style.left='0px';
				 }
          }
      }
    	
		
      /* Send the POST request */
      xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
      xmlhttp.send('clientid='+clientid);


}

//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++AJAX LOGIN
function ajaxLogin(call) {
	
	if (document.getElementById('username').value=="") {
	alert('Please enter your email address');
		  return (false);
	}
	
	var emailfilter=/^\w+[\+\.\w-]*@([\w-]+\.)*\w+[\w-]*\.([a-z]{2,4}|\d+)$/i
	  	var testEmail = document.getElementById("username");
		var returnval=emailfilter.test(testEmail.value)
		if (returnval==false){
		alert("Please enter a valid email address.")
		//e.select()
		return (false);
		}
		
	if (document.getElementById('password').value=="") {
	alert('Please enter your password');
		  return (false);
	}
	
	
	//hider();

      /* Cancel the submit event, and find out which form was submitted */
	  //knackerEvent(form);
      //var target = document.getElementById(field);
     //if (!target) return;
      
      /* Check if this form is already in the process of being submitted. 
       * If so, don't allow it to be submitted again. */
      //if (target.ajaxInProgress) return;
      
	
      /* Set up the request */
      var xmlhttp =  new XMLHttpRequest();
      xmlhttp.open('POST', call, true);
      
	  /*if select is chosen */
	  //if (document.getElementById(e).value = null) {
	  //document.getElementById(tohide).style.display='none'
	  //return;
	  //}
	
	function loginReload() {
		document.getElementById('password').value='';
		setTimeout("document.getElementById('logingood').style.left='-1000px'",2000);	
		setTimeout("document.getElementById('logingood').innerHTML=''",2000);
		setTimeout("document.getElementById('login').style.left='17px'",2000);
	}
	
	function setCookie(c_name,value,mins,path) {
	var today=new Date();
	var expire = new Date();
	expire.setTime(today.getTime() + 60000*mins);
	document.cookie=c_name+ "=" +escape(value)
	+ ";expires="+expire.toGMTString()+";path=/";
	}
	
	
      /* The callback function */
      xmlhttp.onreadystatechange = function() {
          if (xmlhttp.readyState == 4) {
              if (xmlhttp.status == 200)
				 var result = xmlhttp.responseXML.getElementsByTagName('result');
				 var msg = xmlhttp.responseXML.getElementsByTagName('msg');
				 var clientid = xmlhttp.responseXML.getElementsByTagName('clientid');
				 if (result.length>0) {				
				 //document.getElementById(p).removeChild(loadingImg);
				 document.getElementById('loginloader').style.left='-1000px';
				 document.getElementById('logingood').style.left='17px';	
				 document.getElementById('logingood').innerHTML='<br>'+decodeURIComponent(msg[0].firstChild.data)+'<br><br><a href="../members.php"><img id="myaccButton" src="images/button_myacc.gif" border="0" onmousedown="this.src=\'images/button_myaccovr.gif\'" onmouseup="this.src=\'images/button_myacc.gif\'" onmouseout="this.src=\'images/button_myacc.gif\'" style="position:absolute;top:70px;left:15px;display:block;" /></a><img id="logoutButton" src="images/button_logout.gif" onmousedown="this.src=\'images/button_logoutovr.gif\'" onmouseup="this.src=\'images/button_logout.gif\'" style="position:absolute;top:110px;left:15px;display:block;" onclick="ajaxLogout()" />';
				 
				 	if (result[0].firstChild.data=="pass" || result[0].firstChild.data=="notuser" || result[0].firstChild.data=="nopass" || result[0].firstChild.data=="nouser") {
					loginReload()
					}
				 
				 	if (result[0].firstChild.data=="good") {
					document.getElementById('loginButton').style.display='none';
					document.getElementById('myaccButton').style.display='block';
					 document.getElementById('logoutButton').style.display='block';
 					 setCookie('expirer',user,30)
					 //ajaxGetInfo('emlajaxlogin/ajaxgetinfo.php',clientid)
					}
				 	
					if (result[0].firstChild.data=="pass" || result[0].firstChild.data=="notuser" || result[0].firstChild.data=="nouser") {
					document.getElementById('loginButton').style.display='none';
					 document.getElementById('logoutButton').style.display='none';
					 document.getElementById('myaccButton').style.display='none';
					}
					
				 //target.ajaxInProgress = false;
				 }
				 else
				 {
				 document.getElementById('loginloader').style.left='-1000px';
				 document.getElementById('loginbad').style.left='17px';
				 //document.getElementById(p).removeChild(loadingImg);
				 //target.ajaxInProgress = false;
				 }
          }
      }
    	
		user=document.getElementById('username').value;
		pass=document.getElementById('password').value;
		
      /* Send the POST request */
      xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
      xmlhttp.send('user='+user+'&pass='+pass);
      
      /* Add temporary feedback that the request has been sent */   
      //var loadingImg = document.createElement('img');
      //loadingImg.src = 'media/working.gif';
	  document.getElementById('loginloader').style.left='17px'
	  document.getElementById('login').style.left='-1000px'
      //document.getElementById(p).appendChild(loadingImg);
      //target.ajaxInProgress = true;

return(false);
	  
}
 


