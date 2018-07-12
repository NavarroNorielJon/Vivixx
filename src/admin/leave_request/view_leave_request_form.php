<?php
    include '../../utilities/db.php';
    $connect = Connect();
    $user_id = $_GET["user_id"];
    $req_id = $_GET["req_id"];
    $leave_request = "SELECT *, email from leave_req join user using(user_id) where user_id='$user_id' and leave_req_id='$req_id';";
    $result = $connect->query($leave_request);
    $row = $result->fetch_assoc();
	$user = $_GET["fname"];
	$user_middle = $_GET["mname"];
    $user_last = $_GET["lname"];
?>
    <form action="accept_or_reject.php" method="POST">
    <div class="modal fade" id="request" tabindex="-1" role="dialog" >
        <div class="modal-dialog" role="document" style="min-width: 130vh; max-width: 130vh;">
            <div class="modal-content"  style="border-radius: 0;">
                <div class="modal-header">
					<h1>Leave Request Form</h1>
                </div>
                <input type="hidden" name="req_id" value="<?php echo $req_id?>">
                <input type="hidden" name="email" value="<?php echo $row["email"]?>">
                <input type="hidden" name="used" value="<?php echo $row["used"]?>">
                <input type="hidden" name="remaining" value="<?php echo $row["remaining"]?>">

                <div class="modal-body">
                    <div class="row">
						<div class="form-group col">
							<label for="employee_name">Employee</label>
							<input type="text" class="form-control" id="employee_name" name="employeeName" disabled value="<?php echo ucwords($user) . " " . ucwords($user_middle) . " " . ucwords($user_last)?>">
						</div>

						<div class="form-group col">
							<label for="department">Department</label>
							<input type="text" class="form-control" id="department" name="dept" disabled value="<?php echo $row['department']?>">
						</div>
					</div>

                    <div class="row">
                        <div class="form-group col">
                            <?php
                                if($row['department'] === "Phone ESL" || $row['department'] === "Video ESL" || $row['department'] === "Non-Voice Account"){
                                    echo '
                                    <label>Position</label>
                                    <select class="custom-select form-control" disabled name="position" required>
                                        <option selected required="require" value="Online English Tutor">Online English Tutor</option>
                                    </select>';
                                }else if($row['department'] === "Administration/HR Support"){
                                    echo '
                                    <label>Position</label>
                                    <select class="custom-select form-control" disabled name="position" required>
                                    <option selected required="require" value="HR Assistant">HR Assistant</option>
                                    </select>';
                                }else if($row['department'] === "IT Support"){
                                    echo '
                                    <label>Position</label>
                                    <select class="custom-select form-control" disabled name="position" required>
                                    <option selected required="require" value="ICT Support Specialist">ICT Support Specialist</option>
                                    </select>';
                                }else if($row['department'] === "Virtual Assistant"){
                                    echo '
                                    <label>Position</label>
                                    <select class="custom-select form-control" disabled name="position" required>
                                    <option selected required="require" disabled>Choose Here:</option>
                                    <option value="Indesigner">Indesigner</option>
                                    <option value="Web Developer">We Developer</option>
                                    </select>';
                                }else{
                                    echo '
                                    <label>Position</label>
                                    <select class="custom-select form-control" disabled name="position" required>
                                    <option selected required="require" disabled>Choose Here:</option>
                                    <option value="Indesigner">secret</option>
                                    <option value="Web Developer">something </option>
                                    </select>';
                                }
                            ?>
                        </div>

                        <div class="form-group col">
                            <label for="date_hired">Date Hired</label>
                            <input type="date" class="form-control" id="date_hired" name="dateHired" disabled required value="<?php echo $row['date_hired']?>">
                        </div>

                        <div class="form-group col">
                            <label for="date_filed">Date Filed</label>
                            <input type="date" class="form-control" id="date_filed" name="dateFilled" disabled value="<?php echo $row['date_filed']?>">
                        </div>
				    </div><hr>

                    <div>
                        <div class="form-group">
                            <label for="other_reason">Reason for Leave</label>
                            <input type="text" class="form-control" id="reason" disabled value="<?php echo $row['reason']?>">
                        </div>

                        <div class="row">
                            <div class="form-group col">
                                <label for="credit">Maximum Leave Credits</label>
                                <input type="text" class="form-control" id="credit" disabled value="5">
                            </div>

                            <div class="form-group col">
                                <label for="used">Used Leave Credits</label>
                                <input type="text" class="form-control" id="used" disabled value="<?php echo $row['used']?>">
                            </div>

                            <div class="form-group col">
                                <label for="balance">Remaining Balance</label>
                                <input type="text" class="form-control" id="balance" disabled value="<?php echo $row['remaining']?>">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col">
                                <label for="address_leave">Contact Address during leave</label>
                                <input type="text" class="form-control" id="address_leave" disabled value="<?php echo $row['contact_address']?>">
                            </div>

                            <div class="form-group col">
                                <label for="number_leave">Contact Number during leave</label>
                                <input type="text" class="form-control" id="number_leave" disabled value="<?php echo $row['contact_number']?>">
                            </div>
                        </div>
				    </div><hr>

                    <div>
                        <h1>Inclusive days applied</h1>

                        <div class="row">
                            <div class="form-group col">
                                <label for="start_date">From</label>
                                <input type="date" class="form-control" disabled value="<?php echo $row['from']?>">
                            </div>

                            <div class="form-group col">
                                <label for="end_date">To</label>
                                <input type="date" class="form-control" id="end_date" disabled value="<?php echo $row['to']?>">
                            </div>
                        </div>
				    </div>

                    <div style="text-align:right">
                        <input type="submit" class="btn btn-danger" name="reject" value="Disapprove">
                        <input type="submit" class="btn btn-success" name="accept" value="Approve">
                    </div>

                </div>
            </div>
        </div>
    </div>
    </form>
    <script>
        $(document).ready(function(){
            $("#request").modal("show");
        });
    </script>
