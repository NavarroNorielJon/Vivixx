<?php
    include '../utilities/db.php';
    $connect = Connect();
    $subject = $_POST["subject"];
    $date = $_POST["date"];
    $body = $_POST["body"];

    $sql = "INSERT into `announcement` (`subject`, `announcement`, `date`) VALUES ('$subject', 
            '$body', '$date');";
    if($connect->query($sql) === true){
        
    } else{
        print_r($connect->error);
    }
