<?php
    require_once 'db.php';
    session_start();
    $connect = Connect();
    if(isset($_SESSION['user'])){
        $current_user = $_SESSION['user'];
        $stmt = "SELECT * FROM user NATURAL JOIN user_info NATURAL JOIN user_background NATURAL JOIN user_educ NATURAL JOIN user_offspring NATURAL JOIN emergency_info_sheet NATURAL JOIN tutor_info WHERE username='$current_user' or email='$current_user';";
        $results = mysqli_query($connect, $stmt);
        $row = mysqli_fetch_array($results, MYSQLI_ASSOC);
        $username = $row['username'];
        $user_id = $row['user_id'];
        $prof_image = $row['prof_image'];
        $email = $row['email'];
		$type = $row['type'];
        $first_name = $row['first_name'];
        $middle_name = $row['middle_name'];
        $last_name = $row['last_name'];
        $full_name = $first_name ." " . $middle_name ." " . $last_name;
        $birth_date = $row['birth_date'];
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
        $civil_status = $row['civil_status'];
        $sss_no = $row['sss_no'];
        $tin = $row['tin'];
        $philhealth_no = $row['philhealth_no'];
        $pagibig_id_no = $row['pagibig_id_no'];
        $department = $row['department'];
    }

	if(!isset($_SESSION['user'])){
        header('location:/');
    }
?>
