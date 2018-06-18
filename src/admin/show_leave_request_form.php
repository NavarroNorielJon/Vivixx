<?php
    include '../utilities/db.php';
    $connect = Connect();
    $user_id = $_GET["user_id"];
    $leave_request = "SELECT * FROM mis.leave_req natural join user where user_id='$user_id';";
    $result = $connect->query($leave_request);
    $row = $result->fetch_assoc();
?>
    <form action="accept_or_reject.php" method="POST">
    <div class="modal fade" id="request" tabindex="-1" role="dialog" >
        <div class="modal-dialog" role="document" style="min-width: 130vh; max-width: 130vh;">
            <div class="modal-content">
                <div class="modal-header">
                    <?php
                        $user = $_GET["fname"];
                        $user_middle = $_GET["mname"];
                        $user_last = $_GET["lname"];
                        echo "<h1>" ."Request form of ". ucwords($user) . " " . ucwords($user_middle) . " " . ucwords($user_last) ."</h1>";
                    ?>
                </div>

                <div class="modal-body">
                    <div class="row">
						<div class="form-group col">
							<label for="employee_name">Employee</label>
							<input type="text" class="form-control" id="employee_name" placeholder="Employee Name" name="employeeName" disabled>
						</div>

						<div class="form-group col">
							<label for="department">Department</label>
							<input type="text" class="form-control" id="department" placeholder="department" name="dept" disabled>
						</div>
					</div>

                    <div class="row">
                        <div class="form-group col">
                            <label for="position">Position</label>
                            <input type="text" class="form-control" id="position" placeholder="Position" name="employeePosition" disabled>
                        </div>
                        
                        <div class="form-group col">
                            <label for="date_hired">Date Hired</label>
                            <input type="date" class="form-control" id="date_hired" placeholder="Date Hired" name="dateHired" disabled>
                        </div>
                        
                        <div class="form-group col">
                            <label for="date_filed">Date Filed</label>
                            <input type="date" class="form-control" id="date_filed" placeholder="date_filed" name="dateFilled" disabled>
                        </div>
				    </div><hr>

                    <div>
                        <div class="form-group">
                            <label for="other_reason">Reason for Leave</label>
                            <input type="text" class="form-control" id="reason" disabled>
                        </div>
                        
                        <div class="row">
                            <div class="form-group col">
                                <label for="credit">Credit</label>
                                <input type="text" class="form-control" id="credit" disabled value="5">
                            </div>
                            
                            <div class="form-group col">
                                <label for="used">Used</label>
                                <input type="text" class="form-control" id="used" disabled>
                            </div>

                            <div class="form-group col">
                                <label for="balance">Balance</label>
                                <input type="text" class="form-control" id="balance" disabled>
                            </div>
                        </div>
					
                        <div class="row">
                            <div class="form-group col">
                                <label for="address_leave">Contact Address during leave</label>
                                <input type="text" class="form-control" id="address_leave" disabled>
                            </div>
                            
                            <div class="form-group col">
                                <label for="number_leave">Contact Number during leave</label>
                                <input type="text" class="form-control" id="number_leave" disabled>
                            </div>
                        </div>
				    </div><hr>

                    <div>
                        <h1>Inclusive days applied</h1>
                        
                        <div class="row">
                            <div class="form-group col">
                                <label for="start_date">From</label>
                                <input type="date" class="form-control" disabled>
                            </div>
                            
                            <div class="form-group col">
                                <label for="end_date">To</label>
                                <input type="date" class="form-control" id="end_date" disabled>
                            </div>
                        </div>
				    </div>

                    <div style="text-align:right">
                        <input type="submit" name="reject" value="Reject">
                        <input type="submit" name="accept" value="Accept">
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