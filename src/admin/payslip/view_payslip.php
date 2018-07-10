<?php
    include '../../utilities/db.php';
    $connect = Connect();
    $user_id = $_GET["user_id"];
    $first_name = $_GET["fname"];
    $middle_name = $_GET["mname"];
    $last_name = $_GET["lname"];
    $sql = "SELECT user_id, first_name, middle_name, last_name, department, position, date_hired FROM user_info NATURAL JOIN user natural join employee_info WHERE user_id='$user_id';";
    $result = $connect->query($sql);
    $row = $result->fetch_assoc();
?>
	<div class="modal fade" id="payslip" tabindex="-1" role="dialog" >
        <div class="modal-dialog" role="document" style="min-width: 160vh; max-width: 160vh;">
            <div class="modal-content"  style="border-radius: 0;">
                <div class="modal-body">
					<div class="row">
						<div class="col-lg-2"></div>
							<div class="col-lg-8">
								<div class="card rounded-0">
									<div class="container-fluid">
										<form action="">
											<div class="row">
												<div class="col-3"><img src="../../img/Lion.png" alt="Logo" style="width: auto; height:50px"></div>
												<div class="col-9">
													<h1 class="h2" style="vertical-align: center">VIVIXX CORPORATION</h1>
												</div>
											</div>
											<div class="row bg-dark text-white">
												<div class="col">
													<div class="mx-auto">DECEMBER 2017 PAYSLIP</div>
												</div>
												<div class="col">
													<div class="mx-auto">Payroll period: December 01-31, 2017</div>
												</div>
											</div>
											<div class="row text-center">
												<div class="col-4"><?php echo ucwords($row["first_name"] . " " . $row["middle_name"] . " ". $row["last_name"] . " ")?></div>
												<div class="col-4"><?php echo ucwords($row["position"])?></div>
												<div class="col-4"><?php echo $row["date_hired"]?></div>
											</div>
											<div class="row text-center border-bottom">
												<div class="col-4">EMPLOYEE NAME</div>
												<div class="col-4">POSITION</div>
												<div class="col-4">BOC</div>
											</div>
											<div class="row border-bottom">
												<label for="daily-rate" class="col-2 p-0">Basic Salary</label>
												<div class="col-2 p-0">
													<input type="text" class="form-control form-control-sm bg-dark text-white rounded-0" onkeypress="numberInput(event);" name="basic-salary">
												</div>
												<label for="daily-rate" class="col-2 p-0">&#9658; Daily Rate</label>
												<div class="col-2 p-0">
													<input type="text" class="form-control form-control-sm bg-dark text-white rounded-0" onkeypress="numberInput(event);" name="daily-rate">
												</div>
												<label for="hourly-rate" class="col-2 p-0">&#9658; Hourly Rate</label>
												<div class="col-2 p-0">
													<input type="text" class="form-control form-control-sm bg-dark text-white rounded-0" onkeypress="numberInput(event);" name="hourly-rate">
												</div>
											</div>
											<div class="row border-bottom">
												<div class="col-2"></div>
												<div class="col-6 bg-dark text-white">BASIC SALARY with COLA</div>
											</div>
											<div class="row border-bottom">
												<div class="col-2"></div>
												<div class="col-6">
													<div class="row">
														<div class="col-3 p-0">
															<input type="text" class="form-control form-control-sm rounded-0" onkeypress="numberInput(event);" name="basic-salary">
														</div>
														<div class="col-3 text-center"> X</div>
														<div class="col-3 p-0">
															<input type="text" class="form-control form-control-sm rounded-0" onkeypress="numberInput(event);" name="basic-salary-days">
														</div>
														<div class="col-3">days</div>
													</div>
												</div>
												<div class="col-4">
													<div class="row">
														<div class="col-1"> =</div>
														<div class="col-5">
															<input type="text" class="form-control form-control-sm rounded-0" onkeypress="numberInput(event);" name="basic-salary-total" disabled></div>
													</div>
												</div>
											</div>
											<div class="row border-bottom">
												<div class="col-2 text-right">PLUS</div>
												<div class="col-6 bg-dark text-white">NIGHT DIFFERENTIAL</div>
											</div>
											<div class="row border-bottom">
												<div class="col-2"></div>
												<div class="col-6">
													<div class="row">
														<div class="col-3 p-0">
															<input type="text" class="form-control form-control-sm rounded-0" onkeypress="numberInput(event);" name="night-differential">
														</div>
														<div class="col-3 text-center"> X</div>
														<div class="col-3 p-0">
															<input type="text" class="form-control form-control-sm rounded-0" onkeypress="numberInput(event);" name="night-differential-days">
														</div>
														<div class="col-3">days</div>
													</div>
												</div>
												<div class="col-4">
													<div class="row">
														<div class="col-1"> =</div>
														<div class="col-5">
															<input type="text" class="form-control form-control-sm rounded-0" onkeypress="numberInput(event);" name="night-differential-days" disabled></div>
													</div>
												</div>
											</div>
											<div class="row border-bottom">
												<div class="col-2 text-right">PLUS</div>
												<div class="col-6 bg-dark text-white">OVERTIME PAY</div>
											</div>
											<div class="row border-bottom">
												<div class="col-2"></div>
												<div class="col-6">
													<div class="row">
														<div class="col-3 p-0">
															<input type="text" class="form-control form-control-sm rounded-0" onkeypress="numberInput(event);" name="overtime-pay">
														</div>
														<div class="col-3 text-center"> X</div>
														<div class="col-3 p-0">
															<input type="text" class="form-control form-control-sm rounded-0" onkeypress="numberInput(event);" name="overtime-pay-days">
														</div>
														<div class="col-3">days</div>
													</div>
												</div>
												<div class="col-4">
													<div class="row">
														<div class="col-1"> =</div>
														<div class="col-5">
															<input type="text" class="form-control form-control-sm rounded-0" onkeypress="numberInput(event);" name="overtime-pay-total" disabled></div>
													</div>
												</div>
											</div>
											<div class="row border-bottom">
												<div class="col-2 text-right">PLUS</div>
												<div class="col-6 bg-dark text-white">HOLIDAY PAY</div>
											</div>
											<div class="row border-bottom">
												<div class="col-2"></div>
												<div class="col-6">
													<div class="row">
														<div class="col-3 p-0">
															<input type="text" class="form-control form-control-sm rounded-0" onkeypress="numberInput(event);" name="holiday-pay">
														</div>
														<div class="col-3 text-center"> X</div>
														<div class="col-3 p-0">
															<input type="text" class="form-control form-control-sm rounded-0" onkeypress="numberInput(event);" name="holiday-pay-days">
														</div>
														<div class="col-3">days</div>
													</div>
												</div>
												<div class="col-4">
													<div class="row">
														<div class="col-1"> =</div>
														<div class="col-5">
															<input type="text" class="form-control form-control-sm rounded-0" onkeypress="numberInput(event);" name="holiday-pay-total" disabled></div>
													</div>
												</div>
											</div>
											<div class="row border-bottom">
												<div class="col-2 text-right">PLUS</div>
												<div class="col-6 bg-dark text-white">INCENTIVES</div>
											</div>
											<div class="row border-bottom">
												<div class="col-2 text-right">[1]</div>
												<div class="col-6">
													Transportation and Representation allowance
												</div>
												<div class="col-4">
													<div class="row">
														<div class="col-1"> =</div>
														<div class="col-5">
															<input type="text" class="form-control form-control-sm rounded-0" onkeypress="numberInput(event);" name="transportation-allowance"></div>
													</div>
												</div>
											</div>
											<div class="row border-bottom">
												<div class="col-2 text-right">[2]</div>
												<div class="col-6">
													Meal and Rice allowance
												</div>
												<div class="col-4">
													<div class="row">
														<div class="col-1"> =</div>
														<div class="col-5">
															<input type="text" class="form-control form-control-sm rounded-0" onkeypress="numberInput(event);" name="meal-allowance"></div>
													</div>
												</div>
											</div>
											<div class="row border-bottom">
												<div class="col-2 text-right">[3]</div>
												<div class="col-6">
													Communications allowance
												</div>
												<div class="col-4">
													<div class="row">
														<div class="col-1"> =</div>
														<div class="col-5">
															<input type="text" class="form-control form-control-sm rounded-0" onkeypress="numberInput(event);" name="communications-allowance"></div>
													</div>
												</div>
											</div>
											<div class="row border-bottom">
												<div class="col-2 text-right">[4]</div>
												<div class="col-6">
													Clothing allowance
												</div>
												<div class="col-4">
													<div class="row">
														<div class="col-1"> =</div>
														<div class="col-5">
															<input type="text" class="form-control form-control-sm rounded-0" onkeypress="numberInput(event);" name="clothing-allowance"></div>
													</div>
												</div>
											</div>
											<div class="row border-bottom">
												<div class="col-2 text-right">[5]</div>
												<div class="col-6">
													Attendance Incentive
												</div>
												<div class="col-4">
													<div class="row">
														<div class="col-1"> =</div>
														<div class="col-5">
															<input type="text" class="form-control form-control-sm rounded-0" onkeypress="numberInput(event);" name="attendance-incentive"></div>
													</div>
												</div>
											</div>
											<div class="row border-bottom p-0">
												<div class="col-2 text-right">[6]</div>
												<div class="col-6">
													Medical and Dental allowance
												</div>
												<div class="col-4">
													<div class="row p-0">
														<div class="col-1"> =</div>
														<div class="col-5">
															<input type="text" class="form-control form-control-sm rounded-0" onkeypress="numberInput(event);" name="medical-allowance"></div>
														<div class="col-5 p-0">
															<input type="text" class="form-control form-control-sm rounded-0 bg-dark
														text-white" onkeypress="numberInput(event);" name="incentive-total" disabled></div>
													</div>
												</div>
											</div>
											<div class="row border-bottom">
												<div class="col-2 text-right">LESS</div>
												<div class="col-6 bg-dark text-white">DEDUCTIONS</div>
											</div>
											<div class="row border-bottom">
												<div class="col-2 text-right">[1]</div>
												<div class="col-6">
													15th of the Month Payroll + incentives
												</div>
												<div class="col-4">
													<div class="row">
														<div class="col-1"> =</div>
														<div class="col-5">
															<input type="text" class="form-control form-control-sm rounded-0" onkeypress="numberInput(event);" name="fifteenth-of-the-month"></div>
													</div>
												</div>
											</div>
											<div class="row border-bottom">
												<div class="col-2 text-right">[2]</div>
												<div class="col-6">
													W/H tax deduction
												</div>
												<div class="col-4">
													<div class="row">
														<div class="col-1"> =</div>
														<div class="col-5">
															<input type="text" class="form-control form-control-sm rounded-0" onkeypress="numberInput(event);" name="W/H-tax-deduction"></div>
													</div>
												</div>
											</div>
											<div class="row border-bottom">
												<div class="col-2 text-right">[3]</div>
												<div class="col-6">
													SSS: EE contribution
												</div>
												<div class="col-4">
													<div class="row">
														<div class="col-1"> =</div>
														<div class="col-5">
															<input type="text" class="form-control form-control-sm rounded-0" onkeypress="numberInput(event);" name="sss"></div>
													</div>
												</div>
											</div>
											<div class="row border-bottom">
												<div class="col-2 text-right">[4]</div>
												<div class="col-6">
													PHIC: EE contribution
												</div>
												<div class="col-4">
													<div class="row">
														<div class="col-1"> =</div>
														<div class="col-5">
															<input type="text" class="form-control form-control-sm rounded-0" onkeypress="numberInput(event);" name="PHIC"></div>
													</div>
												</div>
											</div>
											<div class="row border-bottom">
												<div class="col-2 text-right">[5]</div>
												<div class="col-6">
													HMDF: EE contribution
												</div>
												<div class="col-4">
													<div class="row">
														<div class="col-1"> =</div>
														<div class="col-5">
															<input type="text" class="form-control form-control-sm rounded-0" onkeypress="numberInput(event);" name="hmdf"></div>
													</div>
												</div>
											</div>
											<div class="row border-bottom p-0">
												<div class="col-2 text-right">[6]</div>
												<div class="col-6">
													Cash Advance/s
												</div>
												<div class="col-4">
													<div class="row p-0">
														<div class="col-1"> =</div>
														<div class="col-5">
															<input type="text" class="form-control form-control-sm rounded-0" onkeypress="numberInput(event);" name="cash-advances"></div>
													</div>
												</div>
											</div>
											<div class="row border-bottom p-0">
												<div class="col-2 text-right">[7]</div>
												<div class="col-6">
													Payment: Salary loan
												</div>
												<div class="col-4">
													<div class="row p-0">
														<div class="col-1"> =</div>
														<div class="col-5">
															<input type="text" class="form-control form-control-sm rounded-0" onkeypress="numberInput(event);" name="salary-loan"></div>
														<div class="col-5 p-0">
															<input type="text" class="form-control form-control-sm rounded-0 bg-dark
														text-white" onkeypress="numberInput(event);" name="deductions-total" disabled></div>
													</div>
												</div>
											</div>
											<br>
											<div class="row border-top border-bottom p-0">
												<div class="col-10 text-right">AMOUNT PAYABLE &#9658;</div>
												<div class="col-2 p-0">
													<input type="text" class="form-control form-control-sm rounded-0 bg-dark
														text-white" onkeypress="numberInput(event);" name="overall-total" disabled>
												</div>
											</div>
											<br>
											<div class="row">
												<div class="col-6 text-center">I hereby conform and agree to above:</div>
												<div class="col-2"></div>
												<div class="col-4 text-center">Prepared by:</div>
											</div>
											<div class="row">
												<div class="col-6 bg-secondary border-bottom border-dark text-center"><br></div>
												<div class="col-2"><br></div>
												<div class="col-4 bg-secondary border-bottom border-dark text-center"><br>BEN CARIAGA
												</div>
											</div>
											<div class="row">
												<div class="col-6 text-center">SIGNATURE ABOVE PRINTED NAME</div>
												<div class="col-2"></div>
												<div class="col-4 text-center">Chief Operations Officer</div>
											</div>
										</form>

									</div>
								</div>
							</div>
						<div class="col-lg-2"></div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script>
		$(document).ready(function(){
        	$("#payslip").modal("show");
    	});
	</script>
