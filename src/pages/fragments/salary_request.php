<?php

?>

<div class="modal fade" id="salary" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h1>SALARY REQUEST</h1>
			</div>

			<div class="modal-body">
				<p>This feature is currently unavailable.</p>
				<form action="submit_edit_announcement.php" id="submit_edit" method="POST" enctype="multipart/form-data">
				</form>
			</div>
		</div>
	</div>

	<script>
		$(document).ready(function() {
			$("#salary").modal("show");
		});

	</script>
