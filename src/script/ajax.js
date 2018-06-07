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

function showHide() {
    var pass = document.getElementById("password");
	var pass1 = document.getElementById("cpass");
    if (pass.type === "password" && pass1.type === "password") {
        pass.type = "text";
        pass1.type = "text";
    } else {
        pass.type = "password";
        pass1.type = "password";
    }
}
function showPass() {
    var pass = document.getElementById("lpass");
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
	var valid = true;
	if(document.getElementById(pass).value == document.getElementById(conpass).value) {
		$("#next").attr("disabled",true);
	} else {
		$("#next").attr("disabled",false);
	}
}
