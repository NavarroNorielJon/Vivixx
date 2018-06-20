<?php
    include '../utilities/db.php';
    $connect = Connect();
    $subject = $_POST["subject"];
    $date = $_POST["date"];
    $body = $_POST["body"];

    if(isset($_POST["file"])){
        $file = $_FILES["file"];
        $fileName = $file["name"];
        $fileType = $file["type"];
        $fileSize = $file["size"];
        $fileTemp = $file["tmp_name"];
        $fileError = $file["error"];

        $fileGetExt = explode(".", $fileName);
        $fileExt = strtoLower(end($fileGetEXt));

        if($fileError === 0){
            if($fileSize < 1000){
                $fileNewName = uniqid('', true). "." . $fileExt;
                $path = 'file uploads/'. $fileNewName;
                move_uploaded_file($fileTemp, $path);
                
                $fileDbase = base64_encode($file$fileType);
                $sql = "INSERT into `announcement` (`subject`, `announcement`, `date`) VALUES ('$subject', '$body', '$date');";

            }else{
                echo "File is too big.";
            }

        }else{
            echo "There was an error in uploading your file, please try again.";
        }
    }

    $file = base64_encode(file_get_contents($_FILES['image']['tmp_name']));
    $sql = "INSERT into `announcement` (`subject`, `announcement`, `date`) VALUES ('$subject', '$body', '$date');";
    $connect->query($sql);