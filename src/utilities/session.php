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
        $birthdate = $row['birthdate'];
        $birth_place = $row['birth_place'];
        $contact_number = $row['contact_number'];
        $gender = $row['gender'];
        $height = $row['height'];
        $weight = $row['weight'];
        $blood_type = $row['blood_type'];
        $residential_address = $row['residential_address'];
        $residential_zip = $row['residential_zip'];
        $residential_tel_no = $row['residential_tel_no'];
        $permanent_address = $row['permanent_address'];
        $permanent_zip = $row['permanent_zip'];
        $permanent_tel_no = $row['permanent_tel_no'];
        $citizenship = $row['citizenship'];
        $religion = $row['religion'];
        $civil_status = $row['civil_status'];
        $sss_no = $row['sss_no'];
        $tin = $row['tin'];
        $philhealth_no = $row['philhealth_no'];
        $pagibig_id_no = $row['pagibig_id_no'];


    }

    if(!isset($_SESSION['user'])){
        header('location:/');
    }
?>
