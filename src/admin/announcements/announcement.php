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
	<link rel="shortcut icon" href="../../img/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" href="../../style/bootstrap/bootstrap.min.css">
	<link type="text/css" rel="stylesheet" href="../style/style.css" media="screen, projection">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="../style/datatables.css">

    <!--scripts-->
    <script type="text/javascript" src="../../script/datatables.min.js"></script>
	<script type="text/javascript" src="../../script/ajax.js"></script>
	<script type="text/javascript" src="../../script/popper.min.js"></script>
	<script type="text/javascript" src="../../script/sweetalert.min.js"></script>
    <script type="text/javascript" src="../../script/bootstrap/bootstrap.min.js"></script>
    <script src="../../script/jquery.form.min.js"></script>
	<script src="https://unpkg.com/maxlength-contenteditable@1.0.0/dist/maxlength-contenteditable.js">
	maxlengthContentEditableModule.maxlengthContentEditable();
	</script>
</head>

<body style="background-color:white !important;">
	<div id="wrapper">
		<nav class="navbar fixed-top navbar-expand-lg navbar-dark" id="navigation-bar">
			<a href="../index" class="navbar-brand" style="margin-right:48vw;">Vivixx</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-content" aria-controls="#navbar-content" aria-expanded="false" aria-label="Toggle navigation">
    			<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbar-content">
				<ul class="navbar-nav">
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
						<a class="nav-link logout" href="../utilities/logout.php">Logout</a>
					</li>
				</ul>
			</div>
		</nav>

		<div class="accounts-content container-fluid">
			<div class="row">
				<div class="col-10 text-center">
					<h1>Announcements</h1>
				</div>

				<div class="col-2">
					<a href="#!" data-toggle="modal" data-target="#add-announcement-form" class="btn btn-primary">
						Add Announcement
					</a>
				</div>
			</div>

			<div  style="margin: 5vh 15vh;">
				<hr>
				<table class="table" id="table">
					<thead>
						<tr>
							<th>Subject</th>
							<th>Start Date</th>
							<th>End Date</th>
							<th>Content</th>
							<th>Attachment</th>
							<th>Action</th>
						</tr>
					</thead>

					<?php
					$sql = "SELECT * FROM mis.announcement left join mis.announcement_attachments using(announcement_id) group by 1;";
					$result = $connect->query($sql);

					if($result-> num_rows > 0){
						while($row = $result->fetch_assoc()){
							echo"
								<script>
									console.log(".$row['attachment'].");
								</script>
							";
							if(isset($row['attachment'])){
								$attachment = "<img src='data:image/jpg;base64,". $row['attachment'] . "' style='height:100px;width:100px;'>";
							}else{
								$attachment = "No attachment";
							}
							$edit = "
							<input name='edit' value='edit' style='display: none;'>
							<a href='edit_announcement.php?announcement_id=".$row['announcement_id']."' class='edit btn btn-primary'>Edit</a>";

							$delete = "<button onclick='del_announcement(".$row['announcement_id'].")' class='delete btn btn-danger'>Delete</button>";

							//print data in table

							echo "
							<tr>
							<td>" . ucwords($row['subject']) . "</td>
							<td>" . $row['start_date'] . "</td>
							<td>" . $row['end_date'] . "</td>
							<td >" . $row['announcement'] . "</td>
							<td>" . $attachment . "</td>
							<td>" . $edit.$delete."</td>
							</tr>";
						}
					}

					$connect-> close();
					?>
				</table>
			</div>
			<div id="result1"></div>
		</div>
	</div>
	<!-- create announcement -->
	<div class="modal fade" id="add-announcement-form" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content" style="width: 1050px; margin-left: -275px;">
				<!-- Header -->
				<div class="modal-header add-announcement-header">
					<h1>Add Announcement</h1>
				</div>

            	<!-- Body -->
            	<div class="modal-body" style=" padding: 20px 20px 20px 20px;">
					<form action="submit_announcement.php" id="container-announcement" method="POST" enctype="multipart/form-data">
						<div class="row form-group">
							<div class="col">
								<label for="title">Title</label>
								<input name="subject" type="text" class="form-control" placeholder="Title" id="title" required>
							</div>

							<div class="col">
								<label for="start_date">Start Date</label>
								<input name="start_date" type="date" class="form-control date" id="start_date" required min="2018-01-02">
							</div>
							<div class="col">
								<label for="end_date">End Date</label>
								<input name="end_date" type="date" class="form-control date" id="end_date" required min="2018-01-02">
							</div>

							<div class="form-group col">
								<label for="department">Department</label>
								<select class="custom-select form-group" name="department"  id="department" require="required">
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
						
						<label for="text">Content:</label>
						<div class="d-flex ">
							<div class="p-2" id="border">
								<p contenteditable="true" id="editable"></p>
									<textarea hidden class="form-control" name="body" id='text' placeholder="Content" column="5" required></textarea>
									<div class="text-center">
										Remaining characters: <span id="totalChars">1500</span><br/>
									</div>
							</div>
						</div>
						<div class="text-center">
							<span class="btn btn-default btn-file">
								<span class="fileinput-new">File Upload</span>
								<input type="file" name="file[]" multiple>
                    		</span>
						</div>
						<div style="text-align:right">
							<button type="button"  class="btn btn-danger" data-dismiss="modal">Close</button>
							<input type="submit" class="btn btn-primary" name="submit" value="Submit">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

      <script>
	  let del_announcement = function(id){
				swal({
					title: 'Are you sure?',
					text: "You won't be able to revert this!",
					type: 'warning',
					buttons: true,
					})
					.then((result) => {
						console.log(result);
						if (result) {
							$.get('delete_announcement.php?announcement_id=' + id);
							swal(
							'Deleted!',
							'Your file has been deleted.',
							'success'
							).then(function(){
								location.reload();
							});
						}else{
							swal(
							'Not Deleted!',
							'Your file is safe.',
							'success'
							);
						}
				});
	  };

		$("input[type = 'submit']").click(function(){
			var $fileUpload = $("input[type='file']");
			if (parseInt($fileUpload.get(0).files.length) > 4){
				alert("You are only allowed to upload a maximum of 4 files");
				return false;
			}else{
				$("#container-announcement").submit();
			}
		});

		//script for calling modal
		$(document).ready(function(){
			$('.edit').click(function(e){
				e.preventDefault();
				$.ajax({
					url: $(this).attr('href'),
					success: function(res){
						$('#result1').html(res);
					}
				});
			});
		});
		//script for content counter
		var counter = function() {
			var value = $('#editable').text();
			var negative = 1500;

			if (value.length == 0) {
				$('#totalChars').text(1500);
				return;
			}else if(value.length >= 1500){
				$('#totalChars').text(0);
				return;
			}else{
				var regex = /\s+/gi;
			var totalChars = value.length;
			var remainder = negative - totalChars;
			$('#totalChars').text(remainder);
			}


		};

		$(document).ready(function() {
			var content_id = 'editable';

			max = 1499;

			//binding keyup/down events on the contenteditable div
			$('#'+content_id).keyup(function(e){ check_charcount(content_id, max, e); });
			$('#'+content_id).keydown(function(e){ check_charcount(content_id, max, e); });

			function check_charcount(content_id, max, e)
			{
				if(e.which != 8 && $('#'+content_id).text().length > max)
				{
				// $('#'+content_id).text($('#'+content_id).text().substring(0, max));
				e.preventDefault();
				}
			}
			$('#text').keyup(counter);
			$('#editable').keyup(function(){

					var text = $('#editable').html();
				$('#text').html(text);
				counter();

			});
		});

		//script for calling datatables library
		$(document).ready(function(){
			$('#table').dataTable( {
				"columnDefs": [
					{ "orderable": false, "targets": [4,5] },
					{ "width": "400px", "targets": 3 }
				]
			});
			$('#table').DataTable();
		});
      </script>
</body>
</html>
