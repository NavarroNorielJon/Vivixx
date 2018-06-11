<table class="table" id="table">
  <thead>
    <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Gender</th>
        <th>Address</th>
        <th>Contact Number</th>
        <th>Email</th>
    </tr>
  </thead>
<?php
include '../Utilities/db.php';
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
        //print data in table
        echo "
        <tr>
        <td>" . ucwords($row['first_name']) . "</td>
        <td>" . ucwords($row['last_name']) . "</td>
        <td>" . $gender . "</td>
        <td>" . $row['residential_address'] . "</td>
        <td>" . $row['contact_number'] . "</td>
        <td>" . $row['email'] . "</td>
        </tr>";
    }

}else{
    echo "database has no query";
}
$connect-> close();
?>
</table>
