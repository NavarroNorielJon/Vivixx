<?php
    include 'session.php';
    include 'check_session.php';
    $connect = Connect();

    $employee = $first_name . "," . $middle_name . "," . $last_name;
    $department = mysqli_real_escape_string($connect, $_POST['department']);
    if ($department === "a") {
        $department = "Administration";
        $position = mysqli_real_escape_string($connect, $_POST['admin']);
    } elseif ($department === "ash") {
        $department = "Administration Support / HR";
        $position = mysqli_real_escape_string($connect, $_POST['adminsp']);
    } elseif ($department === "its") {
        $department = "IT Support";
        $position = mysqli_real_escape_string($connect, $_POST['itsupport']);
    } elseif ($department === "nva") {
        $department = "Non-Voice Account";
        $position = mysqli_real_escape_string($connect, $_POST['nonvoice']);
    } elseif ($department === "pe") {
        $department = "Phone ESL";
        $position = mysqli_real_escape_string($connect, $_POST['phone']);
    } elseif ($department === "ve") {
        $department = "Video ESL";
        $position = mysqli_real_escape_string($connect, $_POST['video']);
    } elseif ($department === "va") {
        $department = "Voice Account";
        $position = mysqli_real_escape_string($connect, $_POST['voice']);
    }

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
		`position`, `date_hired`, `date_filed`, `reason`, `contact_address`, `contact_number`, `from`, `to`)
		VALUES ('$user_id', '$employee', '$department', '$position', '$date_hired', '$date_filed', '$reason', '$contact_address',
		'$contact_number', '$from', '$to') ;";
    $connect->query($insert_stmt);
?>
