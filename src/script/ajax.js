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
		xmlhttp.open("GET", "../utilities/validator.php?type=" + type + "&" + type + "=" + str, true);
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

function showHide(password,ic) {
    var pass = document.getElementById(password);
	var icon = document.getElementById(ic);
    if (pass.type === "password") {
		icon.innerHTML = "visibility_off";
        pass.type = "text";
    } else {
        pass.type = "password";
		icon.innerHTML = "visibility";

    }
}
function showPas(password,pass2,ic) {
    var pass = document.getElementById(password);
	var pass2 = document.getElementById(pass2);
	var icon = document.getElementById(ic);
    if (pass.type === "password") {
		icon.innerHTML = "visibility_off";
		pass.type = "text";
        pass2.type = "text";
    } else {
		pass.type = "password";
        pass2.type = "password";
		icon.innerHTML = "visibility";

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
	newDataField.innerHTML = '<div class="row "><div class="form-group col-6"><label for="child_name">Name</label><input type="text" placeholder="First name M.I. Last name" name="child_name[]" id="child_name" class="form-control" autocomplete="off" required="required"></div><div class="form-group col-6"><label for="child_birth">Date of Birth</label><div class="input-group"><input type="date" name="child_birth[]" id="child_birth" class="form-control" autocomplete="off" required="required"><div class="input-group-append"><button class="btn btn-danger" type="button" onclick="remove('+increment+');"><i class="large material-icons">remove</i></button></div></div></div></div>';
	dataFields.appendChild(newDataField);
}
function remove(cid){
	$('.removeclass'+cid).remove();
}

function verifyLogin() {
	var loginForm = $('#login');
	loginForm.submit(function(e){
		e.preventDefault();

		$.ajax({
			url: loginForm.attr('action'),
			type: loginForm.attr('method'),
			dataType: 'html',
			data: loginForm.serialize(),
			success: function(response){
				$('#verifyLogin').html(response);
			}
		});
	});
}

function numberInput(evt){
	var num = String.fromCharCode(evt.which);
	if(!(/[0-9]/.test(num))) {
		evt.preventDefault();
	}
}
