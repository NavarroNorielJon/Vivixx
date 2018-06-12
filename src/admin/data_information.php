<!DOCTYPE html>
<table class="table" id="table">
  <thead>
    <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Gender</th>
        <th>Address</th>
        <th>Contact Number</th>
        <th>Email</th>
        <th>Show more data</th>
    </tr>
  </thead>
<?php
include '../Utilities/db.php';
include 'show_all.php';
$connect = Connect();

$sql = "select * from user_info natural join user;";
$result = $connect->query($sql);

if($result-> num_rows > 0){
    while($row = $result->fetch_assoc()){
        if($row["gender"] === "m"){
            $gender = "Male";
        }else{
            $gender = "Female";
        }

        $show = "
        <input name='show' value='show' style='display: none;'>
        <a href='#!' data-toggle='modal' data-target='#1st'><button class='btn btn-warning' type='submit' value='show'>Show more</a>";
        //print data in table
        echo "
        <form action='show_all' method='POST'>
        <tr>
        <td>" . ucwords($row['first_name']) . "</td>
        <td>" . ucwords($row['last_name']) . "</td>
        <td>" . $gender . "</td>
        <td>" . $row['residential_address'] . "</td>
        <td>" . $row['contact_number'] . "</td>
        <td>" . $row['email'] . "</td>
        <td>" . $show ."</td>
        </form>
        </tr>";
    }

}else{
    echo "database has no query";
}
$connect-> close();
?>
</table>
