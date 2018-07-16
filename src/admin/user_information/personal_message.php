<?php
    include '../../utilities/db.php';
    $connect = Connect();
    $user_id = $_GET["user_id"];
    $fname = $_GET["fname"];
    $mname = $_GET["mname"];
	$lname = $_GET["lname"];
	$email = $_GET["email"];
?>

	<div class="modal fade" id="message" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content" style="width: 1050px; margin-left: -275px;">
				<!-- Header -->
				<div class="modal-header add-announcement-header">
					<h1>Send Personal Message to
						<?php echo $fname . " " . $mname . " " . $lname?>
					</h1>
				</div>

				<!-- Body -->
				<div class="modal-body" style=" padding: 20px 20px 20px 20px;">
					<form action="send_message.php" id="container-announcement" method="POST">
						<input type="hidden" name="user_id" value="<?php echo $user_id?>">
						<input type="hidden" name="email" value="<?php echo $email?>">
						<div class="row form-group">
							<div class="col">
								<label for="title">Subject</label>
								<input name="subject" type="text" class="form-control" placeholder="Subject" id="subject" required>
							</div>
							<?php $curr_date = date("d-m-Y");?>
							<div class="col ui calendar" id="date">
								<div class="ui input left icon">
									<label for="date">Date</label>
									<input type="text" name="date" readonly="true" class="form-control-plaintext date" required value="<?php echo $curr_date;?>">
								</div>
							</div>
						</div>

						<label for="text">Content:</label>
						<div class="d-flex ">
							<div class="p-2" id="message-border">
								<p contenteditable="true" id="message-editable"></p>
								<textarea hidden class="form-control" name="body" id='message-text' placeholder="Content" column="5" required></textarea>
								<div class="text-center">
									Remaining characters: <span id="totalChars">500</span><br/>
								</div>
							</div>
						</div>

						<div style="text-align:right">
							<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
							<input type="submit" class="btn btn-primary" name="submit" value="Submit">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<script>
		$(document).ready(function() {
			$("#message").modal("show");
		});

		//script for content counter
		var counter = function() {
			var value = $('#message-editable').text();
			var negative = 500;

			if (value.length == 0) {
				$('#totalChars').text(500);
				return;
			} else if (value.length >= 500) {
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
			var content_id = 'message-editable';

			max = 499;

			//binding keyup/down events on the contenteditable div
			$('#' + content_id).keyup(function(e) {
				check_charcount(content_id, max, e);
			});
			$('#' + content_id).keydown(function(e) {
				check_charcount(content_id, max, e);
			});

			function check_charcount(content_id, max, e) {
				if (e.which != 8 && $('#' + content_id).text().length > max) {
					// $('#'+content_id).text($('#'+content_id).text().substring(0, max));
					e.preventDefault();
				}
			}
			$('#message-text').keyup(counter);
			$('#message-editable').keyup(function() {

				var text = $('#message-editable').html();
				$('#message-text').html(text);
				counter();

			});
		});

	</script>
