<?php
ini_set('post_max_size', '64M');
ini_set('upload_max_filesize', '64M');
include '../../utilities/db.php';
$connect = Connect();

    $subject = mysqli_real_escape_string($connect,$_POST["subject"]);
    $startdate = mysqli_real_escape_string($connect,$_POST["start_date"]);
    $enddate = mysqli_real_escape_string($connect,$_POST["end_date"]);
    $body = mysqli_real_escape_string($connect,$_POST["body"]);
    $announcement_id = mysqli_real_escape_string($connect,$_POST["id"]);
    $status =  $_POST["status"];
    $department = $_POST["department"];
    
    $file_names = [];
    $file_paths = [];
    $file_tmp_names = [];
    $file_err_nos = [];
    $concat = "";
    $file_name = "";
    $counter = 0;

    foreach($department as $dept ){
        $counter++;
        if($counter == count($department)){
            $concat .= $dept;
        }else{
            $concat .= $dept . ",";
        }
    }
    $counter = 0;
    if(isset($_POST["edit"])){
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
        $counter = 0;

        if($_POST["department"][0] == "none"){
            $sql = "UPDATE `announcement` SET `subject`='$subject', `announcement`='$body', `start_date`='$startdate',`end_date`='$enddate', `status`='$status' where announcement_id='$announcement_id';";
            $connect->query($sql);
        }else{
            $sql = "UPDATE `announcement` SET `subject`='$subject', `announcement`='$body', `start_date`='$startdate',`end_date`='$enddate', `departments`='$concat', `status`='$status' where announcement_id='$announcement_id';";
            $connect->query($sql);
        }
        for($x = 0; $x< count($file_names); $x++){

            if($_POST["attachment"] != "" && $file_names[$x] != ""){
                move_uploaded_file($file_tmp_names[$x], $file_paths[$x]);
                $temp_file = base64_encode(file_get_contents("files/".$file_names[$x]));
                $add_attachment = "UPDATE announcement_attachments SET `attachment_name`= '$file_name', `attachment` = '$temp_file', `announcement_id` = '$announcement_id';";
                $connect->query($add_attachment);
            }else if($file_names[$x] != "" && $_POST["attachment"] == ""){
                move_uploaded_file($file_tmp_names[$x], $file_paths[$x]);
                $temp_file = base64_encode(file_get_contents("files/".$file_names[$x]));
                $add_attachment = "INSERT into announcement_attachments SET(`attachment_name`, `attachment`, `announcement_id`) values ('$file_name','$temp_file','$announcement_id');";
                $connect->query($add_attachment);
            }else{
                //header("location: announcement.php");
            }

        }
        print_r($add_attachment);
    }
    
//header("location: announcement.php");
