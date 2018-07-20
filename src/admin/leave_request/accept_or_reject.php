<?php

    include '../../utilities/session.php';
    $connect = Connect();
    date_default_timezone_set('Asia/Manila');
    $req_id = mysqli_real_escape_string($connect,$_POST["req_id"]);
    $user_id = mysqli_real_escape_string($connect,$_POST["user_id"]);
    $email = mysqli_real_escape_string($connect,$_POST["email"]);
    $used = mysqli_real_escape_string($connect,$_POST["used"]);
    $remaining = mysqli_real_escape_string($connect,$_POST["remaining"]);
    $update = "";
    $subject = "Leave Request";
    $body = "";
    if(isset($_POST["accept"])){
        if($remaining  > 0 && $remaining <= 5){
            --$remaining;
            ++$used;
            $body .= "Your Request has been Approved by the admin";
            $update = "UPDATE `leave_req` SET `status`='accepted' WHERE `leave_req_id`='$req_id';";
            $update1 = "UPDATE `employee_info` SET `credits`='$remaining', `used`='$used' WHERE `user_id`='$user_id';";
            $update2 = "INSERT INTO notification (`user_id`, `subject`, `date`, `message`, `status`) VALUES ('$user_id', '$subject', NOW(), '$body', 'new');";
            $connect->query($update1);
            $connect->query($update2);
            $status = "accepted";
            $stat = "Accepted";

        }else{
            echo  "User has no more remaining leave credits";
            exit();
        }
        //header("location:leave_requests.php?accepted");
    }else if(isset($_POST["reject"])){
        $update = "UPDATE `leave_req` SET `status`='rejected' WHERE `leave_req_id`='$req_id';";
        $body .= "Your Request has been Disapproved by the admin";
        $update2 = "INSERT INTO notification (`user_id`, `subject`, `date`, `message`, `status`) VALUES ('$user_id', '$subject', NOW(), '$body', 'new');";
        $connect->query($update2);
        $status="rejected";
        $stat = "Rejected";

        //header("location:leave_requests.php?rejected");
    }else{
        $stat = "Error in updating status";
        exit();
    }
    $connect->query($update);
    // exit();
    header('Content-Type: application/json');
    echo json_encode(['stat'=>$stat, 'status'=>$status, 'email'=>$email]);
?>
