
<?php
  include 'header.php';
  include 'sorting_account_status.php';
 ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Table</title>
        <script type="text/javascript" src="../script/jquery.min.js"></script>
        <link rel="stylesheet" href="../style/bootstrap/bootstrap.min.css">
        <link type="text/css" rel="stylesheet" href="../style/bootstrap/bootstrap.min.css" media="screen, projection">
        <link type="text/css" rel="stylesheet" href="../style/style.css" media="screen, projection">
        <script type="text/javascript" src="../script/popper.min.js"></script>
        <script type="text/javascript" src="../script/ajax.js"></script>
        <script type="text/javascript" src="../script/bootstrap/bootstrap.min.js"></script>


    </head>
    <body>
        <table class="table">
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

            $result = $connect->query($sql);

            //sorting
            if(isset($_POST["asc"])){
              $sql = "select username, email, first_name, last_name,status from user natural join user_info order by first_name asc;";
              $result = $connect->query($sql);
            }else if(isset($_POST["desc"])){
              $sql = "select username, email, first_name, last_name,status from user natural join user_info order by first_name desc;";
              $result = $connect->query($sql);
            }else if(isset($_POST["last_asc"])){
              $sql = "select username, email, first_name, last_name,status from user natural join user_info order by last_name asc;";
              $result = $connect->query($sql);
            }else if(isset($_POST["last_desc"])){
              $sql = "select username, email, first_name, last_name,status from user natural join user_info order by last_name desc;";
              $result = $connect->query($sql);
            }else if(isset($_POST["status_asc"])){
              $sql = "select username, email, first_name, last_name,status from user natural join user_info order by status asc;";
              $result = $connect->query($sql);
            }else if(isset($_POST["status_desc"])){
              $sql = "select username, email, first_name, last_name,status from user natural join user_info order by status desc;";
              $result = $connect->query($sql);
            }else{
              $sql = "select username, email, first_name, last_name,status from user natural join user_info;";
              $result = $connect->query($sql);
            }

            if($result-> num_rows > 0){
                $counter = 0;
                while($row = $result->fetch_assoc()){

                    echo "
                    <tr>

                    <td>" . ucwords($row["first_name"]) . "</td>
                    <td>" . ucwords($row["last_name"]) . "</td>
                    <td><input type='hidden' name='username' value='".$row['username']."'>" . $row["username"] . "</td>
                    <td>" . $row["email"] . "</td>
                    <td>" . $row["status"] . "</td>";
                    echo "<td>";
                    if($row["status"] === "enabled"){
                      echo "
                      <form action='update_status.php' method='POST'>
                      <div class='btn-group btn-group-toggle' data-toggle='button'>
                      <input type='hidden' value='".$row['username']."' name='username'>
                      <input type='button' id='en".$row["username"]."' class='btn btn-danger'checked autocomplete='f' value='disable' name='disable'></div>
                      </form>
                      ";
                    }else{
                      echo "
                      <form action='update_status.php' method='POST'>
                      <div class='btn-group btn-group-toggle' data-toggle='button'>
                        <input type='submit' id='en".$row["username"]."' class='btn btn-success'checked autocomplete='f' value='enable' name='enable'>
                        </div></form>";
                    }
                    echo '</td>';
                    $script ="
                        <script>
                        $(document).ready(function(){
                          if($('#en".$row['username']."').hasClass('btn-success')){
                              $('#en".$row['username']."').click(function(){
                              $('#en".$row['username']."').removeClass('btn-success');
                              $('#en".$row['username']."').addClass('btn-danger');
                              $('#en".$row['username']."').val('Disable');
                            });
                          }else{
                              $('#en".$row['username']."').click(function(){
                              $('#en".$row['username']."').removeClass('btn-danger');
                              $('#en".$row['username']."').addClass('btn-success');
                              $('#en".$row['username']."').val('Enable');
                              });
                          }

                      }); //end document
                        </script>

                    </tr>";
                    $counter++;
                }

            }else{
                echo "database has no query";
            }


            $connect-> close();
            ?>
        </table>
    </body>
</html>
