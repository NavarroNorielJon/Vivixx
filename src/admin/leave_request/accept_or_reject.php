<?php

    include '../../utilities/session.php';
    $connect = Connect();
    date_default_timezone_set('Asia/Manila');
    $req_id = mysqli_real_escape_string($connect,$_POST["req_id"]);
    $email = mysqli_real_escape_string($connect,$_POST["email"]);
    $used = mysqli_real_escape_string($connect,$_POST["used"]);
    $remaining = mysqli_real_escape_string($connect,$_POST["remaining"]);
    $position = mysqli_real_escape_string($connect,$_POST["position"]);
    $date_hired = mysqli_real_escape_string($connect,$_POST["dateHired"]);
    $update = "";
    $date = date('Y');
    if($date != ){

    }
    echo date('Y',strtotime($date. '+1 years'));
    if(isset($_POST["accept"])){
        if($remaining  > 0 && $remaining <= 5){
            $remaining--;
            $used++;
            $update = "UPDATE `mis`.`leave_req` SET `status`='accepted',`remaining`='$remaining', `used`='$used', `position` = '$position', `date_hired` = '$date_hired' WHERE `leave_req_id`='$req_id';";
            $status = "accepted";
            $stat = "Accepted";

        }else{
            $stat = "User has no more remaining leave credits";
            exit();
        }
        //header("location:leave_requests.php?accepted");
    }else if(isset($_POST["reject"])){
        $update = "UPDATE `mis`.`leave_req` SET `status`='rejected', `position` = '$position', `date_hired` = '$date_hired' WHERE `leave_req_id`='$req_id';";
        $status="rejected";
        $stat = "Rejected";

        //header("location:leave_requests.php?rejected");
    }else{
        $stat = "Error in updating status";
        exit();
    }
    $result = $connect->query($update);
    // exit();
    header('Content-Type: application/json');
    echo json_encode(['stat'=>$stat, 'status'=>$status, 'email'=>$email]);
?>
