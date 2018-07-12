<?php

?>

<div class="modal fade" id="edit" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document" style="min-width: 130vh; max-width: 130vh;">
        <div class="modal-content">
			<div class="modal-header">
				<h1>Edit announcement</h1>
            </div>

				<div class="modal-body">
				<form action="submit_edit_announcement.php" id="submit_edit" method="POST" enctype="multipart/form-data">
                </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $("#summary").modal("show");
    });
</script>