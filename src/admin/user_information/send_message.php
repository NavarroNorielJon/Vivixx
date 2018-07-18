<?php
    include '../../utilities/db.php';
    $connect = Connect();

    $user_id = $_POST["user_id"];
    $subject = $_POST["subject"];
    $body = $_POST["body"];
    $date = $_POST["date"];
    $email = $_POST["email"];

    $sql = "INSERT INTO notification (`user_id`, `subject`, `date`, `message`, `status`) VALUES ('$user_id', '$subject', NOW(), '$body', 'new');";
    mysqli_query($connect,$sql);
    header('Content-Type: application/json');
    echo json_encode(['subject'=>$subject, 'date'=>$date, 'email'=>$email , 'body'=>$body]);
?>
