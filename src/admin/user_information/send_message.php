<script src="../../script/jquery.min.js"></script>
<?php
    include '../../utilities/db.php';
    $connect = Connect();

    $user_id = $_POST["user_id"];
    $subject = $_POST["subject"];
    $body = $_POST["body"];
    $date = $_POST["date"];
    $email = $_POST["email"];

    $sql = "INSERT into notification (`user_id`, `subject`, `date`, `message`, `status`) VALUES('$user_id', '$subject', NOW(), '$body', 'new');";
    $connect->query($sql);
?>
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