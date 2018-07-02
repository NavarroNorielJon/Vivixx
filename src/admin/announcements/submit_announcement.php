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

      $file_names = [];
      $file_paths = [];
      $file_tmp_names = [];
      $file_err_nos = [];
    if(isset($_POST["submit"])){
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
        //if there is no image

            $sql = "INSERT into `announcement` (`subject`, `announcement`, `start_date`, `end_date`, `departments`) VALUES ('$subject', '$body', '$startdate', '$enddate', '$department');";
            $connect->query($sql);
            $get_latest_announcement = "select max(announcement_id) as id from announcement;";
            $result = $connect->query($get_latest_announcement);
            $results = $result->fetch_assoc();
            $announcement_id = $results['id'];

            for($x = 0; $x< count($file_names); $x++){
                if(!empty($file_tmp_names[$x])){
                    move_uploaded_file($file_tmp_names[$x], $file_paths[$x]);
                    $temp_file = base64_encode(file_get_contents("file uploads/".$file_names[$x]));
                    $add_attachment = "Insert into announcement_attachments (`attachment_name`, `attachment`, `announcement_id`) values ('$file_names[$x]','$temp_file','$announcement_id');";
                    $connect->query($add_attachment);

                }else{
                    $add_attachment = "Insert into announcement_attachments (`announcement_id`) values ('$announcement_id');";
                    $connect->query($add_attachment);

                }
                
            }
               
    }

    echo "
    <script>
        alert('Announcement has been successful.');
    </script>
    ";