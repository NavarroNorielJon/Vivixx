<?php
ini_set('post_max_size', '64M');
ini_set('upload_max_filesize', '64M');
include '../../utilities/db.php';
$connect = Connect();

    $subject = ucwords(mysqli_real_escape_string($connect,$_POST["subject"]));
    $body = mysqli_real_escape_string($connect,$_POST["body"]);
    $option = mysqli_real_escape_string($connect,$_POST["calendar"]);
    $status =  $_POST["status"];
    $department = $_POST["department"];
    $file_names = [];
    $file_paths = [];
    $file_tmp_names = [];
    $file_err_nos = [];
    $concat = "";
    $file_name = "";
    $counter = 0;

    foreach($department as $dept){
        $counter++;
        if($counter == count($department)){
            $concat .= ucwords($dept);
        }else{
            $concat .= ucwords($dept) . ",";
        }
    }
    $counter = 0;
    if(isset($_POST["submit"])){
        if (!empty($_FILES['file']['name'])) {
            foreach($_FILES['file']['name'] as $child) {
                $file_names[] = $child;
                $file_paths[] = 'files/'.$child;
            }
            foreach($_FILES['file']['tmp_name'] as $child) {
                $file_tmp_names[] = $child;
            }
            foreach($_FILES['file']['error'] as $child) {
                $file_err_nos[] = $child;
            }
            foreach($_FILES['file']['name'] as $name){
                $counter++;
                if($counter == count($_FILES['file']['name'])){
                    $file_name .= $name;
                }else{
                    $file_name .= $name .",";
                }
            }

            if($option == "open"){
                $startdate = mysqli_real_escape_string($connect,$_POST["start_date"]);
                $enddate = mysqli_real_escape_string($connect,$_POST["end_date"]);
            }else if($option == "duration" && $_POST["duration"] === "day"){
                $startdate = date("Y-m-d");
                $num = mysqli_real_escape_string($connect,$_POST["num"]);
                $enddate = date("Y-m-d", strtotime( "+ $num days" .$startdate));
            }else if($option == "duration" && $_POST["duration"] === "week"){
                $startdate = date("Y-m-d");
                $num = mysqli_real_escape_string($connect,$_POST["num"]);
                $enddate = date("Y-m-d", strtotime( "+ $num week" .$startdate));
            }else if($option == "duration" && $_POST["duration"] === "month"){
                $startdate = date("Y-m-d");
                $num = mysqli_real_escape_string($connect,$_POST["num"]);
                $enddate = date("Y-m-d", strtotime( "+ $num month" .$startdate));
            }else{
                $startdate = date("Y-m-d");
                $num = mysqli_real_escape_string($connect,$_POST["num"]);
                $enddate = date("Y-m-d", strtotime( "+ $num year" .$startdate));
            }
            $counter = 0;
                $sql = "INSERT into `announcement` (`subject`, `announcement`, `start_date`, `end_date`, `departments`, `status`) VALUES ('$subject', '$body', '$startdate', '$enddate', '$concat','$status');";
                $connect->query($sql);
                $get_latest_announcement = "select max(announcement_id) as id from announcement;";
                $result = $connect->query($get_latest_announcement);
                $results = $result->fetch_assoc();
                $announcement_id = $results['id'];
                for($x = 0; $x< count($file_names); $x++){
                    if(!empty($file_tmp_names[$x])){
                        move_uploaded_file($file_tmp_names[$x], $file_paths[$x]);
                        $temp_file = base64_encode(file_get_contents("files/".$file_names[$x]));
                        $add_attachment = "INSERT INTO announcement_attachments (`attachment_name`, `attachment`, `announcement_id`) VALUES ('$file_name','$temp_file','$announcement_id');";
                        $connect->query($add_attachment);
                    }else{
                        $add_attachment = "INSERT INTO announcement_attachments (`attachment_name`, `attachment`, `announcement_id`) VALUES (NULL,NULL,'$announcement_id');";
                        $connect->query($add_attachment);
                }
            }
        } else {

                    if($option == "open"){
                        $startdate = mysqli_real_escape_string($connect,$_POST["start_date"]);
                        $enddate = mysqli_real_escape_string($connect,$_POST["end_date"]);
                    }else if($option == "duration" && $_POST["duration"] === "day"){
                        $startdate = date("Y-m-d");
                        $num = mysqli_real_escape_string($connect,$_POST["num"]);
                        $enddate = date("Y-m-d", strtotime( "+ $num days" .$startdate));
                    }else if($option == "duration" && $_POST["duration"] === "week"){
                        $startdate = date("Y-m-d");
                        $num = mysqli_real_escape_string($connect,$_POST["num"]);
                        $enddate = date("Y-m-d", strtotime( "+ $num week" .$startdate));
                    }else if($option == "duration" && $_POST["duration"] === "month"){
                        $startdate = date("Y-m-d");
                        $num = mysqli_real_escape_string($connect,$_POST["num"]);
                        $enddate = date("Y-m-d", strtotime( "+ $num month" .$startdate));
                    }else{
                        $startdate = date("Y-m-d");
                        $num = mysqli_real_escape_string($connect,$_POST["num"]);
                        $enddate = date("Y-m-d", strtotime( "+ $num year" .$startdate));
                    }
                    $counter = 0;
                        $sql = "INSERT into `announcement` (`subject`, `announcement`, `start_date`, `end_date`, `departments`, `status`) VALUES ('$subject', '$body', '$startdate', '$enddate', '$concat','$status');";
                        $connect->query($sql);
                        $get_latest_announcement = "select max(announcement_id) as id from announcement;";
                        $result = $connect->query($get_latest_announcement);
                        $results = $result->fetch_assoc();
                        $announcement_id = $results['id'];
                        $add_attachment = "INSERT INTO announcement_attachments (`attachment_name`, `attachment`, `announcement_id`) VALUES (NULL,NULL,'$announcement_id');";
                        $connect->query($add_attachment);
        }
    }
header("location: announcement.php");
