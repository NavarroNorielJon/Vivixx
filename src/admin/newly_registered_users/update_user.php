<?php
include '../../utilities/db.php';
$connect = Connect();
$user_id = $_POST["user_id"];
$position = $_POST["position"];
$employee_status = $_POST["employee_status"];
$date = $_POST["date"];

$update = "UPDATE mis.employee_info SET date_hired = '$date', employee_status = '$employee_status' , position = '$position' where user_id = '$user_id'; ";
$result = $connect->query($update);
?>