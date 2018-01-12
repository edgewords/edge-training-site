function validateEmpty(fld) {
    var error = "";
  
    if (fld.length == 0) {
        error = "The required field has not been filled in.\n"
    } 
    return error;   
}
function validateName(fld) {
    var error = "";
    var illegalChars = /[^a-zA-Z ]/; // allow letters and some whitespace
 
    if (fld == "") {
        error = "You didn't enter a name.\n";
    } else if (fld.length > 50) { 
        error = "The name is the wrong length.\n";
    } else if (illegalChars.test(fld)) { 
        error = "The username contains illegal characters.\n";
    } 
    return error;
}

function validateUsername(fld) {
    var error = "";
    var illegalChars = /\W/; // allow letters, numbers, and underscores
 
    if (fld == "") {
        error = "You didn't enter a username.\n";
    } else if ((fld.length < 6) || (fld.length > 15)) { 
        error = "The username is the wrong length.\n";
    } else if (illegalChars.test(fld)) { 
        error = "The username contains illegal characters.\n";
    } 
    return error;
}

function validatePassword(fld) {
    var error = "";
    var illegalChars = /[\W_]/; // allow only letters and numbers 
 
    if (fld == "") {
        error = "You didn't enter a password.\n";
    } else if ((fld.length < 7) || (fld.length > 12)) {
        error = "The password is the wrong length. \n";
    } else if (illegalChars.test(fld)) {
        error = "The password contains illegal characters.\n";
    } else if ( (fld.search(/[a-zA-Z]+/)==-1) || (fld.search(/[0-9]+/)==-1) ) {
        error = "The password must contain at least one numeral and one letter.\n";
    } 
  
   return error;
}  
 
function validatePin(fld) {
    var error = "";
    var illegalChars = /[^0-9]/; // allow only numbers 
 
    if (fld == "") {
        error = "You didn't enter a pin.\n";
    } else if ((fld.length < 4) || (fld.length > 6 )) {
        error = "The pin is the wrong length. \n";
    } else if (illegalChars.test(fld)) {
        error = "The pin contains illegal characters.\n";
    } 
  
   return error;
}  

function validateHouse(fld) {
	var error = "";
	var illegalChars = /[^0-9a-zA-Z ]/; // allow number, letters and some whitespace
	if (fld == "") {
        error = "You didn't enter a House Name or Number\n";
	} else if (illegalChars.test(fld)) {
        error = "The House field contains illegal characters.\n";
    } 
	return error;
}
function validateAddress(fld) {
	var error = "";
	var illegalChars = /[^0-9a-zA-Z ]/; // allow number, letters and some whitespace
	if (fld == "") {
        error = "You didn't enter an Address line\n";
	} else if (illegalChars.test(fld)) {
        error = "The Address field contains illegal characters.\n";
    } 
	return error;

}
function validateTown(fld) {
	var error = "";
	var illegalChars = /[^a-zA-Z \.]/; // letters and some whitespace
	if (fld == "") {
        error = "You didn't enter a Town\n";
	} else if (illegalChars.test(fld)) {
        error = "The Town field contains illegal characters.\n";
    } 
	return error;

}
function validateCounty(fld) {
	var error = "";
	var illegalChars = /[^a-zA-Z ]/; // letters and some whitespace
	if (fld == "") {
        error = "You didn't enter a County\n";
	} else if (illegalChars.test(fld)) {
        error = "The County field contains illegal characters.\n";
    } 
	return error;
}
function validatePostCode(fld) {
	var error = "";
	var postcode = fld.replace(/\s/g, "");
    var regex = /^(([gG][iI][rR] {0,}0[aA]{2})|((([a-pr-uwyzA-PR-UWYZ][a-hk-yA-HK-Y]?[0-9][0-9]?)|(([a-pr-uwyzA-PR-UWYZ][0-9][a-hjkstuwA-HJKSTUW])|([a-pr-uwyzA-PR-UWYZ][a-hk-yA-HK-Y][0-9][abehmnprv-yABEHMNPRV-Y]))) {0,}[0-9][abd-hjlnp-uw-zABD-HJLNP-UW-Z]{2}))$/;
	if (fld == "") {
        error = "You didn't enter a Post Code\n";
	} else if (!regex.test(postcode)) {
		error = "invalid post code";
	}
	return error;
}

