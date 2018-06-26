<?php
include '../../utilities/session.php';
$connect = Connect();
$req_id=$_POST["req_id"];
$update = "";

if(isset($_POST["accept"])){
    $update = "UPDATE `mis`.`leave_req` SET `status`='accepted' WHERE `leave_req_id`='$req_id';";
    header("location:leave_requests.php?accepted");
}else{
    echo "
        <script>
            alert('Error in updating status');
        </script>
    ";
}
if(isset($_POST["reject"])){
    $update = "UPDATE `mis`.`leave_req` SET `status`='rejected' WHERE `leave_req_id`='$req_id';";
    header("location:leave_requests.php?rejected");
}else{
    echo "
        <script>
            alert('Error in updating status');
        </script>
    ";
}
$result = $connect->query($update);