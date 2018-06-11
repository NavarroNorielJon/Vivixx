<?php
    require_once 'db.php';
    session_start();
    
    $connect = Connect();
    if(isset($_SESSION['user'])){
        $current_user = $_SESSION['user'];
        $stmt = "SELECT * FROM user NATURAL JOIN user_info";
        $results = mysqli_query($connect, $stmt);
        $row = mysqli_fetch_array($results, MYSQLI_ASSOC);
        $username = $row['username'];
        $user_email = $row['email'];
        $user_first = $row['first_name'];
        $user_last = $row['last_name'];
        $user_contact = $row['contact_number'];
    }

    if(!isset($_SESSION['user'])){
        header('location:/');
    }
?>