function attemptLogin(uname,pw) {

    var url = ("../sdocs/dologin.php");
    var xmlhttp;
	url += '?uname=' +  uname + '&pw=' + pw;
    xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function() {
		if (xmlhttp.readyState==4 ) {
			if (xmlhttp.status==200) {
			// the php function should return a response that sets the cookie and allows to be redirected on success
			// or put up an alert on failure
				var response = xmlhttp.responseText;
				var idx = response.indexOf("Error");
				if (idx > 0){
					alert ("Failed to Login : ");
				} else {
				// document.write(response);
				//location.replace("../sdocs/add_record.php");
				window.location.href = "../sdocs/add_record.php";
				return false;
				}
			}
		}
    }
	xmlhttp.open("GET",url,true);
	xmlhttp.send();
	return false;
}

//submitLogin = function() {
function submitLogin () {
	var error = "";
    var form = document.getElementById('Login');
    var value = form.username.value;
    var password = form.password.value;
    if(value==null || value=="") {
        alert('You must enter a value in this text input');
        form.username.focus();
        return false;
    }
    if(value.length < 6) {
            alert("Error: Username must contain at least six characters!");
            form.username.focus();
            return false;
    } 
    re = /^\w+$/;
    if(!re.test(value)) {
          alert("Error: Username must contain only letters, numbers and underscores!");
          form.username.focus();
          return false;
    }
    // check the password
    error = validatePassword(password);
	if (error != "") {
		alert("Error:" + error);
        form.password.focus();
        return false;
	}
	attemptLogin(value, password);  
	clearLogin();
	return false;
}

function attemptRegister (uname,pw) {
	// call async to do the register and move to correct place.
	var url = ("../sdocs/doregister.php");
    var xmlhttp;
	url += '?uname=' +  uname + '&pw=' + pw;
    xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function() {
		if (xmlhttp.readyState==4 ) {
			if (xmlhttp.status==200) {
			// the php function should return a response that sets the cookie and allows to be redirected on success
			// or put up an alert on failue
				var response = xmlhttp.responseText;
				var idx = response.indexOf("Error");
				if (idx > 0){
					alert ("Failed to Register : ");
				} else {
				location.replace("../sdocs/add_record.php");
				
				}
			}
		}
    }
	xmlhttp.open("GET",url,true);
	xmlhttp.send();
	return false;
}

/* to check the registration form */
// check the username is valid and the passwords match and are valid
function checkRegForm(form){
	var reason = "";
	var user = form.username.value;
    var pass1 = form.password1.value;
	var pass2 = form.password2.value;
	alert ("u " + user + ", p " + pass1);
    
	reason += validateUsername(user);
	reason += validatePassword(pass1);
	reason += validatePassword(pass2);

	if (pass1 != pass2) {
		reason +="Passwords are different:\n";
	}
	if (reason != "") {
		alert("Some fields need correction:\n" + reason);
		return false;
	}

	return true;
} 

submitRegister = function() {
    var form = document.getElementById('Register');
    var value = form.username.value;
	var pass1 = form.password1.value;
	var pass2 = form.password2.value;
    if(value==null || value=="") {
        alert('You must enter a value in username');
        form.username.focus();
    } else {
	
		// check the values and if ok
		if (checkRegForm(form)) {
			// attempt to register the new access user
			attemptRegister (value,pass1);
		}
           
        $('#Login').hide();
        $('#Register').show();    
    }
}

function clearLogin() {
	var form = document.getElementById('Login');
	form.reset();
	$('#Register').hide();
    	$('#Login').show();
}

function clearRegister() {
	var form = document.getElementById('Register');
	form.reset();
	$('#Register').show();
    	$('#Login').hide();
}

function doLogin () {
    $('#Register').hide();
    $('#Login').show();
}

