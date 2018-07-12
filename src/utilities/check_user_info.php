<?php
    include '../utilities/session.php';

	$stmt = "SELECT * FROM mis.user NATURAL JOIN user_info WHERE user_id='$user_id';";
       $results = mysqli_query($connect, $stmt);
        $row = mysqli_fetch_array($results, MYSQLI_ASSOC);
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

if(($birth_date == null || $birth_place == null || $contact_number == null ||
	   $gender == null || $height == null || $weight == null || $blood_type == null || $residential_address == null || $residential_zip == null || $residential_tel_no == null || $permanent_address == null || $permanent_zip == null || $permanent_tel_no == null || $citizenship == null
		|| $civil_status == null || $sss_no == null || $tin == null || $philhealth_no == null || $pagibig_id_no == null) && $type == "user") {
		header("location:/pages/update_information");
	}
?>
