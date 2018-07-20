<?php
    ini_set('post_max_size', '64M');
    ini_set('upload_max_filesize', '64M');
    include 'session.php';
    $connect = Connect();
    $sql = "SELECT first_name, middle_name, last_name, department, date_hired, employee_status, position FROM user_info NATURAL JOIN employee_info where user_id = '$user_id';";
    $result = mysqli_query($connect, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $employee = $row['first_name'] . "," . $row['middle_name'] . "," . $row['last_name'];
    $department = $row['department'];
    $date_hired = $row['date_hired'];
    $employee_status = $row['employee_status'];
    $position = $row['position'];
    if (!empty($_POST['type']) && !empty($_POST['to2']) && !empty($_POST['from2'])) {
        $reason = mysqli_real_escape_string($connect, $_POST['type']);
    } else {
        echo "Please complete all the necessary information";
        exit();
    }
    if ($reason === "others") {
        $reason = ucwords(mysqli_real_escape_string($connect, $_POST['reason']));
    } elseif ($reason === "Emergency" || $reason === "Sick Leave") {
        $reason .= "-" .ucwords(mysqli_real_escape_string($connect, $_POST['reason']));
        $from = mysqli_real_escape_string($connect, $_POST['from1']);
        $to = mysqli_real_escape_string($connect, $_POST['to1']);
    } elseif ($reason === ""){
        exit();
    } else {
        $from = mysqli_real_escape_string($connect, $_POST['from2']);
        $to = mysqli_real_escape_string($connect, $_POST['to2']);
    }

    if (!empty($_POST['attachment'])) {
        $attachment = "'".base64_encode(file_get_contents($_FILES['attachment']['tmp_name']))."'";
    } else {
        $attachment = 'NULL';
    }

	$contact_address = ucwords(mysqli_real_escape_string($connect, $_POST['contact_address']));
    $contact_number = mysqli_real_escape_string($connect, $_POST['contact_number']);

	$from = date('Y-m-d', strtotime($from));
    $to = date('Y-m-d', strtotime($to));
    $date_hired = date('Y-m-d', strtotime($date_hired));

    $insert_stmt = "INSERT INTO `leave_req` (`user_id`, `employee`, `department`,
		 `date_hired`, `date_filed`, `reason`, `contact_address`, `contact_number`, `from`, `to`,`attachment`)
		VALUES ('$user_id', '$employee', '$department', '$date_hired', NOW(), '$reason', '$contact_address',
		'$contact_number', '$from', '$to', $attachment) ;";
    $connect->query($insert_stmt);
    echo "Thank you for Requesting.";

?>
