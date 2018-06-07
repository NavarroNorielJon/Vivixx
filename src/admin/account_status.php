<!DOCTYPE html>
<html>
    <head>

        <link rel="stylesheet" href="../script/bootstrap/bootstrap.min.css">
        <title>Table</title>

        <link type="text/css" rel="stylesheet" href="../style/bootstrap/bootstrap.min.css" media="screen, projection">
        <link type="text/css" rel="stylesheet" href="../style/style.css" media="screen, projection">
        <script type="text/javascript" src="../script/jquery.min.js"></script>


    </head>
    <body>
        <table class="table" style="font-size: 18px">
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

            if($result-> num_rows > 0){
                $counter = 0;
                while($row = $result->fetch_assoc()){

                    echo "
                    <tr>
                    <td>" . ucwords($row["first_name"]) . "</td>
                    <td>" . ucwords($row["last_name"]) . "</td>
                    <td>" . $row["username"] . "</td>
                    <td>" . $row["email"] . "</td>
                    <td>" . $row["status"] . "</td>";
                    echo "<td>";
                    if($row["status"] === "enabled"){
                      echo "
                      <div class='btn-group btn-group-toggle' data-toggle='button'>
                      <label class='btn btn-danger'>
                        <input type='checkbox' class ='aa'checked autocomplete='f'> Disable
                      </label></div>
                      ";
                    }else{
                      echo "<div class='btn-group btn-group-toggle' data-toggle='button'>
                        <label class='btn btn-success'>
                          <input type='checkbox' class='aa'checked autocomplete='f'> Enable
                        </label>
                        </div>";
                    }
                    echo "</td></tr>";
                    $counter++;
                }

            }else{
                echo "database has no query";
            }
            $connect-> close();
            ?>
        </table>
        <script>
            $(".aa").change(function(){
            if(this.checked){
                function enable(str){
                    var xmlhttp = new XMLHttpRequest();
                    xmlhttp.onreadystatechange = function(){
                        if(this.readyState == 4 && this.status == 200){
                            document.getElementsByName().innerHTML = this.responseText;
                        }
                    }
                    xmlhttp.open("POST", "update_status.php")
                }
                }else{
                    <?php
                echo "hh";
                ?>
                }

            });

        </script>

    </body>
</html>
