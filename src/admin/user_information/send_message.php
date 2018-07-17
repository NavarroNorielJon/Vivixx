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
<<<<<<< HEAD
<form id="send_message" action="../../mailing/send_message.php" method="post">
    <input type="hidden" name="subject" value="<?php echo $subject?>">
    <input type="hidden" name="date" value="<?php echo $date?>">
    <input type="hidden" name="body" value="<?php echo $body?>">
    <input type="hidden" name="email" value="<?php echo $email?>">
</form>
<script>
    $("#send_message").submit();
</script>
 //header("location: user_information.php");
=======
>>>>>>> 8459aa3e895d4849e1cf8c5283abdc36839a2c27
