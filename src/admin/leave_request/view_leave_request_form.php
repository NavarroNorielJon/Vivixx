
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

    <form id="accept_reject" action="accept_or_reject.php" method="POST">
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
							<input type="text" class="form-control-plaintext" style="font-size:1.5rem;" id="employee_name" name="employeeName" readonly value="<?php echo ucwords($user) . " " . ucwords($user_middle) . " " . ucwords($user_last)?>">
						</div>

						<div class="form-group col">
							<label for="department">Department</label>
							<input type="text" class="form-control-plaintext" style="font-size:1.5rem;" id="department" name="dept" readonly value="<?php echo $row['department']?>">
						</div>
					</div>

                    <div class="row">
                        <div class="form-group col">
                            <label>Position</label>
                            <input type="text" class="form-control-plaintext" style="font-size:1.5rem;" id="position" name="position" readonly required value="<?php echo $row['position']?>">

                        </div>

                        <div class="form-group col">
                            <label for="date_hired">Date Hired</label>
                            <input type="text" class="form-control-plaintext" style="font-size:1.5rem;" id="date_hired" name="dateHired" readonly required value="<?php echo $row['date_hired']?>">

                        </div>

                        <div class="form-group col">
                            <label for="date_filed">Date Filed</label>
                            <input type="text" class="form-control-plaintext" style="font-size:1.5rem;" id="date_filed" name="dateFilled" readonly value="<?php echo $row['date_filed']?>">
                        </div>
				    </div><hr>

                    <div>
                        <div class="form-group">
                            <label for="other_reason">Reason for Leave</label>
                            <input type="text" class="form-control-plaintext" style="font-size:1.5rem;" id="reason" readonly value="<?php echo $row['reason']?>">
                        </div>

                        <div class="row">
                            <div class="form-group col">
                                <label for="credit">Maximum Leave Credits</label>
                                <input type="text" class="form-control-plaintext"  style="font-size:1.5rem;" id="credit" readonly value="5">
                            </div>

                            <div class="form-group col">
                                <label for="used">Used Leave Credits</label>
                                <input type="text" class="form-control-plaintext"  style="font-size:1.5rem;" id="used" readonly value="<?php echo $row['used']?>">
                            </div>

                            <div class="form-group col">
                                <label for="balance">Remaining Balance</label>
                                <input type="text" class="form-control-plaintext" style="font-size:1.5rem;" id="balance" readonly value="<?php echo $row['remaining']?>">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col">
                                <label for="address_leave">Contact Address during leave</label>
                                <input type="text" class="form-control-plaintext" style="font-size:1.5rem;" id="address_leave" readonly value="<?php echo $row['contact_address']?>">
                            </div>

                            <div class="form-group col">
                                <label for="number_leave">Contact Number during leave</label>
                                <input type="text" class="form-control-plaintext" style="font-size:1.5rem;" id="number_leave" readonly value="<?php echo $row['contact_number']?>">
                            </div>
                        </div>
				    </div><hr>

                    <div>
                        <h1>Inclusive days applied</h1>

                        <div class="row">
                            <div class="form-group col">
                                <label for="start_date">From</label>
                                <input type="text" class="form-control-plaintext" style="font-size:1.5rem;" readonly value="<?php echo $row['from']?>">
                            </div>

                            <div class="form-group col">
                                <label for="end_date">To</label>
                                <input type="text" class="form-control-plaintext" style="font-size:1.5rem;" id="end_date" readonly value="<?php echo $row['to']?>">
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
        $('#accept_reject').ajaxForm({
            url: 'accept_or_reject.php',
            method: 'post',
            success: function (data) {
                let dat = data;
                if(dat.stat == "User has no more remaining leave credits"){
                    swal({
                        type: 'error',
                        title: dat.stat,
                        icon: 'error',
                        showConfirmButton: true,
                    }).then(function(){
                        location.reload();
                    });
                } else if (dat.stat == "Rejected") {
                    $.post({
                        url: '../../mailing/accept_or_reject.php',
                        data: {
                            status: dat.status,
                            email: dat.email
                        },
                        success: function () {
                            swal({
                                type: 'error',
                                title: dat.stat,
                                icon: 'error',
                                showLoaderOnConfirm: true

                            }).then(function (){
                                swal({
                                    type: 'success',
                                    title: 'Email Successfully Sent',
                                    icon: 'success',
                                    showConfirmButton: true
                                }).then(function (){
                                    location.reload();
                                });
                            });
                        }
                    });

                } else if (dat.stat == "Error in updating status") {
                    swal({
                        type: 'error',
                        title: dat.stat,
                        icon: 'error',
                        showConfirmButton: true,
                    }).then(function(){
                        location.reload();
                    });
                } else if (dat.stat == "Accepted") {
                    $.post({
                        url: '../../mailing/accept_or_reject.php',
                        data: {
                            status: dat.status,
                            email: dat.email
                        },
                        success: function () {
                            swal({
                                type: 'success',
                                title: dat.stat,
                                icon: 'success',
                                showConfirmButton: true,
                                showLoaderOnConfirm: true
                            }).then(function (){
                                swal({
                                    type: 'success',
                                    title: 'Email Successfully Sent',
                                    icon: 'success',
                                    showConfirmButton: true
                                }).then(function (){
                                    location.reload();
                                });
                            });
                        }
                    });

                }
            }
        });
        $(document).ready(function(){
            $("#request").modal("show");
        });
    </script>
