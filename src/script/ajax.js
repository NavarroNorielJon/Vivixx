function announcement(id){
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200){
			let responseJSON = JSON.parse(this.responseText);
			document.getElementById('am').innerHTML = responseJSON.announcement;
			document.getElementById('title').innerHTML = responseJSON.title;
			let dl = "<h5>Documents</h5><ul>"
			let i;
			for(i in responseJSON.downloads){
				dl += "<li><a href='../admin/announcements/files/"+ responseJSON.downloads[i] +"' download>"+ responseJSON.downloads[i] +"</a></li>"
			}
			dl += "</ul>";
			document.getElementById('dl').innerHTML = dl;
		}

	};
	xmlhttp.open("GET", "../utilities/announcements.php?id=" + id, true);
	xmlhttp.send();
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
	newDataField.innerHTML = '<div class="row"> <script class="add-acc"> $(function () { $("#department'+increment+'").change(function () { $("#orig'+increment+'").hide(); $("#ash'+increment+'").hide(); $("#its'+increment+'").hide(); $("#nva'+increment+'").hide(); $("#main'+increment+'").hide(); $("#sec'+increment+'").hide(); $("#voa'+increment+'").hide(); $("#ve'+increment+'").hide(); $("#va'+increment+'").hide(); $("#" + ( $(this).val() + '+increment+' )).show(); }); }); </script> <div class="form-group col"> <label for="department">Additional Department</label> <select class="custom-select form-group" name="department[]" id="department'+increment+'"> <option selected="selected" disabled="disabled">Choose your Department</option> <option value="ash">Administration/HR Support</option> <option value="its">IT Support</option> <option value="main">Maintenance</option> <option value="nva">Non-voice Account</option> <option value="sec">Security</option> <option value="ve">Video ESL</option> <option value="va">Virtual Assistant</option> <option value="voa">Voice Account</option> </select> </div> <div class="form-group col" > <label >Additional Account</label> <div class="input-group"> <select class="custom-select form-group" name="account[]"> <optgroup id="orig'+increment+'"> <option selected="selected" disabled="disabled">Choose your Account</option> </optgroup> <optgroup label="Administration/HR Support" id="ash'+increment+'" style="display:none"> <option value="HR Assistant">HR Assistant</option> <option value="IDP Staff">IDP Staff</option> <option value="Operations Support">Operations Support</option> <option value="Springboard Staff">Springboard Staff</option> </optgroup> <optgroup label="IT Support" id="its'+increment+'" style="display:none"> <option value="ICT Specialist">ICT Specialist</option> </optgroup> <optgroup label="Non-voice Account" id="nva'+increment+'" style="display:none"> <option value="April Writing">April Writing</option> <option value="CL/IL">CL/IL</option> </optgroup> <optgroup label="Voice Account" id="voa'+increment+'" style="display:none"> <option value="ELANSO">ELANSO</option> <option value="Phone ESL">Phone ESL</option> </optgroup> <optgroup label="Video ESL" id="ve'+increment+'" style="display:none"> <option value="First Future">First Future</option> <option value="Key English">Key English</option> </optgroup> <optgroup label="Virtual Assistant" id="va'+increment+'" style="display:none"> <option value="Drag and drop">Drag and drop</option> <option value="Job Getter">Job Getter</option> </optgroup> <optgroup label="Security" id="sec'+increment+'" style="display:none"> <option value="Security">Security</option> </optgroup> <optgroup label="Maintenance" id="main'+increment+'" style="display:none"> <option value="Housekeeping">Housekeeping</option> <option value="Utility">Utility</option> </optgroup> </select> <div class="input-group-append"> <button class="btn btn-danger" type="button" onclick="remove('+increment+');"> <i class="small material-icons">remove</i> </button> </div> </div> </div> </div>';
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
	if(!(/[A-Za-z\ \b\-\.\,\ñ\Ñ]/.test(alphabet))) {
		evt.preventDefault();
	}
}
function numberInput(evt){
	var number = String.fromCharCode(evt.which);
	if(!(/[0-9 \b]/.test(number))) {
		evt.preventDefault();
	}
}
