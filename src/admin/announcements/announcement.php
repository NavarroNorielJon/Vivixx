<!DOCTYPE html>
<html lang="en">
<head>
	<title>Vivixx Ph</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" href="../../style/bootstrap/bootstrap.min.css">
	<link type="text/css" rel="stylesheet" href="../style/jquery-ui.min.css">

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
	
</head>
<body>
	
	<div id="wrapper">
		<nav class="navbar fixed-top navbar-expand-lg navbar-dark" id="navigation-bar">
			<!--<a href="#!"><img src="../img/Lion.png" id="nav-logo"></a>-->
			<a href="index" class="navbar-brand" style="margin-right:40vw;">Vivixx</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-content" aria-controls="#navbar-content" aria-expanded="false" aria-label="Toggle navigation">
    			<span class="navbar-toggler-icon"></span>
			</button>
			
			<div class="collapse navbar-collapse" id="navbar-content">
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link" href="../index">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="../accounts/accounts_status">Accounts</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="../user_information/user_information">Users</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="../leave_request/leave_requests">Leaver Request</a>
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
			<form action="submit_announcement.php" class="text-center" id="container-announcement" method="POST" enctype="multipart/form-data">
		<div class="row form-goup">
			<div class="col">
				<input name="subject" type="text" class="form-control" placeholder="Subject" required>
			</div>
			
			<div class="col">
				<input name="date" type="date" class="form-control date" id="date" required min="2018-01-02">
			</div>
		</div>
          
		<div id="border">
			<textarea name="body" id='text' placeholder="Content" required></textarea>
		</div>
		
		<div id="result">
			Remaining characters: <span id="totalChars">1000</span><br/>
		</div>
		<br>
        <div>
        Upload Attachment
        <br>
        <input type="file" name="file" multiple>
        </div>
        <div>
        Upload Image
        <br>
        <input type="file" name="image">
        </div>
		<input id="btn" class="btn btn-primary" type="submit" name="submit" value="submit">
        <a href="edit_announcement.php" class="btn btn-primary">Edit</a>
        <a href="delete_announcement.php" class="btn btn-danger">Delete</a>
	</form>
        

    <div id="result">
    </div>

    <div class="modal fade" id="announcement" tabindex="-1" role="dialog" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog" role="document" style="min-width: 130vh; max-width: 130vh;">
            <div class="modal-content" id="message">
                <?php
                    echo "Announcement successfully sent and will be announced on the specified date.";
                ?>
                <div id="ok">
                <br>
                    <a href="index.php" class="btn btn-primary" style="width:25%;">Ok</a>
                </div>
            </div>
        </div>
    </div>	
		</div>
	</div>
</body>
	
	
<script>
$("#date").datepicker({
    showButtonPanel: true
});
$('#container-announcement').ajaxForm({
    url: 'announcements/submit_announcement.php',
    method: 'post',
    success: function () {
        $("#announcement").modal("show");
    }
});
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