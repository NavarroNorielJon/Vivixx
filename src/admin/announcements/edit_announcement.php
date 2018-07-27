<?php
    include '../../utilities/db.php';
    $connect = Connect();
    $announcement_id = $_GET["announcement_id"];
    $edit_announcement = "SELECT * FROM mis.announcement left join mis.announcement_attachments using(announcement_id) where announcement_id='$announcement_id';";
    $result = $connect->query($edit_announcement);
	$row = $result->fetch_assoc();
	error_reporting(0);
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
								<input type="text" class="form-control" autocomplete="off" id="s_date" name="start_date" value="<?php echo $row['start_date']?>">
							</div>

							<div class="form-group col">
								<label for="date">End Date</label>
								<input type="text" class="form-control" autocomplete="off" id="e_date" name="end_date" value="<?php echo $row['end_date']?>">
							</div>

                            <div class="form-group col">
                                <label>Due dates:</label>
                                <div class="form-control">
                                    <div class="switch">
                                        <?php
                                            if ($row['status'] == "on") {
                                                echo '<input type="radio" class="switch-input" name="status" value="on" id="on" checked>
                                                <label for="on" class="switch-label switch-label-off">ON</label>
                                                <input type="radio" class="switch-input" name="status" value="off" id="off">
                                                <label for="off" class="switch-label switch-label-on">OFF</label>
                                                <span class="switch-selection"></span>';
                                            }else {
                                                echo '<input type="radio" class="switch-input" name="status" value="on" id="on" >
                                                <label for="on" class="switch-label switch-label-off">ON</label>
                                                <input type="radio" class="switch-input" name="status" value="off" id="off" checked>
                                                <label for="off" class="switch-label switch-label-on">OFF</label>
                                                <span class="switch-selection"></span>';
                                            }

                                         ?>
                                     </div>
                                 </div>
                            </div>

							<div class="form-group col">
								<label for="departments">Department</label>
								<select class="custom-select form-group" id="department" name="department[]" required multiple="multiple">
									<option selected value="none"><?php echo $row['departments'] ?></option>
                                	<option value="All Departments">All Departments</option>
                                	<option value="Administration">Administration</option>
                                	<option value="Administration/HR Support">Administration/HR Support</option>
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
									<textarea class="form-control body" name="body" id='text' placeholder="Content" column="5" required><?php echo $row["announcement"]?></textarea>
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
						<button onclick="edit_status();" class="btn btn-primary">Edit</button>
					</div>
				</div>

			</div>


		</div>
	</div>

	<script>
		$('#edit').on('hidden.bs.modal', function (e) {
			$('#border div.richText div.richText').remove();
		});
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
		//show modal for editing information
		$(document).ready(function() {
			$("#edit").modal("show");
		});

		CKEDITOR.replace( 'text' );

		//date range
		$(function(){
        		$("#e_date").datepicker({ dateFormat: 'yy-mm-dd' });
        		$("#s_date").datepicker({ dateFormat: 'yy-mm-dd' }).bind("change",function(){
					var minValue = $(this).val();
					minValue = $.datepicker.parseDate("yy-mm-dd", minValue);
					minValue.setDate(minValue.getDate()+1);
					$("#e_date").datepicker( "option", "minDate", minValue );
				})
			});
	</script>
