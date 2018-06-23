<?php
    include 'session.php';
    include 'check_session.php';
    $connect = Connect();

	$contact_address = mysqli_real_escape_string($connect, $_POST['contact_address']);
    $contact_number = mysqli_real_escape_string($connect, $_POST['contact_number']);
	$date_filed  = mysqli_real_escape_string($connect, $_POST['date_filed']);
	$date_filed = date('Y-m-d', strtotime($date_filed));
	$date_hired  = mysqli_real_escape_string($connect, $_POST['date_hired']);
	$date_hired = date('Y-m-d', strtotime($date_hired));
	$department = mysqli_real_escape_string($connect, $_POST['department']);
    $employee = $first_name . "," . $middle_name . "," . $last_name;
	$from = mysqli_real_escape_string($connect, $_POST['from']);
	$from = date('Y-m-d', strtotime($from));
    $position = mysqli_real_escape_string($connect, $_POST['position']);
    $reason = mysqli_real_escape_string($connect, $_POST['reason']);
    if ($reason === "others") {
        $reason = mysqli_real_escape_string($connect, $_POST['others']);
    }
    $to = mysqli_real_escape_string($connect, $_POST['to']);
    $to = date('Y-m-d', strtotime($to));

    $insert_stmt = "INSERT INTO `leave_req` (`user_id`, `employee`, `department`,
		`position`, `date_hired`, `date_filed`, `reason`, `contact_address`, `contact_number`, `from`, `to`)
		VALUES ('$user_id', '$employee', '$department', '$position', '$date_hired', '$date_filed', '$reason', '$contact_address',
		'$contact_number', '$from', '$to') ;";
    $connect->query($insert_stmt);
?>
