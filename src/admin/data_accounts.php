<table class="table" id="table">
  <thead>
    <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Username</th>
        <th>Email</th>
        <th>Status</th>
        <th>Action</th>
    </tr>
  </thead>

    <?php
    include '../Utilities/db.php';
    $connect = Connect();
    $sql = "select username, email, first_name, last_name,status from user natural join user_info;";

   //sorting
    if(isset($_POST["asc"])){
      $sql = "select username, email, first_name, last_name,status from user natural join user_info order by first_name asc;";
    }else if(isset($_POST["desc"])){
      $sql = "select username, email, first_name, last_name,status from user natural join user_info order by first_name desc;";
    }else if(isset($_POST["last_asc"])){
      $sql = "select username, email, first_name, last_name,status from user natural join user_info order by last_name asc;";
    }else if(isset($_POST["last_desc"])){
      $sql = "select username, email, first_name, last_name,status from user natural join user_info order by last_name desc;";
    }else if(isset($_POST["status_asc"])){
      $sql = "select username, email, first_name, last_name,status from user natural join user_info order by status asc;";
    }else if(isset($_POST["status_desc"])){
      $sql = "select username, email, first_name, last_name,status from user natural join user_info order by status desc;";
    }else{
      $sql = "select username, email, first_name, last_name,status from user natural join user_info;";
    }
    $result = $connect->query($sql);

    if($result-> num_rows > 0){
        $counter = 0;
        while($row = $result->fetch_assoc()){
          //disable button
          if($row["status"] === "enabled"){
            $button = "
            <input name='disable' value='Disable' style='display: none;'>
            <input class='btn btn-danger' type='submit' value='Disable'>";
          }else{
            $button = "
            <input name='enable' value='Enable' style='display: none;'>
            <input class='btn btn-success' type='submit' value='Enable'>";
          }
            echo "
            <tr>
            <form action='update_status.php' method='POST'>
            <td>" . ucwords($row['first_name']) . "</td>
            <td>" . ucwords($row['last_name']) . "</td>
            <td><input type='hidden' name='username' value='".$row['username']."'>" . $row['username'] . "</td>
            <td>" . $row['email'] . "</td>
            <td>" . $row['status'] . "</td>
            <td>
             ".$button."

            </form>
            ";
          }
        }else {
         echo "database has no query";
    }

    $connect-> close();
    ?>
  </table>