function registerInstead() {
	
    $('#Register').show();
    $('#Login').hide();
}
 
  
function checkSubmitForm (edit, user, name, house, address, town, county, postcode, pass, pin) { 
// Check
// Name - character set to check; max length
// User Name - must be at least 6 chars and must be text and or numbers only
// pin - 4 numbers not in sequence
// pw - 7..10 chars text and or numbers
//     
	var reason = "";
	//reason += validateEmpty(theForm.from);

	reason += validateName(user);
	reason += validateUsername(name);
	reason += validatePassword(pass);
	reason += validatePin(pin); 
	if (edit) {
		reason += validateHouse(house);
		reason += validateAddress(address);
		reason += validateTown(town);
		reason += validateCounty(county);
		reason += validatePostCode(postcode);
	}
	if (reason != "") {
		alert("Some fields need correction:\n" + reason);
		return false;
	}

	return true;
}

function addRecord(){
	var xmlhttp;
	/* first verify the record locally for syntax and then*/
	var form = document.getElementById('AddRecord');
	var us = form.name.value
    var un = form.username.value;
    var pw = form.password.value;   
    var pn = form.pin.value; 
	var house, address, town, county, postcode = "";
	if (checkSubmitForm (false, us, un, house, address, town, county, postcode, pw, pn)) {
	/* call the cgi script to add the record using raw AJAX object */
		var url = '../sdocs/addrec.php?uname=' + un + '&user=' + us + '&pn=' + pn + '&pw=' + pw;
		xmlhttp = new XMLHttpRequest();
		xmlhttp.open("GET", url, true);
		xmlhttp.onreadystatechange = function () {
			if (xmlhttp.readyState==4 ) {
				if (xmlhttp.status==200) {
					var response = xmlhttp.responseText;
					//var newwindow = window.open("","window","width=400,height=200");
					//newwindow.document.write(response);
					//clear the form as well if the string "Record Added" is present
					var idx = response.indexOf("Record Added");
					if (idx > 0){
						form.reset();
						alert ("Record Added: ");
					}
					else {
						alert ("Failed to Add Record : ");
					}
				} else {
					alert ("Record Add failed, Status is : \n" + xmlhttp.readyState + "\n and status text is : " + xmlhttp.status);
				}
			}
		}
		xmlhttp.send();
		return true;
	}
}

function clearAddRecord(){
	var form = document.getElementById('AddRecord');
	//alert ("clearing form");
	form.reset();
	return false;
}

function parseresponse(res) {
//need to split the response up and 
// load from a line like <h1>Record FOUND</h1>
// <p>some name;username;pin;password</p>
// name, username, pin, password - maybe use jquery
	// alert( "here we go : " + $(res).find("h1").html());
	var myline = $(res).find("p").text();
	var array4v = myline.split(/;/);
	var form = document.getElementById('EditRecord');
	form.name.value=array4v[0];
	form.username.value=array4v[1]; 
	// make sure we cant change the username!
	form.username.readOnly = true;
	form.pin.value=array4v[2];
	form.password.value="MustChange";
	//form.password.value=array4v[3];
	form.house.value = array4v[4];
	form.adl1.value = array4v[5];
	form.town.value = array4v[6];
	form.county.value = array4v[7];
	form.postcode.value = array4v[8];
	
}

