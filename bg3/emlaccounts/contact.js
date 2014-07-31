function stripslashes(str) {
str=str.replace(/\\'/g,'\'');
str=str.replace(/\\"/g,'"');
str=str.replace(/\\\\/g,'\\');
str=str.replace(/\\0/g,'\0');
return str;
}

var register =1;

function showPassFields() {

	if (register==1) {
	
	a=document.getElementById('contactTable');
	b=a.insertRow(7);
	
	c=b.insertCell(0);
	d=b.insertCell(1);
	
	c.align='right';
	c.innerHTML='Password:';
	d.align='left';
	d.innerHTML='<input type="password" name="pass1" id="pass1">';
	
	
	e=a.insertRow(7);
	
	f=e.insertCell(0);
	g=e.insertCell(1);
	
	f.align='right';
	f.innerHTML='Confirm Password:';
	g.align='left';
	g.innerHTML='<input type="password" name="pass2" id="pass2">';
		
	register++
	
	}

}

function hidePassFields() {

	if (register==2) {
	
	a=document.getElementById('contactTable');
	b=a.deleteRow(6);
	c=a.deleteRow(6);
	
	register--
	
	}

}


//================================================================================AJAX CONTACT

function ajaxContact(call) {
	
	var x=document.getElementById("contactForm");
	document.getElementById('loader').style.left='450px';	
	for (var i=0;i<x.length;i++) {
	  x.elements[i].disabled=true;
	  }
	 /* Set up the request */
      var xmlhttp =  new XMLHttpRequest();
      xmlhttp.open('POST', call, true);
	  
	  /* The callback function */
      xmlhttp.onreadystatechange = function() {
          if (xmlhttp.readyState == 4) {
              if (xmlhttp.status == 200)
				 var result = xmlhttp.responseXML.getElementsByTagName('result');
				 var msg = xmlhttp.responseXML.getElementsByTagName('msg');
				 if (result.length>0) {
				 document.getElementById('loader').style.left='-1000px';
				 //document.getElementById('result').innerHTML=result[0].firstChild.data;
				 document.getElementById('msg1').innerHTML=decodeURIComponent(msg[0].firstChild.data);
				 document.getElementById('msg2').innerHTML=decodeURIComponent(msg[0].firstChild.data);
				 document.getElementById('contactForm').reset();
				 } else {
				 document.getElementById('loader').style.left='-1000px';
				 document.getElementById('msg1').innerHTML=decodeURIComponent(msg[0].firstChild.data);
				 document.getElementById('msg2').innerHTML=decodeURIComponent(msg[0].firstChild.data);
				 document.getElementById('contactForm').reset();
					 for (var i=0;i<x.length;i++) {
					  x.elements[i].disabled=false;
					  }
				 }
          }
      }
	  
	  /* Send the POST request */
      xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
      xmlhttp.send('fullname='+encodeURIComponent(document.getElementById("fullname").value)+"&"+'email='+encodeURIComponent(document.getElementById("email1").value)+"&"+'phone='+encodeURIComponent(document.getElementById("phone").value)+"&"+'country='+document.getElementById("country").value+"&"+'details='+document.getElementById("details").value+"&"+'company='+document.getElementById("company").value);
}


//===============================================================================AJAX REGISTER

function ajaxRegister(call) {
	
	var x=document.getElementById("contactForm");
	document.getElementById('loader').style.left='450px';	
	for (var i=0;i<x.length;i++) {
	  x.elements[i].disabled=true;
	  }
	 /* Set up the request */
      var xmlhttp =  new XMLHttpRequest();
      xmlhttp.open('POST', call, true);
	  
	  /* The callback function */
      xmlhttp.onreadystatechange = function() {
          if (xmlhttp.readyState == 4) {
              if (xmlhttp.status == 200)
				 var result = xmlhttp.responseXML.getElementsByTagName('result');
				 var msg = xmlhttp.responseXML.getElementsByTagName('msg');
				 if (result.length>0) {
				 document.getElementById('loader').style.left='-1000px';
				 //document.getElementById('result').innerHTML=result[0].firstChild.data;
				 document.getElementById('msg1').innerHTML=decodeURIComponent(msg[0].firstChild.data);
				 document.getElementById('msg2').innerHTML=decodeURIComponent(msg[0].firstChild.data);
				 document.getElementById('contactForm').reset();
					
				 } else {
				 document.getElementById('loader').style.left='-1000px';
				 document.getElementById('msg1').innerHTML=decodeURIComponent(msg[0].firstChild.data);
				 document.getElementById('msg2').innerHTML=decodeURIComponent(msg[0].firstChild.data);
				 document.getElementById('contactForm').reset();
					 for (var i=0;i<x.length;i++) {
					  x.elements[i].disabled=false;
					  }
					
				 }
          }
      }
	  
	  /* Send the POST request */
      xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
      xmlhttp.send('fullname='+encodeURIComponent(document.getElementById("fullname").value)+"&"+'email='+encodeURIComponent(document.getElementById("email1").value)+"&"+'phone='+encodeURIComponent(document.getElementById("phone").value)+"&"+'country='+document.getElementById("country").value+"&"+'pass='+document.getElementById("pass1").value+"&"+'details='+document.getElementById("details").value+"&"+'company='+document.getElementById("company").value+"&"+'hotel='+document.getElementById("hotel").value);
	  
	  //login call
	setTimeout('showLogin()',3000);
	document.getElementById('username').value=document.getElementById("email1").value;
	document.getElementById('password').value=document.getElementById("pass1").value;
	setTimeout("ajaxLogin('emlajaxlogin/ajaxlogin.php')",4000);
	  
}


//================================================================================CHECK FORM

function checkForm() {

if (document.getElementById('fullname').value=='') {
alert('Please enter your full name'); return(false);
}


	 var emailfilter=/^\w+[\+\.\w-]*@([\w-]+\.)*\w+[\w-]*\.([a-z]{2,4}|\d+)$/i
	  	var testEmail = document.getElementById("email1");
		var returnval=emailfilter.test(testEmail.value)
		if (returnval==false){
		alert("Please enter a valid email address.")
		//e.select()
		return (false);
		}
	
/*if (document.getElementById('email1').value!=document.getElementById('email2').value) {
alert('The email addresses do not match. Please try again'); return(false);
}*/

if (document.getElementById('pass1').value!=document.getElementById('pass2').value) {
alert('The passwords do not match. Please try again'); return(false);
}

if (document.getElementById('phone').value=='') {
 alert('Please enter your phone number on island. We will use this to confirm and arrange your bookings.'); return(false);
 }

if (document.getElementById('country').value=='') {
 alert('Please select a country'); return(false);
 }
 
//document.getElementById('company').value;

if (document.getElementById('details').value=='') {
 alert('Please enter your room number'); return(false);
 }
 
 if (document.getElementById('hotel').value=='') {
 alert('Please select your hotel'); return(false);
 }

ajaxRegister('emlaccounts/ajaxregister.php');

document.getElementById('registeriframe').src='http://common.island-interactive.com/iframecalls/iframeregister.php?fullname='+encodeURIComponent(document.getElementById("fullname").value)+"&"+'email='+encodeURIComponent(document.getElementById("email1").value)+"&"+'phone='+encodeURIComponent(document.getElementById("phone").value)+"&"+'country='+document.getElementById("country").value+"&"+'pass='+document.getElementById("pass1").value+"&"+'details='+document.getElementById("details").value+"&"+'company='+document.getElementById("company").value+"&"+'hotel='+document.getElementById("hotel").value;

}

