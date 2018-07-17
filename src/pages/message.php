<?php 
	include "../utilities/db.php";	
	$msg_id = $_GET['msg_id'];
	$subject = $_GET['subject'];
	$message = $_GET['message'];
	$message = preg_replace( "/\r|\n/", "", $message );
	$date = $_GET['date'];
?>
<form action="read_message.php" method="post">
	<div class="modal fade message-modal" id="sample" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false">
		<div class="modal-dialog" role="document" style="min-width: 60%; max-width: 60%;">
			<div class="modal-content message-content">
				<input type="hidden" name="msg_id" value="<?php echo $msg_id?>">
				<div class="modal-body message-body">
					<div class="form-group">
						<div class="row">
							<div class="col-9">
								<input type="text" class="form-control-plaintext" style="font-size: 2rem;" value="<?php echo $subject; ?>" disabled="disabled">
							</div>
							<div class="col">
								<sub><input class="form-control-plaintext text-right" type="text" id="date" value="<?php echo $date;?>" disabled="disabled"></sub>
							</div>
						</div>
						<hr>
					</div>

					<div>
						<textarea class="form-control-plaintext message-body" readonly tabindex="-1" style="resize:none; text-align-last: center; text-align:justify; min-height: 250px; max-height: 250px; overflow-x: hidden; ">
						<?php echo $message; ?>
					</textarea>
					</div>

					<div class="text-right">
						<button type="submit" class="btn btn-primary">Close</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>

<script>
	$("#sample").modal("show");

</script>
