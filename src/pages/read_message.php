<?php
    include '../utilities/db.php';
    $connect = Connect();
    $msg_id = $_POST['msg_id'];

    $sql = "UPDATE notification SET status='read' where id_notification = '$msg_id';";
    $result = $connect->query($sql);
?>