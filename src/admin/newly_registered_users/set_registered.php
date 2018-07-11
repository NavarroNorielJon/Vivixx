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
                                <input type="text" name="department" class="form-control" disabled="disabled" value="<?php echo explode("|",$row['department'])[0]?>">
                            </div>
                            <br>

                            <label>Position</label>
                            <?php
                                if($row['department'] === "Phone ESL" || $row['department'] === "Video ESL" || $row['department'] === "Non-Voice Account"){
                                    echo '
                                    <select class="custom-select form-control" name="position">
                                        <option selected value="Online English Tutor">Online English Tutor</option>
                                    </select>';
                                }else if($row['department'] === "Administration/HR Support"){
                                    echo '
                                    <select class="custom-select form-control" name="position" >
                                    <option selected value="HR Assistant">HR Assistant</option>
                                    </select>';
                                }else if($row['department'] === "IT Support"){
                                    echo '
                                    <select class="custom-select form-control" name="position" >
                                    <option selected value="ICT Support Specialist">ICT Support Specialist</option>
                                    </select>';
                                }else if($row['department'] === "Virtual Assistant"){
                                    echo '
                                    <select class="custom-select form-control pos" name="position" id="pos" onchange="change();">
                                    <option selected disabled>Choose Here:</option>
                                    <option value="Indesigner">Indesigner</option>
                                    <option value="Web Developer">We Developer</option>
                                    </select>';
                                }else{
                                    echo '
                                    <select class="custom-select form-control position pos" name="position" id="pos1" onchange="change();"> 
                                    <option selected disabled>Choose Here:</option>
                                    <option value="Indesigner">secret</option>
                                    <option value="Web Developer">something </option>
                                    </select>';
                                }
                            ?>
                           

                            <label>Employee Status</label>
                            <select class="custom-select form-control" name="employee_status" id="status">
                                <option selected disabled>Choose Here:</option>
                                <option value="Freelance">Freelance</option>
                                <option value="Project Based">Project Based</option>
                                <option value="Probationary">Probationary</option>
                                <option value="Regular">Regular</option>
                            </select>
                            
                            <label>Date hired</label><br>
                            <input type="date" id="date" name="date" class="form-control date">

                        </form>
                         <div style="text-align:right">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                            <button onclick='set_user();' disabled class="btn btn-success" id="update">Update</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script>

    var old_status = document.getElementById('status').value;
    var old_date = document.getElementById('date').value;

    $(document).change(function() {
        if(old_status != $('#status').val() && old_date != $('#date').val()){
            $('#update').attr("disabled", false);
        }else{
            $('#update').attr("disabled", true);

        }
    });

    function change() {
        var old_position = document.getElementById('pos').value;
        var old_position1 = document.getElementById('pos1').value;
        if(old_position != $('#pos').val() || old_position1 != $('#pos').val()){
            $('#update').attr("disabled", false);
        }else{
            $('#update').attr("disabled", true);

        }
    }
    function set_user() {
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
