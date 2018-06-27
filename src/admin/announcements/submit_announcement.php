<?php
ini_set('post_max_size', '64M');
ini_set('upload_max_filesize', '64M');
    include '../../utilities/db.php';
    $connect = Connect();

      $subject = $_POST["subject"];
      $date = $_POST["date"];
      $body = $_POST["body"];
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
        if(!is_uploaded_file($_FILES['image']['tmp_name'])) {

            $sql = "INSERT into `announcement` (`subject`, `announcement`, `date`, `departments`,) VALUES ('$subject', '$body', '$date', '$department');";
            $connect->query($sql);
            $get_latest_announcement = "select max(announcement_id) as id from announcement;";
            $result = $connect->query($get_latest_announcement);
            $results = $result->fetch_assoc();
            $announcement_id = $results['id'];

                for($x = 0; $x< count($file_names); $x++){
                    if(!empty($file_tmp_names[$x])){
                        move_uploaded_file($file_tmp_names[$x], $file_paths[$x]);
                        $temp_file = base64_encode(file_get_contents("file uploads/".$file_names[$x]));
                        $add_attachment = "Insert into announcement_attachments (`attachment`,`attachment_name`, `announcement_id`) values ('$temp_file','$file_names[$x]','$announcement_id');";
                        $connect->query($add_attachment);
                        echo "
                            <script>
                            alert('Announcement with attachment, successfully sent.');
                            window.location='announcement.php';
                            </script>";
                    }else{
                        $add_attachment = "Insert into announcement_attachments (`announcement_id`) values ('$announcement_id');";
                        $connect->query($add_attachment);
                        echo "
                            <script>
                            alert('Announcement without attachment, successfully sent.');
                            window.location='announcement.php';
                            </script>";
                    }
                    
                }

        }else{

            $image = base64_encode(file_get_contents($_FILES['image']['tmp_name']));
            $image_name = $_FILES['image']['name'];
            $sql = "INSERT into `announcement` (`subject`, `announcement`, `image`,`image_name`, `date`, `departments`) VALUES ('$subject', '$body', '$image', '$image_name' ,'$date', '$department');";
            $connect->query($sql);
            $get_latest_announcement = "select max(announcement_id) as id from announcement;";
            $result = $connect->query($get_latest_announcement);
            $results = $result->fetch_assoc();
            $announcement_id = $results['id'];

                for($x = 0; $x< count($file_names); $x++){
                    move_uploaded_file($file_tmp_names[$x], $file_paths[$x]);
                    $temp_file = base64_encode(file_get_contents('file uploads/'.$file_names[$x]));
                    $add_attachment = "Insert into announcement_attachments (`attachment`, `attachment_name`,`announcement_id`) values ('$temp_file','$file_names[$x]','$announcement_id');";
                    $connect->query($add_attachment);
                }

                echo "
                    <script>
                    alert('Announcement successfully sent and will be announced on the specified date.');
                    window.location='announcement.php';
                    </script>";
          }     
    }
