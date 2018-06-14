<html>
<head>
    <title>Leave request</title>
</head>

<body>
    <div class="modal fade" id="request" tabindex="-1" role="dialog" >
        <div class="modal-dialog" role="document" style="min-width: 130vh; max-width: 130vh;">
            <div class="modal-content">
                <div class="modal-header">
                    <?php
                        $user = $_GET["fname"];
                        $user_middle = $_GET["mname"];
                        $user_last = $_GET["lname"];
                        echo "<h1>" ."Information of ". $user . " " . $user_middle . " " . $user_last ."</h1>";
                    ?>
                </div>
    
                <div class="modal-body">
                    <div class="row">
						<div class="form-group col">
							<label for="employee_name">Employee</label>
							<input type="text" class="form-control" id="employee_name" placeholder="Employee Name" name="employeeName">
						</div>

						<div class="form-group col">
							<label for="department">Department</label>
							<input type="text" class="form-control" id="department" placeholder="department" name="dept">
						</div>
					</div>

                    <div class="row">
                        <div class="form-group col">
                            <label for="position">Position</label>
                            <input type="text" class="form-control" id="position" placeholder="Position" name="employeePosition">
                        </div>
                        
                        <div class="form-group col">
                            <label for="date_hired">Date Hired</label>
                            <input type="date" class="form-control" id="date_hired" placeholder="Date Hired" name="dateHired">
                        </div>
                        
                        <div class="form-group col">
                            <label for="date_filed">Date Filed</label>
                            <input type="date" class="form-control" id="date_filed" placeholder="date_filed" name="dateFilled">
                        </div>
				    </div><hr>

                    <div>
                        <select class="custom-select form-group" name="reason">
                            <option selected disabled>Reason for leave</option>
                            <option value="Vacation">Vacation</option>
                            <option value="Emergency">Emergency Leave</option>
                            <option value="Maternal Leave">Maternity Leave</option>
                            <option value="Paternal Leave">Paternity Leave</option>
                            <option value="Sick Leave">Sick Leave</option>
                            <option value="Sent Home">Sent Home</option>
                            <option value="Others">Others</option>
                        </select>
					
                        <div class="form-group">
                            <label for="other_reason">(Please Specify)</label>
                            <input type="text" class="form-control" id="other_reason">
                        </div>
					
                        <div class="row">
                            <div class="form-group col">
                                <label for="address_leave">Contact Address during leave</label>
                                <input type="text" class="form-control" id="address_leave">
                            </div>
                            
                            <div class="form-group col">
                                <label for="number_leave">Contact Number during leave</label>
                                <input type="text" class="form-control" id="number_leave">
                            </div>
                        </div>
				    </div><hr>

                    <div>
                        <h1>Inclusive days applied</h1>
                        
                        <div class="row">
                            <div class="form-group col">
                                <label for="start_date">From</label>
                                <input type="date" class="form-control" >
                            </div>
                            
                            <div class="form-group col">
                                <label for="end_date">To</label>
                                <input type="date" class="form-control" id="end_date">
                            </div>
                        </div>
				    </div>

                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            $("#request").modal("show");
        });
    </script>
</body>
</html>