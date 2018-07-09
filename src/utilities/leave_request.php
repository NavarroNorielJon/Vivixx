<?php
    include 'session.php';
    include 'check_session.php';
    $connect = Connect();
    $sql = "SELECT department, date_hired, employee_status, position FROM employee_info where user_id = '$user_id'";
    $result = mysqli_query($connect, $sql);
    $row = mysqli_fetch_assoc($result);
    $employee = $first_name . "," . $middle_name . "," . $last_name;
    $department = $row['department'];
    $date_hired = $row['date_hired'];
    $employee_status = $row['employee_status'];
    $position = $row['position'];
    $employee = $first_name . "," . $middle_name . "," . $last_name;
    $reason = mysqli_real_escape_string($connect, $_POST['type']);
    if ($reason === "others") {
        $reason = mysqli_real_escape_string($connect, $_POST['others']);
    } elseif ($reason === "Emergency") {
        $reason = mysqli_real_escape_string($connect, $_POST['emer']);
    } elseif ($reason === ""){
        exit();
    }
	$contact_address = ucwords(mysqli_real_escape_string($connect, $_POST['contact_address']));
    $contact_number = mysqli_real_escape_string($connect, $_POST['contact_number']);
    $from = mysqli_real_escape_string($connect, $_POST['from']);
    $to = mysqli_real_escape_string($connect, $_POST['to']);
	$from = date('Y-m-d', strtotime($from));
    $to = date('Y-m-d', strtotime($to));
    $date_hired = date('Y-m-d', strtotime($date_hired));

    $insert_stmt = "INSERT INTO `leave_req` (`user_id`, `employee`, `department`,
		 `date_hired`, `date_filed`, `reason`, `contact_address`, `contact_number`, `from`, `to`)
		VALUES ('$user_id', '$employee', '$department', '$date_hired', NOW(), '$reason', '$contact_address',
		'$contact_number', '$from', '$to') ;";
    $connect->query($insert_stmt);

?>
