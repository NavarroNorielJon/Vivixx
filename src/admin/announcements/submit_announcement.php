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

        $fileGetExt = explode(".", $fileName)[1];
        $fileExt = strtoLower($fileGetExt);
        if($fileError === 0){
            if($fileSize < 10000000){
                $path = 'file uploads/'. $fileName;
                move_uploaded_file($fileTemp, $path);
                header("location: ../index.php?successbaby");

            }else{
                echo "File is too big.";
            }

        }else{
            echo "There was an error in uploading your file, please try again.";
        }
    }

    $image = base64_encode(file_get_contents($_FILES['file']['tmp_name']));
    $file = base64_encode(file_get_contents($_FILES['image']['tmp_name']));
    $sql = "INSERT into `announcement` (`subject`, `announcement`,`image`, `attachment`, `date`) VALUES ('$subject', '$body', '$image','$file' ,'$date');";
    $connect->query($sql);