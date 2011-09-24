// This is where the images are defined for the mouseover
image = new Image(268, 200);
image.src = "velociraptor.jpg";

image_map = new Image(268, 200);
image_map.src = "velociraptor_map.gif";

// This is the function that gets called when the mouse
// rolls over the mapped area on the original image
function zoom() {
	document.velociraptor.src = image_map.src;
	return true;
}

// This is the function that gets called when the mouse
// is no longer over the mapped region
function original() {
	document.velociraptor.src = image.src;
	return true;
}

// This is the validation function for the form
function validate() {
	var msg = "There were problems with your form input. ";
	var is_validated = true;
	
	if (document.forms['subscribe']['first'].value == '') {
		msg = msg + "The first name must be present. ";
		is_validated = false;
	}
	if (document.forms['subscribe']['last'].value == '') {
		msg = msg + "The last name must be present. ";
		is_validated = false;
	}
	if (document.forms['subscribe']['email'].value == '') {
		msg = msg + "The email must be present. ";
		is_validated = false;
	}
	if (!validateEmail(document.forms['subscribe']['email'].value)) {
		msg = msg + "The email you provided is not valid. ";
		is_validated = false;
	}
	if (is_validated == false) {
		alert(msg);
		return false;
	} else {
		setCookie('first', document.forms['subscribe']['first'].value);
		setCookie('last', document.forms['subscribe']['last'].value);
		setCookie('email', document.forms['subscribe']['email'].value);
		return true;
	}
	
}

// This validates to make sure the email is valid
function validateEmail(email) {
	var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/ 
	 return email.match(re)
}

// This stores values in a cookie
function setCookie(name, value) {
	var date = new Date();
	date.setDate(date.getDate()+5);
	
	var val = name + "=" + value + "; expires=" + date.toGMTString() + "; domain=localhost";
	document.cookie = val;
}

// This gets values from a cookie
function getCookie(name) {
	var results = document.cookie.match ('(^|;) ?' + name + '=([^;]*)(;|$)');
	
	if (results) {
		return (unescape(results[2]));
	} else {
		return null;
	}
}

// Function that displays cookie data on page
function showCookieData()  {
	var html = "Retrieved from cookies. <br />";
	html = "Name: " + getCookie('first') + " " + getCookie('last') + "<br />Email: " + getCookie('email');
	document.getElementById('cookie-info').innerHTML = html;
}