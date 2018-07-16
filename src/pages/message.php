<?php 
	include "../utilities/db.php";	
	$subject = $_GET['subject'];
	$message = $_GET['message'];
	$date = $_GET['date'];
?>
<div class="modal fade message-modal" id="sample" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document" style="min-width: 60%; max-width: 60%;">
		<div class="modal-content message-content">

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

<script>
	$("#sample").modal("show");

</script>
