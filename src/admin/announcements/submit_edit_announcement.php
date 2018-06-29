<?php
ini_set('post_max_size', '64M');
ini_set('upload_max_filesize', '64M');
    include '../../utilities/db.php';
    $connect = Connect();
	
    $subject = $_POST["subject"];
    $startdate = $_POST["start_date"];
    $enddate = $_POST["end_date"];
    $body = mysqli_real_escape_string($connect,$_POST["body"]);
    $department = $_POST["department"];
    $announcement_id=$_POST["announcement_id"];
      
    $file_names = [];
    $file_paths = [];
    $file_tmp_names = [];
    $file_err_nos = [];
    
    if(isset($_POST["edit"])){
        if(isset($_FILES["file"])){
            foreach($_FILES['file']['name'] as $child) {
                $file_names[] = $child;
                $file_paths[] = 'file uploads/'.$child;
                echo $child;
            }
            foreach($_FILES['file']['tmp_name'] as $child) {
                $file_tmp_names[] = $child;
                echo $child;
            }
            foreach($_FILES['file']['error'] as $child) {
                $file_err_nos[] = $child;
                echo $child;
            }

            $sql = "UPDATE `announcement` SET `subject`='$subject', `announcement`='$body', `start_date`='$startdate',`end_date`='end_date' `departments`='$department' where announcement_id='$announcement_id';";
            $connect->query($sql);

            for($x = 0; $x< count($file_names); $x++){
                echo $file_tmp_names[$x];
               // move_uploaded_file($file_tmp_names[$x], $file_paths[$x]);
                $temp_file = base64_encode(file_get_contents($file_names[$x]));
                $add_attachment = "UPDATE announcement_attachments SET `attachment`='$temp_file',`attachment_name`='$file_names[$x]', `announcement_id`='$announcement_id';";
                $connect->query($add_attachment);
                echo "
                    <script>
                    alert('Announcement with attachment, successfully sent.');
                    window.location='announcement.php';
                    </script>";
            }
        }else{
            
        //if there is no image
            $sql = "UPDATE `announcement` SET `subject`='$subject', `announcement`='$body', `date`='$date', `departments`='$department' where announcement_id='$announcement_id';";
            $connect->query($sql);
                echo "
                    <script>
                    alert('Announcement without attachment, successfully sent.');
                    window.location='announcement.php';
                    </script>"; 
        }
               
    }