function findRecord(){
	var xmlhttp;
	/* first verify the record locally for syntax and then*/
	var form = document.getElementById('FindRecord');
    var un = form.username.value;
	var reason = "";
	reason += validateUsername(un);
	if (reason != "") {
		alert("Error:\n" + reason);
		return false;
	} else {
	
		var url = '../sdocs/findrec.php?uname=' + un;
		
		xmlhttp = new XMLHttpRequest();
		xmlhttp.open("GET", url, true);
		xmlhttp.onreadystatechange = function () {
			if (xmlhttp.readyState==4 ) {
				if (xmlhttp.status==200) {
					var response = xmlhttp.responseText;
					//var newwindow = window.open("","window","width=400,height=200");
					//newwindow.document.write(response);
					var idx = response.indexOf("Record Found");
					if (idx > 0){
						form.reset();
						$('#FindRecord').hide();
						$('#EditRecord').show();
						parseresponse(response);
						
					}
					else {
						alert ("Failed to Find Record : ");
					}
				} else {
					alert ("Search failed, Status is : \n" + xmlhttp.readyState + "\n and status text is : " + xmlhttp.status);
				}
			}
		}
		xmlhttp.send();
		return true;
	}
	return false;
}
function editRecord(form){
	// we find the record again and then replace it
	var xmlhttp;
	/* first verify the record locally for syntax and then*/
	var form = document.getElementById('EditRecord');
	var us = form.name.value
    var un = form.username.value;
	var hs = form.house.value;
	var ad = form.adl1.value;
	var tn = form.town.value;
	var co = form.county.value;
	var pc = form.postcode.value;
    var pw = form.password.value;   
    var pn = form.pin.value; 
	if (checkSubmitForm (true, us, un, hs, ad, tn, co, pc, pw, pn)) {
	/* call the cgi script to add the record using raw AJAX object */
		var url = '../sdocs/editrec.php?uname=' + un + '&user=' + us + '&house='+ hs + '&address='+ ad + '&town=' + tn + '&county='+ co + '&postcode='+ pc + '&pn=' + pn + '&pw=' + pw;
		//alert ("the url is : \n" + url);
		
		xmlhttp = new XMLHttpRequest();
		xmlhttp.open("GET", url, true);
		xmlhttp.onreadystatechange = function () {
			if (xmlhttp.readyState==4 ) {
				if (xmlhttp.status==200) {
					var response = xmlhttp.responseText;
					//var newwindow = window.open("","window","width=400,height=200");
					//newwindow.document.write(response);
					//clear the form as well if the string "Record Added" is present
					var idx = response.indexOf("Record Re Added");
					if (idx > 0){
						form.reset();
						$('#FindRecord').show();
						$('#EditRecord').hide();
					}
					else {
						alert ("Failed to Edit Record : ");
					}
				} else {
					alert ("Record Add failed, Status is : \n" + xmlhttp.readyState + "\n and status text is : " + xmlhttp.status);
				}
			}
		}
		xmlhttp.send();
		return true;
	}
	return false;
}

function clearEditRecord(){
	var form = document.getElementById('EditRecord');
	//alert ("clearing form");
	form.reset();
	$('#FindRecord').hide();
    $('#EditRecord').show();
	return false;
}
function removeRecord(){
// remove the record
// find it
// and remove it
	var xmlhttp;
	/* first verify the record locally for syntax and then*/
	var form = document.getElementById('RemoveRecord');
    var un = form.username.value;
	var reason = "";
	reason += validateUsername(un);
	if (reason != "") {
		alert("Error:\n" + reason);
		return false;
	} else {
	
		var r=confirm("Do You Really want to Remove this record Press ok to Continue ");
		if (r==true){
		
		  var url = '../sdocs/remrec.php?uname=' + un;
		
		  xmlhttp = new XMLHttpRequest();
		  xmlhttp.open("GET", url, true);
		  xmlhttp.onreadystatechange = function () {
			if (xmlhttp.readyState==4 ) {
				if (xmlhttp.status==200) {
					var response = xmlhttp.responseText;
					//var newwindow = window.open("","window","width=400,height=200");
					//newwindow.document.write(response);
					//clear the form as well if the string "Record Added" is present
					var idx = response.indexOf("Successfully Removed");
					if (idx > 0){
						form.reset();
						alert ("Record Removed : ");
					}
					else {
						alert ("Failed to Remove Record : ");
					}
				} else {
					alert ("Record Remove failed, Status is : \n" + xmlhttp.readyState + "\n and status text is : " + xmlhttp.status);
				}
			}
		  }
		  xmlhttp.send();
		  return true;
		}
	}
	return false;
}
function clearRemRecord(){
	var form = document.getElementById('RemoveRecord');
	//alert ("clearing form");
	form.reset();
	return false;
}

function exitApplication(){
	var r=confirm("Do You Really want to Exit the Secure site! Press ok to Continue ");
    if (r==true){
        window.location="../sdocs/reset.php";
        return true;
    }
	return false;
}

function showResponse() {
    var url = ("../sdocs/add_record.php");
    var xmlhttp;
	alert ("You are accessing Secure Site");
    xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function() {
        if (xmlhttp.readyState==4) {
			alert ("status is : " + xmlhttp.status + "and the message is " + xmlhttp.responseText);
			//location.replace("sdocs/add_record.html");
		}
    }
    xmlhttp.open("GET",url,true);
    xmlhttp.send();

	return false;
}
function findStart () {
	location.replace("../index.html");
}