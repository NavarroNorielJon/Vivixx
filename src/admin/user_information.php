<?php
  include 'header.php';
  include 'dropdown_user_information.php';
 ?>

<!DOCTYPE html>
<html>
    <head>
        <title>Table</title>
        <script type="text/javascript" src="../script/jquery.min.js"></script>
        <link rel="stylesheet" href="../style/bootstrap/bootstrap.min.css">
        <link type="text/css" rel="stylesheet" href="../style/style.css" media="screen, projection">
        <script type="text/javascript" src="../script/popper.min.js"></script>
        <script type="text/javascript" src="../script/bootstrap/bootstrap.min.js"></script>
    </head>
    <body>
        <table class="table">
          <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Gender</th>
                <th>Birth Date</th>
                <th>Address</th>
                <th>Contact Number</th>
                <th>Email</th>
            </tr>
          </thead>

            <?php
            include '../Utilities/db.php';
            $connect = Connect();

            $sql = "select * from user_info natural join user;";


            //sorting
            if(isset($_POST["asc"])){
              $sql = "select * from user natural join user_info order by first_name asc;";
            }else if(isset($_POST["desc"])){
              $sql = "select * from user natural join user_info order by first_name desc;";
            }else if(isset($_POST["last_asc"])){
              $sql = "select * from user natural join user_info order by last_name asc;";
            }else if(isset($_POST["last_desc"])){
              $sql = "select * from user natural join user_info order by last_name desc;";
            }else if(isset($_POST["male"])){
              $sql = "select * from user natural join user_info order by gender asc;";
            }else if(isset($_POST["female"])){
              $sql = "select * from user natural join user_info order by gender desc;";
            }else{
              $sql = "select * from user natural join user_info;";
            }
            $result = $connect->query($sql);

            if($result-> num_rows > 0){
                while($row = $result->fetch_assoc()){
                    if($row["gender"] === "m"){
                        $gender = "Male";
                    }else{
                        $gender = "Female";
                    }
                    echo "
                    <tr>
                    <td>" . ucwords($row['first_name']) . "</td>
                    <td>" . ucwords($row['last_name']) . "</td>
                    <td>" . $gender . "</td>
                    <td>" . $row['birthdate'] . "</td>
                    <td>" . $row['address'] . "</td>
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
    </body>
</html>
