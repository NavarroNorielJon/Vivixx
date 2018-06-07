<!DOCTYPE html>
<html>
    <head>
       <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="../style/bootstrap/bootstrap.min.css" media="screen, projection">
        <link type="text/css" rel="stylesheet" href="../style/style.css" media="screen, projection">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                    <td>" . ucwords($row["first_name"]) . "</td>
                    <td>" . ucwords($row["last_name"]) . "</td>
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
