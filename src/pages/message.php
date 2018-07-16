<?php 
	include "../utilities/db.php";	
	$subject = $_GET['subject'];
?>
<div class="modal fade message-modal" id="sample" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content message-content">

			<div class="modal-body message-body">
				<form action="mailing/send_reset.php" id="reset_form" method="POST">
					<div class="form-group">
						<input type="input" class="form-control-plaintext" disabled="disabled" id="message-subject" name="subject" value="<?php echo $subject; ?>">
					</div>

					<div style="text-align: right;">
						<button type="submit" class="btn btn-primary">Close</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<script>
	$("#sample").modal("show");

</script>
