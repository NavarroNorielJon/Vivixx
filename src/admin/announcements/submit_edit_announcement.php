<?php
ini_set('post_max_size', '64M');
ini_set('upload_max_filesize', '64M');
    include '../../utilities/db.php';
    $connect = Connect();
	
    $subject = $_POST["subject"];
    $startdate = $_POST["start_date"];
    $enddate = $_POST["end_date"];
    $body = mysqli_real_escape_string($connect,$_POST["body"]);
    $announcement_id=$_POST["id"];
    $department = $_POST["department"];
      
    $file_names = [];
    $file_paths = [];
    $file_tmp_names = [];
    $file_err_nos = [];
    $concat = "";
    $file_name = "";

    foreach($department as $dept ){
        $concat .= $dept . ",";
    }
    if(isset($_POST["edit"])){
        foreach($_FILES['file']['name'] as $child) {
            $file_names[] = $child;
            $file_paths[] = 'file uploads/'.$child;
        }
        foreach($_FILES['file']['tmp_name'] as $child) {
            $file_tmp_names[] = $child;
        }
        foreach($_FILES['file']['error'] as $child) {
            $file_err_nos[] = $child;
        }
        foreach($_FILES['file']['name'] as $name){
            $file_name .= $name .",";
        }

        if($_POST["department"][0] == "none"){
            $sql = "UPDATE `announcement` SET `subject`='$subject', `announcement`='$body', `start_date`='$startdate',`end_date`='$enddate' where announcement_id='$announcement_id';";
            $connect->query($sql);
        }else{
            $sql = "UPDATE `announcement` SET `subject`='$subject', `announcement`='$body', `start_date`='$startdate',`end_date`='$enddate', `departments`='$concat' where announcement_id='$announcement_id';";
            $connect->query($sql);
        }

        for($x = 0; $x< count($file_names); $x++){
            if($_POST["attachment"] != ""){
                move_uploaded_file($file_tmp_names[$x], $file_paths[$x]);
                $temp_file = base64_encode(file_get_contents("file uploads/".$file_names[$x]));
                $add_attachment = "UPDATE announcement_attachments SET `attachment_name`= '$file_name', `attachment` = '$temp_file', `announcement_id` = '$announcement_id';";
                $connect->query($add_attachment);
                
            }else{
                move_uploaded_file($file_tmp_names[$x], $file_paths[$x]);
                $temp_file = base64_encode(file_get_contents("file uploads/".$file_names[$x]));
                $add_attachment = "Insert into announcement_attachments (`attachment_name`, `attachment`, `announcement_id`) values ('$name','$temp_file','$announcement_id');";
                $connect->query($add_attachment);
                header("location: announcement.php");
            }
            
        }       
    }
header("location: announcement.php");


