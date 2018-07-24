<?php
    include '../utilities/db.php';
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
				<div class="modal-body">
					<div class="summary">
						<table border=1>
							<th class="header">Income Name</th>
							<th class="header">Amount</th>

							<tr class="srf">
								<td>
									<?php echo date("Y-m")?> SRF</td>
								<td class="value">15,000.00</td>
							</tr>

							<tr class="gross_pay">
								<td>BASIC PAY</td>
								<td class="value">6,600.00</td>
							</tr>
							<tr class="gross_pay">
								<td>NIGHT DIFF</td>
								<td class="value">-</td>
							</tr>
							<tr class="gross_pay">
								<td>OTHER PAY</td>
								<td class="value">8,400.00</td>
							</tr>
							<tr class="gross_pay">
								<td>ALWNC</td>
								<td class="value">3,000.00</td>
							</tr>
							<tr class="gross_pay">
								<td>TAX REFUND</td>
								<td class="value">-</td>
							</tr>
							<tr class="gross_pay">
								<td>HLDY</td>
								<td class="value">600.00</td>
							</tr>
							<tr class="gross_total">
								<td>GROSS PAY</td>
								<td class="value">27,850.00</td>
							</tr>

							<tr class="deduction">
								<td>SSS</td>
								<td class="value">254.30</td>
							</tr>
							<tr class="deduction">
								<td>PHIC</td>
								<td class="value">137.50</td>
							</tr>
							<tr class="deduction">
								<td>HDMF</td>
								<td class="value">100.00</td>
							</tr>
							<tr class="deduction">
								<td>SSS-L</td>
								<td class="value">-</td>
							</tr>
							<tr class="deduction">
								<td>HMDF-L</td>
								<td class="value">-</td>
							</tr>
							<tr class="deduction">
								<td>CO-LOAN</td>
								<td class="value">-</td>
							</tr>
							<tr class="deduction">
								<td>S-LOAN</td>
								<td class="value">-</td>
							</tr>
							<tr class="deduction">
								<td>S-LOAN2</td>
								<td class="value">-</td>
							</tr>
							<tr class="deduction">
								<td>REGULAR LOAN</td>
								<td class="value">-</td>
							</tr>
							<tr class="deduction">
								<td>DDCTN</td>
								<td class="value">-</td>
							</tr>
							<tr class="deduction">
								<td>TESOL LOAN</td>
								<td class="value">-</td>
							</tr>
							<tr class="deduction">
								<td>P-LOAN</td>
								<td class="value">-</td>
							</tr>
							<tr class="deduction">
								<td>CASH ADV</td>
								<td class="value">-</td>
							</tr>
							<tr class="deduction">
								<td>TAX</td>
								<td class="value">-</td>
							</tr>
							<tr class="total_deduction">
								<td>TOTAL DDCTN</td>
								<td class="value">491.80</td>
							</tr>

							<tr class="pay">
								<td>15th PAY OUT</td>
								<td class="value">7,200.00</td>
							</tr>
							<tr class="pay">
								<td>30th PAY OUT</td>
								<td class="value">20,158.20</td>
							</tr>
							<tr class="net_pay">
								<td>NET PAY</td>
								<td class="value">27,358.20</td>
							</tr>
						</table>
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
