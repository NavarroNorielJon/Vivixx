<?php
    include '../../utilities/db.php';
    $connect = Connect();
    $subject = $_POST["subject"];
    $date = $_POST["date"];
    $body = $_POST["body"];

    if(isset($_POST["submit"])){
        $file = $_FILES["file"];
        $fileName = $file["name"];
        $fileType = $file["type"];
        $fileSize = $file["size"];
        $fileTemp = $file["tmp_name"];
        $fileError = $file["error"];

        $fileGetExt = explode(".", $fileName)[1];
        $fileExt = strtoLower($fileGetExt);
        if($fileError === 0){
            if($fileSize < 10000000){
                $path = 'file uploads/'. $fileName;
                move_uploaded_file($fileTemp, $path);

                $file = base64_encode(file_get_contents($_FILES['file']['tmp_name']));
                $image = base64_encode(file_get_contents($_FILES['image']['tmp_name']));
                $sql = "INSERT into `announcement` (`subject`, `announcement`, `image` ,`attachment`, `date`) VALUES ('$subject', '$body', '$image' ,'$file' ,'$date');";
                $connect->query($sql);
                header("location: ../index.php");

            }else{
                echo "
                    <script>
                        alert('The attachment you have uploaded is too big');
                    </script>
                ";
            }

        }else{
            echo "There was an error in uploading the attachment, please try again.";
        }
    }