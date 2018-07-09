<?php
    include 'db.php';
    $connect = Connect();
    $id = $_GET['id'];
    $query = "SELECT * FROM announcement_attachments natural join announcement where announcement_id='$id' group by 1;";
    $result = mysqli_query($connect, $query);
    $row = mysqli_fetch_array($result);
    header('Content-Type: application/json');
    echo json_encode(['title'=>$row['subject'],'announcement'=>$row['announcement']]);
 ?>
