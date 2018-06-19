<?php
    include 'session.php';
    include 'check_session.php';
    $connect = Connect();


    $employee = $first_name . "," . $middle_name . "," . $last_name;
    $department = mysqli_real_escape_string($connect, $_POST['department']);
    $position = mysqli_real_escape_string($connect, $_POST['position']);
    $date_hired  = mysqli_real_escape_string($connect, $_POST['date_hired']);
    $date_filed  = mysqli_real_escape_string($connect, $_POST['date_filed']);
    $reason = mysqli_real_escape_string($connect, $_POST['reason']);
    $contact_address = mysqli_real_escape_string($connect, $_POST['contact_address']);
    $contact_number = mysqli_real_escape_string($connect, $_POST['contact_number']);
    $from = mysqli_real_escape_string($connect, $_POST['from']);
    $to = mysqli_real_escape_string($connect, $_POST['to']);

    $date_hired = date('Y-m-d', strtotime($date_hired));
    $date_filed = date('Y-m-d', strtotime($date_filed));
    $from = date('Y-m-d', strtotime($from));
    $to = date('Y-m-d', strtotime($to));


    $insert_stmt = "INSERT INTO `leave_req` ( `leave_req_id`,`user_id`, `employee`, `department`,
                `position`, `date_hired`, `date_filed`, `reason`, `contact_address`, `contact_number`, `from`, `to`)
                 VALUES ('null','$user_id', '$employee', '$department', '$position', '$date_hired', '$date_filed', '$reason', '$contact_address',
                 '$contact_number', '$from', '$to') ;";
    if ($connect->query($insert_stmt) === true) {
        echo "  <script>
                alert('Please wait for the response of the admin');
                window.location = '../pages/leave_request_form';
                </script>

        ";
        exit;
    } else {
        echo "  <script>
                alert('Error');
                window.location = '../pages/leave_request_form';
                </script>

        ";
        exit;
    }
?>
