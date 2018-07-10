<?php
    include '../../utilities/db.php';
    $connect = Connect();
    $announcement_id = $_GET["announcement_id"];
    $edit_announcement = "SELECT * FROM mis.announcement left join mis.announcement_attachments using(announcement_id) where announcement_id='$announcement_id';";
    $result = $connect->query($edit_announcement);
    $row = $result->fetch_assoc();
?>
	<div class="modal fade" id="edit" tabindex="-1" role="dialog">

		<div class="modal-dialog" role="document" style="min-width: 130vh; max-width: 130vh;">


			<div class="modal-content">
				<div class="modal-header">

					<h1>Edit announcement</h1>

				</div>

				<div class="modal-body">
					<form action="submit_edit_announcement.php" id="submit_edit" method="POST" enctype="multipart/form-data">
						<input type="hidden" name="announcement_id" value="<?php echo $row[" announcement_id "]?>">
						<input type="hidden" name="id" value="<?php echo $announcement_id?>">
						<div class="row">
							<div class="form-group col">
								<label for="subject">Subject</label>
								<input type="text" class="form-control" id="subject" name="subject" value="<?php echo $row['subject']?>">
							</div>

							<div class="form-group col">
								<label for="date">Start Date</label>
								<input type="date" class="form-control" id="s_date" name="start_date" value="<?php echo $row['start_date']?>">
							</div>

							<div class="form-group col">
								<label for="date">End Date</label>
								<input type="date" class="form-control" id="e_date" name="end_date" value="<?php echo $row['end_date']?>">
							</div>

							<div class="form-group col">
								<label for="departments">Department</label>
								<select class="custom-select form-group" id="department" name="department[]" required multiple="multiple">
									<option selected value="none"><?php echo $row['departments'] ?></option>
                                	<option value="All Departments">All Departments</option>
                                	<option value="Administration">Administration</option>
                                	<option value="Administration Support / HR">Administration Support / HR</option>
                                	<option value="IT Support">IT Support</option>
                                	<option value="Non-voice Account">Non-voice Account</option>
                                	<option value="Phone ESL">Phone ESL</option>
                                	<option value="Video ESL">Video ESL</option>
                                	<option value="Virtual Assistant">Virtual Assistant</option>
                            	</select>
							</div>
						</div>

						<div style="text-align:left">
							<div class="d-flex ">
								<div class="p-2" id="border">
									<p contenteditable="true" id="editable">
									<?php echo $row["announcement"]?>
									</p>
									<textarea style="display:none;" class="form-control" name="body" id='text' placeholder="Content" column="5" required><?php echo $row["announcement"]?></textarea>
									<div class="text-center">
										Remaining characters: <span id="totalChars">1500</span><br/>
									</div>
								</div>
							</div>

							<span class="btn btn-default btn-file">
								<input type="file" name="file[]" id="file" multiple>
								<input type="hidden" name="attachment" value="<?php echo $row['attachment_name']?>">
							</span>
						</div>
						<input type="hidden" name="edit" value="edit">
					</form>
					<div style="text-align:right">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
						<button disabled="disabled" id="but" onclick="edit_status();" class="btn btn-primary">Edit</button>
					</div>
				</div>

			</div>


		</div>


	</div>

	<script>
		$('#department').multiselect({
			templates: {
				li: '<li><a href="javascript:void(0);"><label class="pl-2"></label></a></li>'
			}
		});
		function edit_status() {
			swal({
					title: "Caution!",
					text: "Are you sure you want to edit the announcement",
					icon: "warning",
					buttons: {
						cancel: "Cancel",
						confirm: true,
					},
				})
				.then((result) => {
					if (result) {
						$('#submit_edit').submit();
					} else {
						swal("Canceled", "", "error");
					}
				})
		}
	</script>

	<script>
		//script for editing of announcement
		var old_sub = document.getElementById('subject').value;
		var old_sdate = document.getElementById('s_date').value;
		var old_edate = document.getElementById('e_date').value;
		var old_department = document.getElementById('department').value;
		var old_text = document.getElementById('text').value;

		$(document).keyup(function() {
			if (old_sub != $('#subject').val() || old_text != $('#text').val()) {
				$('#but').attr("disabled", false);
			} else {
				$('#but').attr("disabled", true);
			}
		});
		$(document).change(function() {
			if (old_sub != $('#subject').val() || old_text != $('#text').val() || old_sdate != $('#s_date').val() || old_edate != $('#e_date').val() || old_department != $('#department').val() || $('#file').val()) {
				$('#but').attr("disabled", false);
			} else {
				$('#but').attr("disabled", true);
			}
		});
	</script>
	<script>
		$(document).ready(function() {
			$("#edit").modal("show");
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

		$(document).ready(function() {
			var content_id = 'editable';
			max = 1499;
			//binding keyup/down events on the contenteditable div
			$('#' + content_id).keyup(function(e) {
				check_charcount(content_id, max, e);
			});
			$('#' + content_id).keydown(function(e) {
				check_charcount(content_id, max, e);
			});

			function check_charcount(content_id, max, e) {
				if (e.which != 8 && $('#' + content_id).text().length > max) {
					e.preventDefault();
				}
			}
			$('#text').keyup(counter);
			$('#editable').keyup(function() {

				var text = $('#editable').html();
				$('#text').html(text);
				counter();

			});
		});
	</script>
