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
	var password = document.getElementById(pass).value;
	var confirm_password = document.getElementById(conpass).value
	if( (document.getElementById('username').value != "") && (document.getElementById('email').value != "") ) {
		if(password === confirm_password &&  password != "" && confirm_password != ""){
			$("#next").attr("disabled",false);
		} else {
			$("#next").attr("disabled",true);
		}
	} else {
		$("#next").attr("disabled",true);
	}
}
var increment = 1;
function add(){
	increment++;
	var dataFields = document.getElementById('child');
	var newDataField = document.createElement("div");
	newDataField.setAttribute("class", "form-group removeclass"+increment);
	var removeDiv = 'removeclass' + increment;
	newDataField.innerHTML = '<div class="row "><div class="form-group col-6"><label for="child_name">Name</label><input type="text" placeholder="First name M.I. Last name" name="child_name[]" id="child_name" class="form-control" required="required"></div><div class="form-group col-6"><label for="child_birth">Date of Birth</label><div class="input-group"><input type="date" name="child_birth[]" id="child_birth" class="form-control" required="required"><div class="input-group-append"><button class="btn btn-danger" type="button" onclick="remove('+increment+');">&minus;</button></div></div></div></div>';
	dataFields.appendChild(newDataField);
}
function remove(cid){
	$('.removeclass'+cid).remove();
}
