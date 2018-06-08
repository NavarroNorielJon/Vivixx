<?php
  include '../Utilities/db.php';
  $connect = Connect();
  $fname_asc = $_POST["fname_asc"];
  //$fname_desc = $_POST["fname_desc"];
  //$lname_asc = $_POST["lname_asc"];
  //$lname_desc = $_POST["lname_desc"];
  //$status = $_POST["status"];

    $sql = "select * from user_info order by first_name asc";
    $res = mysqli_query($connect, $sql);
    $row = mysqli_fetch_array($res, MYSQLI_ASSOC);
    $count = mysqli_num_rows($results);
    echo "
    <tr>
    <td>" . ucwords($row["first_name"]) . "</td>
    <td>" . ucwords($row["last_name"]) . "</td>";
 ?>
