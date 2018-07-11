<?php
include '../../utilities/db.php';
$connect = Connect();
$user_id = mysqli_real_escape_string($connect,$_POST["user_id"]);
$position = mysqli_real_escape_string($connect,$_POST["position"]);
$employee_status = mysqli_real_escape_string($connect,$_POST["employee_status"]);
$date = mysqli_real_escape_string($connect,$_POST["date"]);

$update = "UPDATE mis.employee_info SET date_hired = '$date', employee_status = '$employee_status' , position = '$position' where user_id = '$user_id'; ";
$result = $connect->query($update);

header("location: newly_registered.php");