<?php
    require_once 'db.php';
    session_start();

    $connect = Connect();
    if(isset($_SESSION['user'])){
        $current_user = $_SESSION['user'];
        $stmt = "SELECT * FROM user NATURAL JOIN user_info where username='$current_user' or email='$current_user'";
        $results = mysqli_query($connect, $stmt);
        $row = mysqli_fetch_array($results, MYSQLI_ASSOC);
        $username = $row['username'];
        $email = $row['email'];
        $first_name = $row['first_name'];
        $middle_name = $row['middle_name'];
        $last_name = $row['last_name'];
    }

    if(!isset($_SESSION['user'])){
        header('location:/');
    }
?>
