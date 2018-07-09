<?php
    include 'db.php';
    $connect = Connect();

    $query = "SELECT * FROM announcement_attachments natural join announcement where CURDATE()>=start_date and CURDATE() <= end_date and departments like('%".$department."%') or departments = 'All' group by 1;";
    $result = mysqli_query($connect, $query);

 ?>
