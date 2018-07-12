<?php
    include '../../utilities/db.php';
    $connect = Connect();
    $user_id = $_GET["user_id"];
    $first_name = $_GET["fname"];
    $middle_name = $_GET["mname"];
    $last_name = $_GET["lname"];
    $sql = "SELECT user_id, first_name, middle_name, last_name, department FROM user_info NATURAL JOIN user natural join employee_info WHERE user_id='$user_id';";
    $result = $connect->query($sql);
    $row = $result->fetch_assoc();
?>

    <div class="modal fade" id="set" tabindex="-1" role="dialog" >
            <div class="modal-dialog" role="document" style="min-width: 130vh; max-width: 130vh;">
                <div class="modal-content"  style="border-radius: 0;">
                    <div class="modal-header">
                        <h1><?php echo $first_name . " " . $middle_name . " " . $last_name . " " . $user_id?></h1>
                    </div>
                    <div class="modal-body">
                        <form action="update_user.php" method="POST" id="set_user">
                            <input type="hidden" name="user_id" value="<?php echo $user_id?>">


                            <div class="form-group">
                                <label>Department</label>
                                <input type="text" name="department" id="dept" class="form-control" disabled="disabled" value="<?php echo explode("|",$row['department'])[0]?>">
                            </div>
                            <br>

                            <div class="form-group">
                                <label>Position</label>
                                <?php
                                    $main = explode("|",$row['department'])[0];
                                    if($main === "Phone ESL" || $main === "Video ESL" || $main === "Non-Voice Account"){
                                        echo '
                                        <select class="custom-select form-control" id="pos" name="position" required="required">
                                            <option selected required="require" value="Online English Tutor">Online English Tutor</option>
                                        </select>';
                                    }else if($main === "Administration/HR Support"){
                                        echo '
                                        <select class="custom-select form-control" id="pos" name="position" required="required">
                                        <option selected required="require" value="HR Assistant">HR Assistant</option>
                                        </select>';
                                    }else if($main === "IT Support"){
                                        echo '
                                        <select class="custom-select form-control" id="pos" name="position" required="required">
                                        <option selected required="require" value="ICT Support Specialist">ICT Support Specialist</option>
                                        </select>';
                                    }else if($main === "Virtual Assistant"){
                                        echo '
                                        <select class="custom-select form-control" id="pos" name="position" required="required">
                                        <option selected required="require" disabled>Choose Here:</option>
                                        <option value="Indesigner">Indesigner</option>
                                        <option value="Web Developer">Web Developer</option>
                                        </select>';
                                    }else if ($main === "Security") {
                                        echo '
                                        <select class="custom-select form-control" id="pos" name="position" required="required">
                                        <option selected required="require" disabled>Choose Here:</option>
                                        <option value="Security">Security</option>
                                        </select>';
                                    }else {
                                        echo '
                                        <select class="custom-select form-control" id="pos" name="position" required="required">
                                        <option selected required="require" disabled>Choose Here:</option>
                                        <option value="Housekeeping">Housekeeping</option>
                                        <option value="Utilities">Utilities</option>
                                        </select>';
                                    }
                                ?>
                            </div>


                            <div class="form-group">
                                <label>Employee Status</label>
                                <select class="custom-select form-control" name="employee_status" id="status">
                                    <option selected disabled>Choose Here:</option>
                                    <option value="Freelance">Freelance</option>
                                    <option value="Project Based">Project Based</option>
                                    <option value="Probationary">Probationary</option>
                                    <option value="Regular">Regular</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Date hired</label><br>
                                <input type="text" id="date" name="date" class="form-control" required="required" placeholder="yy-mm-dd">
                            </div>
                        </form>
                         <div style="text-align:right">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                            <button onclick='set_user();' disabled="disabled" class="btn btn-success" id="update">Update</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script>

    $("#date").datepicker({ dateFormat: 'yy-mm-dd' });
    $(document).change(function() {
        if($('#status').val() != "" && $('#date').val() != "" && $('#pos').val() != "" && $().val('#dept') != "" ){
            $('#update').attr("disabled", false);
        }else{
            $('#update').attr("disabled", true);
        }
        $(document).keyup(function() {
            if($('#status').val() != "" && $('#date').val() != "" && $('#pos').val() != "" && $().val('#dept') != "" ){
                $('#update').attr("disabled", false);
            }else{
                $('#update').attr("disabled", true);
            }
        });
    });

    function set_user() {
		swal({
			title: "Are you sure you want to update?",
			icon: "warning",
			buttons: {
				cancel: "Cancel",
				confirm: true,
			},
		})
		.then((result) => {
			if (result) {
				$('#set_user').submit();
			} else {
				swal("Canceled", "", "error");
			}
		})
	}

    $(document).ready(function(){
        $("#set").modal("show");
    });
</script>
