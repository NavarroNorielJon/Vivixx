function helperText(type, str, elementId){
	if(str.length == 0){
		document.getElementById(elementId).innerHTML = "";
		return;
	} else {
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function () {
			if (this.readyState == 4 && this.status == 200){
				document.getElementById(elementId).innerHTML = this.responseText;
			}
		};
		xmlhttp.open("GET", "utilities/validator.php?type=" + type + "&" + type + "=" + str, true);
		xmlhttp.send();
	}
}
function confirmPass(type, str, passElement, elementId){
	var pass = document.getElementById(passElement).value;
	if(str.length == 0){
		document.getElementById(elementId).innerHTML = "";
		return;
	} else {
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function () {
			if (this.readyState == 4 && this.status == 200){
				document.getElementById(elementId).innerHTML = this.responseText;
			}
		};
		xmlhttp.open("GET", "utilities/validator.php?type=" + type + "&" + type + "=" + str + "&password=" + pass, true);
		xmlhttp.send();
	}
}

function showHide(password) {
    var pass = document.getElementById(password);
    if (pass.type === "password") {
        pass.type = "text";
    } else {
        pass.type = "password";
    }
}

function confirmation(type, str, elementId){
	if(str.length == 0){
		document.getElementById(elementId).innerHTML = "";
		return;
	} else {
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function () {
			if (this.readyState == 4 && this.status == 200){
				document.getElementById(elementId).innerHTML = this.responseText;
			}
		};
		xmlhttp.open("GET", "utilities/login_validator.php?type=" + type + "&" + type + "=" + str, true);
		xmlhttp.send();
	}
}

function confirmLogin(type, str, eElement, elementId){
	var userOrEmail = document.getElementById(eElement).value;
	if(str.length == 0){
		document.getElementById(elementId).innerHTML = "";
		return;
	} else {
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function () {
			if (this.readyState == 4 && this.status == 200){
				document.getElementById(elementId).innerHTML = this.responseText;
			}
		};
		xmlhttp.open("GET", "utilities/login_validator.php?type=" + type + "&" + type + "=" + str + "&userOrEmail=" + userOrEmail, true);
		xmlhttp.send();
	}
}

function nextButton(pass,conpass){
<<<<<<< HEAD
	if(document.getElementById(pass).value == document.getElementById(conpass).value) {
		$("#next").attr("disabled",true);
=======
	var password = document.getElementById(pass).value;
	var confirm_password = document.getElementById(conpass).value
	if(password === confirm_password) {
		$("#next").removeAttr("disabled");
>>>>>>> c4aa08bdc8498d237b492b05c0d87c05dfd21a81
	} else {
		$("#next").attr("disabled",true);
	}
}
