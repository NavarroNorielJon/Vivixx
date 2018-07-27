message<?php
    include '../../utilities/db.php';
    $connect = Connect();
    $user_id = $_GET["user_id"];
    $fname = $_GET["fname"];
    $mname = $_GET["mname"];
	$lname = $_GET["lname"];
?>
	<div class="modal fade" id="view" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content" style="width: 1050px; margin-left: -275px;">

				<!-- Body -->
				<div class="modal-body" style=" padding: 20px 20px 20px 20px;">
					<div class="table-container">
						<table class="table" id="message">
							<thead>
								<tr class="table-header">
									<th>Subject</th>
									<th>Date Announced</th>
									<th>Date Read</th>
									<th>Status</th>
								</tr>
							</thead>

							<?php
                                $sql = "SELECT * FROM mis.notification where user_id='$user_id';";
                                $result = $connect->query($sql);

                                if($result-> num_rows > 0){
                                    while($row = $result->fetch_assoc()){
                                        //print data in table
                                        echo "
                                        <tr class='table-data'>
                                        <td>" . $row['subject'] . "</td>
                                        <td>" . $row['date'] . "</td>
                                        <td>" . $row['date_read'] . "</td>
                                        <td>" . $row['status'] . "</td>
                                        </tr>";
                                    }

                                }
                            ?>
						</table>
					</div>
					<div style="text-align:right">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script>
		$(document).ready(function() {
			$("#view").modal("show");
		});

		$(document).ready(function() {
			$('#message').dataTable({
				"columnDefs": [{
					"orderable": false
				}]
			});
			$('#message').DataTable();
		});

	</script>
