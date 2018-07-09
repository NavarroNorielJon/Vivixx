<?php
    include 'db.php';
    $connect = Connect();
    $id = $_GET['id'];
    $query = "SELECT * FROM announcement_attachments natural join announcement where CURDATE()>=start_date and CURDATE() <= end_date and departments like('%".$department."%') or departments = 'All' and announcement_id='$id' group by 1;";
    $result = mysqli_query($connect, $query);
    $row = mysqli_fetch_assoc($result, MYSQLI_ASSOC);
    echo $row['announcement'];
 ?>
