<?php
	ini_set('max_execution_time', 300);
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
		<link rel="stylesheet" href="../style/bootstrap-multiselect.css">
		<link rel="stylesheet" href="../../style/jquery-ui.css">
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="../style/richtext.min.css">

		<!--scripts-->
		<script type="text/javascript" src="../../script/jquery-3.2.1.min.js"></script>
		<script type="text/javascript" src="../../script/jquery-ui.min.js"></script>
		<script type="text/javascript" src="../../script/datatables.min.js"></script>
		<script type="text/javascript" src="../../script/ajax.js"></script>
		<script type="text/javascript" src="../../script/popper.min.js"></script>
		<script type="text/javascript" src="../../script/sweetalert.min.js"></script>
		<script type="text/javascript" src="../../script/bootstrap/bootstrap.min.js"></script>
		<script type="text/javascript" src="../../script/jquery.form.min.js"></script>
		<script src="../../script/jquery.validate.min.js"></script>
		<script src="../../script/additional-methods.min.js"></script>
		<script src="../../script/alerts.js"></script>
		<script src="../../script/jquery.form.min.js"></script>
		<script src="../style/bootstrap-multiselect.js"></script>
		<script src="../../script/jquery-ui.js"></script>
		<script src="../style/jquery.richtext.min.js"></script>



	</head>

	<body class="background">
		<?php include '../utilities/check_user.php'; ?>

		<div class="wrapper">
			<?php include '../fragments/navbar.php'; ?>


			<div class="content container">
				<div class="row">
					<div class="col-10 text-center">
						<h1>Announcements</h1>
					</div>

					<div class="col-2">
						<a href="#!" data-toggle="modal" data-target="#add-announcement-form" onclick="removeToolbar()" class="btn btn-primary">
						Add Announcement
					</a>
					</div>
				</div>

				<div class="table-container">
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
							if(isset($row['attachment'])){
								$attachment = $row['attachment_name'];
							}else{
								$attachment = "No attachment";
							}
							$edit = "
							<input name='edit' value='edit' style='display: none;'>
							<a href='edit_announcement.php?announcement_id=".$row['announcement_id']."' class='edit btn btn-primary'>Edit</a>";

							$delete = "<button onclick='del_announcement(".$row['announcement_id'].")' class='delete btn btn-danger'>Delete</button>";

							//print data in table

							echo "
							<tr class='table-data';>
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
									<label for="title">Subject</label>
									<input name="subject" type="text" autocomplete="off" class="form-control text-transform" placeholder="Subject" id="subject" required>
								</div>

								<div class="col ui calendar" id="start_date">
									<div class="ui input left icon">
										<label for="start_date">Start Date</label>
										<input type="text" id="s_date" name="start_date" autocomplete="off" class="form-control date" required placeholder="yy-mm-dd">
									</div>
								</div>

								<div class="col ui calendar" id="end_date">
									<div class="ui input left icon">
										<label for="end_date">End Date</label>
										<input type="text" id="e_date" name="end_date" autocomplete="off" class="form-control date" required placeholder="yy-mm-dd">
									</div>
								</div>

								<div class="form-group col">
									<label for="department">Department</label>
									<select class="custom-select form-group" name="department[]" id="department" required multiple="multiple">
									<option value="All Departments">All Departments</option>
                                	<option value="Administration">Administration</option>
                                	<option value="Administration/HR Support">Administration/HR Support</option>
                                	<option value="IT Support">IT Support</option>
                                	<option value="Non-voice Account">Non-voice Account</option>
                                	<option value="Phone ESL">Phone ESL</option>
                                	<option value="Video ESL">Video ESL</option>
                                	<option value="Virtual Assistant">Virtual Assistant</option>
									<option value="Maintenance">Maintenance</option>
                        			</select>
								</div>
							</div>

							<label for="text">Content:</label>
							<div class="d-flex">
							<input type="hidden" name="body">
								<div class="p-2" id="border">
									<!-- <p contenteditable="true" id="editable"></p> -->
									<textarea class="form-control body" name="body" id='text' placeholder="Content" column="5" required></textarea>
									<div class="text-center">
										Remaining characters: <span id="totalChars">1500</span><br>
									</div>
								</div>
							</div>


							<span class="btn btn-default btn-file">
								<input type="file" name="file[]" multiple>
							</span>

							<div style="text-align:right">
								<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
								<input type="submit" class="btn btn-primary" name="submit" value="Submit">
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<div id="signup_form"></div>

		<script>

			$('#department').multiselect({
				templates: {
					li: '<li><a href="javascript:void(0);"><label class="pl-2"></label></a></li>'
				}
			});
			//script for calling datatables library
			$(document).ready(function() {
				$('#table').dataTable({
					"columnDefs": [{
							"orderable": false,
							"targets": [4, 5]
						}
					]
				});
				$('#table').DataTable();
			});

			//sweet alert for deleting announcement
			let del_announcement = function(id) {
				swal({
						title: 'Are you sure?',
						text: "You won't be able to revert this!",
						type: 'warning',
						buttons: true,
					})
					.then((result) => {
						if (result) {
							$.get('delete_announcement.php?announcement_id=' + id);
							swal(
								'Deleted!',
								'Your file has been deleted.',
								'success'
							).then(function() {
								location.reload();
							});
						} else {
							swal(
								'Not Deleted!',
								'Your file is safe.',
								'success'
							);
						}
					});
			};

			$("input[type = 'submit']").click(function() {
				var $fileUpload = $("input[type='file']");
				if (parseInt($fileUpload.get(0).files.length) > 4) {
					alert("You are only allowed to upload a maximum of 4 files");
					return false;
				} else {
					$("#container-announcement").submit();
				}
			});


			//script for calling modal
			$(document).ready(function() {
				$('.edit').click(function(e) {
					$('.richText-toolbar').remove();
					e.preventDefault();
					$.ajax({
						url: $(this).attr('href'),
						success: function(res) {
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
				} else if (value.length >= 1500) {
					$('#totalChars').text(0);
					return;
				} else {
					var regex = /\s+/gi;
					var totalChars = value.length;
					var remainder = negative - totalChars;
					$('#totalChars').text(remainder);
				}


			};
			$('.body').richText();
			let removeToolbar = function(){
				$('.richText-toolbar').remove();
			}

			//date range
			$(function() {
				$("#e_date").datepicker({
					dateFormat: 'yy-mm-dd'
				});
				$("#s_date").datepicker({
					dateFormat: 'yy-mm-dd'
				}).bind("change", function() {
					var minValue = $(this).val();
					minValue = $.datepicker.parseDate("yy-mm-dd", minValue);
					minValue.setDate(minValue.getDate() + 1);
					$("#e_date").datepicker("option", "minDate", minValue);
				})
			});
			$('#an').addClass('active');

		</script>

	</body>

	</html>
