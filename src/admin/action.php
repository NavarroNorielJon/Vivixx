<?php
$VAR = $_POST["test"];
    if(isset($_POST["action"])){
        include '../Utilities/db.php';
        $connect = Connect();
        echo "adslkfjldk";
        if($_POST["action"] == 'fetch'){
            $output= '';
            $sql = "select username, email, first_name, last_name,status from user natural join user_info;";
            $stmt = $connect->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll();
            $output .= '
              <table class="table table-bordered table-striped"> 
              <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Username</th>
                <th>Email</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            ';
            
            foreach($result as $row){
                $status = '';
                if($row['status'] == 'enabled'){
                    $status = '<span class="label label-success">Enable</span>';
                }else{
                    $status = '<span class="label label-danger">Disabled</span>';
                }
                $output .= '
                    <tr>
                        <td>' . $row["first_name"] . '</td>
                        <td>' . $row["last_name"] . '</td>
                        <td>' . $row["username"] . '</td>
                        <td>' . $row["email"] . '</td>
                        <td>' . $row["status"] . '</td>
                        <td><button type="button" name="action" class="btn btn-info btn-xs action" data-username= "' .row["username"] . '"data-status="' . $row["status"] . '">Action</button></td>
                    </tr>
                ';
            }
            $output .= '</table>';
            echo $output;
        }
    }