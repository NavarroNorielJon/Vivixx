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
function nextButton(){
	if(getElementsByClassName('form-control')) {
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
function addchild(){
	increment++;
	var dataFields = document.getElementById('child');
	var newDataField = document.createElement("div");
	newDataField.setAttribute("class", "form-group removeclass"+increment);
	var removeDiv = 'removeclass' + increment;
	newDataField.innerHTML = '<div class="row "><div class="form-group col-6"><label for="child_name">Name</label><input type="text" placeholder="First name M.I. Last name" onkeypress="alphabetInput(event)" name="child_name[]" id="child_name" class="form-control text-transform" autocomplete="off" required="required"></div><div class="form-group col-6"><label for="child_birth">Date of Birth</label><div class="input-group"><input type="date" name="child_birth[]" id="child_birth" class="form-control" autocomplete="off" required><div class="input-group-append"><button class="btn btn-danger" type="button" onclick="remove('+increment+');"><i class="large material-icons">remove</i></button></div></div></div></div>';
	dataFields.appendChild(newDataField);
}
function remove(cid){
	$('.removeclass'+cid).remove();
}

function addAccount(){
	increment++;
	var dataFields = document.getElementById('new_acc');
	var newDataField = document.createElement("div");
	newDataField.setAttribute("class", "form-group removeclass"+increment);
	var removeDiv = 'removeclass' + increment;
	newDataField.innerHTML = '<div class="row"> <script class="add-acc"> $(function () { $("#department'+increment+'").change(function () { $("#orig'+increment+'").hide(); $("#ash'+increment+'").hide(); $("#its'+increment+'").hide(); $("#nva'+increment+'").hide(); $("#main'+increment+'").hide(); $("#sec'+increment+'").hide(); $("#voa'+increment+'").hide(); $("#ve'+increment+'").hide(); $("#va'+increment+'").hide(); $("#" + ($(this).val() + '+increment+')).show(); }); }); </script> <div class="form-group col"> <label for="department">Additional Department</label> <select class="custom-select form-group" name="department[]" id="department'+increment+'"> <option selected="selected" disabled="disabled">Choose your Department</option> <option value="ash">Administration/HR Support</option> <option value="its">IT Support</option> <option value="main">Maintenance</option> <option value="nva">Non-voice Account</option> <option value="sec">Security</option> <option value="ve">Video ESL</option> <option value="va">Virtual Assistant</option> <option value="voa">Voice Account</option> </select> </div> <div class="form-group col" id="orig'+increment+'"> <label >Additional Account</label> <div class="input-group"> <select class="custom-select form-group"> <option selected="selected" disabled="disabled">Choose your Account</option> </select> <div class="input-group-append"> <button class="btn btn-danger" type="button" onclick="remove('+increment+');"> <i class="small material-icons">remove</i> </button> </div> </div> </div> <div class="form-group col" id="ash'+increment+'" style="display:none"> <label >Additional Account</label> <div class="input-group"> <select class="custom-select form-group" name="adminsp[]"> <option selected="selected" disabled="disabled">Choose your Account</option> <option value="HR Assistant">HR Support</option> <option value="IDP Staff">IDP Staff</option> <option value="Operations Support">Operations Support</option> <option value="Springboard Staff">Springboard Staff</option> </select> <div class="input-group-append"> <button class="btn btn-danger" type="button" onclick="remove('+increment+');"> <i class="small material-icons">remove</i> </button> </div> </div> </div> <div class="form-group col" id="its'+increment+'" style="display:none"> <label >Additional Account</label> <div class="input-group"> <select class="custom-select form-group" name="itsupport[]"> <option value="ICT Specialist">ICT Specialist</option> </select> <div class="input-group-append"> <button class="btn btn-danger" type="button" onclick="remove('+increment+');"> <i class="small material-icons">remove</i> </button> </div> </div> </div> <div class="form-group col" id="nva'+increment+'" style="display:none"> <label >Additional Account</label> <div class="input-group"> <select class="custom-select form-group" name="nonvoice[]"> <option selected="selected" disabled="disabled">Choose your Account</option> <option value="April Writing">April Writing</option> <option value="CL/IL">CL/IL</option> </select> <div class="input-group-append"> <button class="btn btn-danger" type="button" onclick="remove('+increment+');"> <i class="small material-icons">remove</i> </button> </div> </div> </div> <div class="form-group col" id="voa'+increment+'" style="display:none"> <label >Additional Account</label> <div class="input-group"> <select class="custom-select form-group" name="voice[]"> <option selected="selected" disabled="disabled">Choose your Account</option> <option value="ELANSO">ELANSO</option> <option value="Phone ESL">Phone ESL</option> </select> <div class="input-group-append"> <button class="btn btn-danger" type="button" onclick="remove('+increment+');"> <i class="small material-icons">remove</i> </button> </div> </div> </div> <div class="form-group col" id="ve'+increment+'" style="display:none"> <label >Additional Account</label> <div class="input-group"> <select class="custom-select form-group" name="video[]"> <option selected="selected" disabled="disabled">Choose your Account</option> <option value="First Future">First Future</option> <option value="Key English">Key English</option> </select> <div class="input-group-append"> <button class="btn btn-danger" type="button" onclick="remove('+increment+');"> <i class="small material-icons">remove</i> </button> </div> </div> </div> <div class="form-group col" id="va'+increment+'" style="display:none"> <label >Additional Account</label> <div class="input-group"> <select class="custom-select form-group" name="virtual[]"> <option selected="selected" disabled="disabled">Choose your Account</option> <option value="Drag and drop">Drag and drop</option> <option value="Job Getter">Job Getter</option> </select> <div class="input-group-append"> <button class="btn btn-danger" type="button" onclick="remove('+increment+');"> <i class="small material-icons">remove</i> </button> </div> </div> </div> <div class="form-group col" id="sec'+increment+'" style="display:none"> <label >Additional Account</label> <div class="input-group"> <select class="custom-select form-group" name="sec[]"> <option value="Security" selected="selected">Security</option> </select> <div class="input-group-append"> <button class="btn btn-danger" type="button" onclick="remove('+increment+');"> <i class="small material-icons">remove</i> </button> </div> </div> </div> <div class="form-group col" id="main'+increment+'" style="display:none"> <label >Additional Account</label> <div class="input-group"> <select class="custom-select form-group" name="main[]"> <option selected="selected" disabled="disabled">Choose your Account</option> <option value="Housekeeping">Housekeeping</option> <option value="Utility">Utility</option> </select> <div class="input-group-append"> <button class="btn btn-danger" type="button" onclick="remove('+increment+');"> <i class="small material-icons">remove</i> </button> </div> </div> </div> </div> ';
	dataFields.appendChild(newDataField);
	eval($('.add-acc').text());


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

function nextForm(currId,nextId){
  document.getElementById(currId).classList.add("d-none");
  document.getElementById(nextId).classList.remove("d-none");
}

function alphabetInput(evt){
	var alphabet = String.fromCharCode(evt.which);
	if(!(/[A-Za-z\ ]/.test(alphabet))) {
		evt.preventDefault();
	}
}
function numberInput(evt){
	var number = String.fromCharCode(evt.which);
	if(!(/[0-9]/.test(number))) {
		evt.preventDefault();
	}
}
