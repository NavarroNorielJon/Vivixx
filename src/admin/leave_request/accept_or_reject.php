<script src="../../script/jquery.min.js"></script>
<?php
include '../../utilities/session.php';
$connect = Connect();
$req_id=$_POST["req_id"];
$email=$_POST["email"];
$update = "";

if(isset($_POST["accept"])){
    $update = "UPDATE `mis`.`leave_req` SET `status`='accepted' WHERE `leave_req_id`='$req_id';";
    $status = "accepted";
    //header("location:leave_requests.php?accepted");
}else if(isset($_POST["reject"])){
    $update = "UPDATE `mis`.`leave_req` SET `status`='rejected' WHERE `leave_req_id`='$req_id';";
    $status="rejected";
    //header("location:leave_requests.php?rejected");
}else{
    echo "
        <script>
            alert('Error in updating statudfasdsfss');
        </script>
    ";
}
$result = $connect->query($update);

?>
<form id="status" action="../../mailing/accept_or_reject.php" method="post">
    <input type="hidden" name="status" value="<?php echo $status; ?>">
    <input type="hidden" name="email" value="<?php echo $email; ?>">
</form>

<script>
    $("#status").submit();
</script>