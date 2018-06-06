<!DOCTYPE html>
<html>
    <head>
        <script src="../Style/materialize/js/materialize.min.js"></script>
        <link rel="stylesheet" href="../Style/materialize/css/materialize.min.css">
        <script src="../JavaScript/jquery.min.js"></script>
        <title>Table</title>
    </head>
    <body>
        <table border="1">
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Username</th>
                <th>Email</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            
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
                    <td>" . $row["first_name"] . "</td>
                    <td>" . $row["last_name"] . "</td>
                    <td>" . $row["username"] . "</td>
                    <td>" . $row["email"] . "</td>
                    <td>" . $row["status"] . "</td>
                    <td><div class='switch'>
                        <label>
                          Off
                          <input type='checkbox' name='switch' class='aa' value='".$row['username']."'>
                          <span class='lever'></span>
                          On
                        </label>
                      </div></td>" .
                    "</tr>";
                    echo '
                    <script type="text/javascript">
                        if("'.$row["status"].'" === "enabled"){
                        document.getElementsByName("switch")[' . $counter . '].checked = true;
                        }else{
                        document.getElementsByName("switch")[' . $counter . '].checked = false;
                        }
                    </script>';
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
                    xmlhttp.open("POST", "update_status.php?u")
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
