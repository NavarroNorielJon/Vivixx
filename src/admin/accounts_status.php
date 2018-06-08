<?php
  include 'header.php';
  include 'sorting_account_status.php'
 ?>

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
                   //disable button
                   if($row["status"] === "enabled"){
                     $button = "<input class='btn btn-danger' type='submit' name='disable'value='Disable'>";
                   }else{
                     $button = "<input class='btn btn-success' type='submit' name='enable'value='Enable'>";
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
           </body>
           </html>
