<?php
	include '../../utilities/db.php';
	include '../../utilities/session.php';
	$connect = Connect();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Vivixx Ph</title>
  	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" href="../../style/bootstrap/bootstrap.min.css">
	<link type="text/css" rel="stylesheet" href="../style/style.css" media="screen, projection">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="../../style/datatables.css">

    <!--scripts-->
    <script type="text/javascript" src="../../script/datatables.min.js"></script>
	<script type="text/javascript" src="../../script/ajax.js"></script>  
	<script type="text/javascript" src="../../script/popper.min.js"></script>
	<script type="text/javascript" src="../../script/sweetalert.min.js"></script>
    <script type="text/javascript" src="../../script/bootstrap/bootstrap.min.js"></script>
    <script src="../../script/jquery.form.min.js"></script>
</head>

<body style="background-color:white !important;">
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
						<a class="nav-link" href="../index.php">Home</a>
					</li>
					<li class="nav-item ">
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
						<a class="nav-link logout" href="../logout.php">Logout</a>
					</li>
				</ul>
			</div>
		</nav>
		
<<<<<<< HEAD
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
          
		<div id="border" style="padding-top: 25px;">
			<textarea name="body" id='text' placeholder="Text Content" required></textarea>
		</div>
		
		<div id="result">
			Remaining characters: <span id="totalChars">1000</span><br/>
		</div>
		<br>
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
		<input id="btn" class="btn btn-primary" type="submit" name="submit" value="submit">
        <a href="edit_announcement.php" class="btn btn-primary">Edit</a>
        <a href="delete_announcement.php" class="btn btn-danger">Delete</a>
	</form>
        
=======
		<div class="accounts-content container-fluid">
			<h1>Announcements</h1>
				<table class="table" id="table">
					<thead>
						<tr>
							<th>Subject</th>
							<th>Date</th>
							<th>Content</th>
							<th>Image</th>
							<th>Attachment</th>
							<th>Action</th>
						</tr>
					</thead>
  
					<?php
					$sql = "SELECT * FROM mis.announcement natural join announcement_attachments;";
					$result = $connect->query($sql);

					if($result-> num_rows > 0){
						while($row = $result->fetch_assoc()){
							if(isset($row["image"])){
								$image = "<img src='data:image/jpg;base64,". $row['image'] . "' style='height:100px;width:100px;'>";
							}else{
								$image = "No Image";
							}
							$button = "
							<input name='edit' value='edit' style='display: none;'>
							<a href='edit_announcement.php?announcement_id=".$row['announcement_id']."& image=".$row['image']."' class='show btn btn-primary'>Edit</a>";

						//print data in table
							echo "
							<tr>
							<td>" . ucwords($row['subject']) . "</td>
							<td>" . $row['date'] . "</td>
							<td>" . $row['announcement'] . "</td>
							<td>" . $image . "</td>
							<td>" . "<img src='data:image/jpg;base64,". $row['attachment'] . "' style='height:100px;width:100px;'>" . "</td>
							<td>
							".$button."</td>
							</tr>";
						}
					}
>>>>>>> 897169a3c3d39841a2066f1160295c3e42a4e181

					$connect-> close();
					?>
  				</table>

  				<div id="result1">
				</div>			
		</div>
	</div>
	
	
      <script>
	  	//script for calling modal
	  	$(document).ready(function(){
			$('.show').click(function(e){
				e.preventDefault();
				$.ajax({
					url: $(this).attr('href'),
					success: function(res){
						$('#result1').html(res);
					}
				});
			});
		});
		//script for calling datatables library
      	$(document).ready(function(){
			$('#table').dataTable( {

				"columnDefs": [
					{ "orderable": false, "targets": [2,3,4,5] }
				]

			});
			$('#table').DataTable();
			
		});
      </script>
</body>
</html>