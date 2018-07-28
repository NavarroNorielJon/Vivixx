<?php
    include '../mis/utilities/db.php';
    $connect = Connect();
    $user_id = $_GET["user_id"];
    $first_name = $_GET["fname"];
    $middle_name = $_GET["mname"];
    $last_name = $_GET["lname"];
    $sql = "SELECT user_id, first_name, middle_name, last_name, department, position, date_hired FROM user_info NATURAL JOIN user natural join employee_info WHERE user_id='$user_id';";
    $result = $connect->query($sql);
    $row = $result->fetch_assoc();
?>
	<div class="modal fade" id="summary" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document" style="min-width: 160vh; max-width: 160vh;">
			<div class="modal-content" style="border-radius: 0;">
                <div class="modal-header">
                    Summary of Pay
                </div>
				<div class="modal-body">
                    <div class="modal-body">

                        <div class="row">
                            <div class="form-group col">
                                <label>NAME</label>
                                <input type="text" class="form-control-plaintext" name="" value="<?php echo $first_name . " " . $last_name ?>" readonly>
                            </div>
                            <div class="form-group col">
                                <label><?php echo date('Y_m'); ?> SRF</label>
                                <input type="text" class="form-control-plaintext" name="" value="15,000.00" readonly>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="form-group col">
                                <label>BASIC PAY</label>
                                <input type="text" class="form-control-plaintext" name="" value="6,600.00" readonly>
                            </div>
                            <div class="form-group col">
                                <label>NIGHT DIFF</label>
                                <input type="text" class="form-control-plaintext" name="" value="-" readonly>
                            </div>
                            <div class="form-group col">
                                <label>OTHER PAY</label>
                                <input type="text" class="form-control-plaintext" name="" value="8,400.00" readonly>
                            </div>
                            <div class="form-group col">
                                <label>ALLOWANCE</label>
                                <input type="text" class="form-control-plaintext" name="" value="3,000.00" readonly>
                            </div>
                            <div class="form-group col">
                                <label>TAX REFUND</label>
                                <input type="text" class="form-control-plaintext" name="" value="-" readonly>
                            </div>
                            <div class="form-group col">
                                <label>HOLIDAY</label>
                                <input type="text" class="form-control-plaintext" name="" value="600.00" readonly>
                            </div>
                            <div class="form-group col">
                                <label>GROSS PAY</label>
                                <input type="text" class="form-control-plaintext" name="" value="27,850.00" readonly>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="form-group col">
                                <label>SSS</label>
                                <input type="text" class="form-control-plaintext" name="" value="254.30" readonly>
                            </div>
                            <div class="form-group col">
                                <label>PHIC</label>
                                <input type="text" class="form-control-plaintext" name="" value="137.50" readonly>
                            </div>
                            <div class="form-group col">
                                <label>HDMF</label>
                                <input type="text" class="form-control-plaintext" name="" value="100.00" readonly>
                            </div>
                            <div class="form-group col">
                                <label>SSS-L</label>
                                <input type="text" class="form-control-plaintext" name="" value="-" readonly>
                            </div>
                            <div class="form-group col">
                                <label>HDMF-L</label>
                                <input type="text" class="form-control-plaintext" name="" value="-" readonly>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="form-group col">
                                <label>CO-LOAN</label>
                                <input type="text" class="form-control-plaintext" name="" value="-" readonly>
                            </div>
                            <div class="form-group col">
                                <label>S-LOAN</label>
                                <input type="text" class="form-control-plaintext" name="" value="-" readonly>
                            </div>
                            <div class="form-group col">
                                <label>S-LOAN2</label>
                                <input type="text" class="form-control-plaintext" name="" value="-" readonly>
                            </div>
                            <div class="form-group col">
                                <label>REGULAR LOAN</label>
                                <input type="text" class="form-control-plaintext" name="" value="-" readonly>
                            </div>
                            <div class="form-group col">
                                <label>OTHER DDCTN</label>
                                <input type="text" class="form-control-plaintext" name="" value="-" readonly>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="form-group col">
                                <label>TESOL LOAN</label>
                                <input type="text" class="form-control-plaintext" name="" value="-" readonly>
                            </div>
                            <div class="form-group col">
                                <label>P-LOAN</label>
                                <input type="text" class="form-control-plaintext" name="" value="-" readonly>
                            </div>
                            <div class="form-group col">
                                <label>CASH ADV</label>
                                <input type="text" class="form-control-plaintext" name="" value="-" readonly>
                            </div>
                            <div class="form-group col">
                                <label>TAX</label>
                                <input type="text" class="form-control-plaintext" name="" value="-" readonly>
                            </div>
                            <div class="form-group col">
                                <label>TOTAL DDCTN</label>
                                <input type="text" class="form-control-plaintext" name="" value="491.80" readonly>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="form-group col">
                                <label>15TH PAY-OUT</label>
                                <input type="text" class="form-control-plaintext" name="" value="7,200.00" readonly>
                            </div>
                            <div class="form-group col">
                                <label>30TH PAY-OUT</label>
                                <input type="text" class="form-control-plaintext" name="" value="20,158.20" readonly>
                            </div>
                            <div class="form-group col">
                                <label>NET PAY</label>
                                <input type="text" class="form-control-plaintext" name="" value="27,358.20" readonly>
                            </div>
                        </div>
                    </div>
				</div>
			</div>
		</div>
	</div>
	<script>
		$(document).ready(function() {
			$("#summary").modal("show");
		});

	</script>
