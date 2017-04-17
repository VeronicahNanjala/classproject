
function validateSignUp(){
var userName=document.getElementById("uname").value;
var password=document.getElementById("password").value;
var firstName=document.forms["regForm"]["firstname"].value;
var lastName=document.forms["regForm"]["lastname"].value;
var email=document.forms["regForm"]["email"].value;
var gender=document.forms["regForm"]["gender"].value;
var major=document.forms["regForm"]["major"].value;
/*
*checking user name 
*/
if(userName==""){
  alert("User name is required");
}
else if (userName !=""){
	var userNameExp = new RegExp('^[a-z.]+$');
	if (!userNameExp.test(userName)){
		alert("Wrong pattern for user name. Only lowercase and . are requred");
		return false;
	}
}


/*
*Checking password
*/
if(password==""){
  alert("password is required");
}
else{
	var userPassExp=new RegExp('^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@#$!%*?&])[A-Za-z\d$@#$!%*?&]{6,}');
	if (!userPassExp.test(password)){
		alert("Poor strength: use at least 6 characters, uppercase, slowercase, a symbol[$@#$!%*?&]");
		return false;
	}
}

/*
*Checking first name
*/
if(firstName==""){
  alert("First name is required");
}
else{
	var fnameExp=new RegExp('^[A-Za-z]+$');
	if (!fnameExp.test(firstName)){
		alert("Wrong pattern for first name. Only letters");
		return false;
	}
}

/*
*Checking last name
*/
if(lastName==""){
  alert("Last name is required");
}
else{
	var lnameExp=new RegExp('^[A-Za-z]+$');
	if (!lnameExp.test(lastName)){
		alert("Wrong pattern for last name. Only letters");
		return false;
	}
}

/*
*Checking email
*/
if(email==""){
  alert("Email is required");
}
else{
	var emailExp=new RegExp('');
	if (!emailExp.test(email)){
		alert("Invalid email format");
		return false;
	}
}

/*
*validating gender  
*/
if(gender==""){
  alert("Gender is required");
}

/*
*checking major 
*/
if(major==""){
  alert("Major is required");
}

}

function validateLogin(){
	var userName=document.getElementById("uname").value;
	var password=document.getElementById("pass").value;

	 if (userName=="") {
	 	alert("User name is required");
	 }

	 if (password=="") {
	 	alert("User is required");
	 }

}

