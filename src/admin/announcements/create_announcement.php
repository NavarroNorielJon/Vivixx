<!DOCTYPE html>
<html lang="en">
<head>
	<title>Vivixx Ph</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" href="../../style/bootstrap/bootstrap.min.css">
	<link type="text/css" rel="stylesheet" href="../style/jquery-ui.min.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.min.css">

    

	<link type="text/css" rel="stylesheet" href="../style/style.css" media="screen, projection">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="../../style/datatables.css">
	
    <!--scripts-->
	<script src="../../script/jquery.min.js"></script>
	<script type="text/javascript" src="../../script/bootstrap/bootstrap.min.js"></script>
	<script src="../../script/jquery.form.min.js"></script>
	<script type="text/javascript" src="../../script/jquery-ui.min.js"></script>
	<script type="text/javascript" src="../../script/popper.min.js"></script>
	<script type="text/javascript" src="../../script/ajax.js"></script>  
    
    <!-- Jasny -->
    <!-- Latest compiled and minified JavaScript -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/js/jasny-bootstrap.min.js"></script>
	
</head>
<body>
	<body style="background-color:white !important;">
	<div id="wrapper">
		<nav class="navbar fixed-top navbar-expand-lg navbar-dark" id="navigation-bar">
			<a href="#!"><img src="../img/Lion.png" id="nav-logo"></a>
			<a href="index" class="navbar-brand" style="margin-right:40vw;">Vivixx</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-content" aria-controls="#navbar-content" aria-expanded="false" aria-label="Toggle navigation">
    			<span class="navbar-toggler-icon"></span>
			</button>
			
			<div class="collapse navbar-collapse" id="navbar-content">
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link" href="../index.php">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="../accounts/accounts_status.php">Accounts</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="../user_information/user_information.php">Users</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="../leave_request/leave_requests.php">Leave Request</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Summary of Pay</a>
					</li>
					<li class="nav-item">
						<a class="nav-link active" href="announcement.php">Announcement</a>
					</li>
					<li class="nav-item">
						<a class="nav-link logout" href="logout.php">Logout</a>
					</li>
				</ul>
			</div>
		</nav>
		
		<div class="announcement-content container-fluid">
            <h1> Create Announcement </h1>
            
            
			<form action="submit_announcement.php" class="text-center" id="container-announcement" method="POST" enctype="multipart/form-data">
            
            <div class="row form-group">
                    <div class="col">
                        <input name="subject" type="text" class="form-control" placeholder="Title" required>
                    </div>

                    <div class="col">
                        <input name="date" type="date" class="form-control date" id="date" required min="2018-01-02">
                    </div>

                    <div class="form-group col">
                        <select class="custom-select form-group" name="department" id="department" required>
                            <option selected disabled>Choose your Department</option>
                            <option value="all">All Departments</option>
                            <option value="admin">Administration</option>
                            <option value="admin supp">Administration Support / HR</option>
                            <option value="it support">IT Support</option>
                            <option value="non voice account">Non-voice Account</option>
                            <option value="phone esl">Phone ESL</option>
                            <option value="video esl">Video ESL</option>
                            <option value="virtual assistant">Virtual Assistant</option>
                        </select>
                    </div>
            </div>
        
                
        <div class="d-flex justify-content-around">
              <div class="p-2" id="border">
                <textarea class="form-control" name="body" id='text' placeholder="Content" required maxlength="1000"></textarea>
                Remaining characters: <span id="totalChars">1000</span><br/>
              </div>

                <!--
                <div>
                Upload Attachment
                <br>
                <input type="file" name="file[]" multiple>
                </div>
                <div>
                Upload Image
                <br>
                <input type="file" name="image">
                </div>
                -->

            <div class="p-2">
                <div class="fileinput fileinput-new; img-thumbnail" data-provides="fileinput">
                  <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 300px; height: 200px;" ></div>
                  <div>
                    <span class="btn btn-default btn-file">
                        <span class="fileinput-new">Upload image</span>
                        <input type="file" name="attach">
                    </span>
                        <a href="#" class="btn btn-default attach-exists" data-dismiss="fileinput">Remove</a>  
                  </div>
                </div>
            </div>

            <div class="p-2">
                <div class="fileinput fileinput-new; img-thumbnail" data-provides="fileinput">
                  <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 300px; height: 200px;"></div>
                  <div>
                    <span class="btn btn-default btn-file">
                        <span class="fileinput-new">Upload image</span>
                        <input type="file" name="img"></span>
                    <a href="#" class="btn btn-default img-exists" data-dismiss="fileinput">Remove</a>
                  </div>
                </div>
            </div>

        </div>
            <input class="w-75 btn btn btn-primary" id="btn" type="submit" name="Submit" value="submit">

	</form>
    
        </div>
    
        </div>
</body>
	
	
<script>
	$("input[type = 'submit']").click(function(){
        var $fileUpload = $("input[type='file']");
        if (parseInt($fileUpload.get(0).files.length) > 4){
            alert("You are only allowed to upload a maximum of 4 files");
			return false;
        }else{
			$("#container-announcement").submit();
		}
    });

	// $('#container-announcement').ajaxForm({
	// 	url: 'submit_announcement.php',
	// 	method: 'post',
	// 	success: function () {
	// 		$("#announcement").modal("show");
	// 	}
	// });
		
	counter = function() {
		var value = $('#text').val();
		var negative = 1000;
		if (value.length == 0) {
			$('#totalChars').html(1000);
			return;
		}
		var regex = /\s+/gi;
		var totalChars = value.length;
		var remainder = negative - totalChars;
		$('#totalChars').html(remainder);
	};

	$(document).ready(function() {
		$('#text').keyup(counter);	
	});
</script>
</html>