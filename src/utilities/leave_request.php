<?php
    include 'session.php';
    include 'check_session.php';
    $connect = Connect();
    $sql = "SELECT department FROM employee_info where user_id = '$user_id'";
    $result = $connect->query($sql);
    $department = $result->fetch_assoc()['department'];
    $employee = $first_name . "," . $middle_name . "," . $last_name;
    $date_filed  = mysqli_real_escape_string($connect, $_POST['date_filed']);
    $date_hired  = mysqli_real_escape_string($connect, $_POST['date_hired']);
    $reason = mysqli_real_escape_string($connect, $_POST['reason']);
    if ($reason === "others") {
        $reason = mysqli_real_escape_string($connect, $_POST['others']);
    }
	$contact_address = mysqli_real_escape_string($connect, $_POST['contact_address']);
    $contact_number = mysqli_real_escape_string($connect, $_POST['contact_number']);
    $from = mysqli_real_escape_string($connect, $_POST['from']);
    $to = mysqli_real_escape_string($connect, $_POST['to']);
	$from = date('Y-m-d', strtotime($from));
    $to = date('Y-m-d', strtotime($to));
    $date_filed = date('Y-m-d', strtotime($date_filed));
    $date_hired = date('Y-m-d', strtotime($date_hired));

    $insert_stmt = "INSERT INTO `leave_req` (`user_id`, `employee`, `department`,
		 `date_hired`, `date_filed`, `reason`, `contact_address`, `contact_number`, `from`, `to`)
		VALUES ('$user_id', '$employee', '$department', '$date_hired', '$date_filed', '$reason', '$contact_address',
		'$contact_number', '$from', '$to') ;";
    $connect->query($insert_stmt);

?>
