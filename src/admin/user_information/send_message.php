<?php
    include '../../utilities/db.php';
    $connect = Connect();

    $user_id = $_POST["user_id"];
    $subject = $_POST["subject"];
    $body = $_POST["body"];

    $sql = "INSERT into notification (`user_id`, `subject`, `date`, `message`, `status`) VALUES('$user_id', '$subject', NOW(), '$body', 'new');";
    $connect->query($sql);

    header("location: user_information.php");