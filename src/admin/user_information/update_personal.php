<?php

    include '../../utilities/db.php';
    $connect = Connect();

    $user_id = $_POST["userid1"];
    $sql = "SELECT * FROM user_info where user_id='$user_id';";
    $result = mysqli_query($connect, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    if ($_FILES['prof_image']['tmp_name'] != "") {
        $prof_image = base64_encode(file_get_contents($_FILES['prof_image']['tmp_name']));
    }
    if ($_FILES['signature']['tmp_name'] != "") {
        $signature = base64_encode(file_get_contents($_FILES['signature']['tmp_name']));
    }
    $first_name = ucwords(mysqli_real_escape_string($connect, $_POST['first_name']));
    if (!empty($_POST['middle_name'])) {
        $middle_name = "'".ucwords(mysqli_real_escape_string($connect, $_POST['middle_name']))."'";
    } else {
        $middle_name = 'NULL';
    }
    $last_name = ucwords(mysqli_real_escape_string($connect, $_POST['last_name']));
    $birth_date = mysqli_real_escape_string($connect, $_POST['birth_date']);
    $birth_place = ucwords(mysqli_real_escape_string($connect,$_POST['birth_place']));
    $contact_number = mysqli_real_escape_string($connect, $_POST['contact_number']);
    $facebook = mysqli_real_escape_string($connect, $_POST['facebook']);
    if ($_POST['gender'] == 'None') {
        $gender = $row['gender'];
    } else {
        $gender = mysqli_real_escape_string($connect, $_POST['gender']);
        if ($gender === "Other") {
            $gender = mysqli_real_escape_string($connect, $_POST['spec']);
        }
    }
    $ft = mysqli_real_escape_string($connect, $_POST['ft']);
    $in = mysqli_real_escape_string($connect, $_POST['in']);
    $height = $ft . "'" . $in;
    $weight = mysqli_real_escape_string($connect, $_POST['weight']);
    if ($_POST['blood'] == 'None') {
        $blood_type = $row['blood_type'];
    } else {
        $blood_type = mysqli_real_escape_string($connect, $_POST['blood']);
    }
    $residential_address = ucwords(mysqli_real_escape_string($connect, $_POST['residential_address']));
    $residential_zip = mysqli_real_escape_string($connect, $_POST['residential_zip']);
    if ($_POST['res_area_code'] == 'None') {
        $residential_tel_no = $row['residential_tel_no'];
    } else {
        $residential_tel_no = mysqli_real_escape_string($connect, $_POST['res_area_code']). "-" . mysqli_real_escape_string($connect, $_POST['residential_tel_no']);
    }
    $permanent_address = ucwords(mysqli_real_escape_string($connect, $_POST['permanent_address']));
    $permanent_zip = mysqli_real_escape_string($connect, $_POST['permanent_zip']);
    if ($_POST['per_area_code'] == 'None') {
        $permanent_tel_no = $row['permanent_tel_no'];
    } else {
        $permanent_tel_no = mysqli_real_escape_string($connect, $_POST['per_area_code']). "-" . mysqli_real_escape_string($connect, $_POST['permanent_tel_no']);
    }
    $citizenship = ucwords(mysqli_real_escape_string($connect, $_POST['citizenship']));
    if ($_POST['civil_status'] == 'None') {
        $civil_status = $row['civil_status'];
    } else {
        $civil_status = ucwords(mysqli_real_escape_string($connect, $_POST['civil_status']));
        if ($civil_status === "Others") {
            $civil_status = ucwords(mysqli_real_escape_string($connect, $_POST['other_civil']));
        }
    }

    $sss_no = mysqli_real_escape_string($connect, $_POST['sss_no']);
    $tin = mysqli_real_escape_string($connect, $_POST['tin']);
    $philhealth_no = mysqli_real_escape_string($connect, $_POST['philhealth_no']);
    $pagibig_id_no = mysqli_real_escape_string($connect, $_POST['pagibig_id_no']);
    $birth_date = date('Y-m-d',strtotime($birth_date));
    if ($_FILES['prof_image']['tmp_name'] != "" && $_FILES['signature']['tmp_name'] == "") {
        $update_stmt = "UPDATE `user_info` SET `prof_image`='$prof_image',`first_name`='$first_name',`middle_name`=$middle_name,`last_name`='$last_name',`birth_date`='$birth_date', `birth_place`='$birth_place', `contact_number`='$contact_number',
         `facebook_link`='$facebook',`gender`='$gender', `height`=\"$height\", `weight`='$weight',`blood_type`='$blood_type',`residential_address`='$residential_address',
         `residential_zip`='$residential_zip', `residential_tel_no`='$residential_tel_no', `permanent_address`='$permanent_address',
         `permanent_zip`='$permanent_zip', `permanent_tel_no`='$permanent_tel_no', `citizenship`='$citizenship',
         `civil_status`='$civil_status', `sss_no`='$sss_no', `tin`='$tin',
         `philhealth_no`='$philhealth_no', `pagibig_id_no`='$pagibig_id_no' WHERE `user_id`='$user_id';";
    } elseif ($_FILES['signature']['tmp_name'] != "" && $_FILES['prof_image']['tmp_name'] == "") {
        $update_stmt = "UPDATE `user_info` SET `signature`='$signature',`first_name`='$first_name',`middle_name`=$middle_name,`last_name`='$last_name',`birth_date`='$birth_date', `birth_place`='$birth_place', `contact_number`='$contact_number',
         `facebook_link`='$facebook',`gender`='$gender', `height`=\"$height\", `weight`='$weight',`blood_type`='$blood_type',`residential_address`='$residential_address',
         `residential_zip`='$residential_zip', `residential_tel_no`='$residential_tel_no', `permanent_address`='$permanent_address',
         `permanent_zip`='$permanent_zip', `permanent_tel_no`='$permanent_tel_no', `citizenship`='$citizenship',
         `civil_status`='$civil_status', `sss_no`='$sss_no', `tin`='$tin',
         `philhealth_no`='$philhealth_no', `pagibig_id_no`='$pagibig_id_no' WHERE `user_id`='$user_id';";
    } elseif ($_FILES['prof_image']['tmp_name'] != "" && $_FILES['signature']['tmp_name'] != "") {
        $update_stmt = "UPDATE `user_info` SET `prof_image`='$prof_image',`signature`='$signature',`first_name`='$first_name',`middle_name`='$middle_name',`last_name`='$last_name',`birth_date`='$birth_date', `birth_place`='$birth_place', `contact_number`='$contact_number',
         `facebook_link`='$facebook',`gender`='$gender', `height`=\"$height\", `weight`='$weight',`blood_type`='$blood_type',`residential_address`='$residential_address',
         `residential_zip`='$residential_zip', `residential_tel_no`='$residential_tel_no', `permanent_address`='$permanent_address',
         `permanent_zip`='$permanent_zip', `permanent_tel_no`='$permanent_tel_no', `citizenship`='$citizenship',
         `civil_status`='$civil_status', `sss_no`='$sss_no', `tin`='$tin',
         `philhealth_no`='$philhealth_no', `pagibig_id_no`='$pagibig_id_no' WHERE `user_id`='$user_id';";
    } else {
        $update_stmt = "UPDATE `user_info` SET `first_name`='$first_name',`middle_name`=$middle_name,`last_name`='$last_name',`birth_date`='$birth_date', `birth_place`='$birth_place', `contact_number`='$contact_number',
         `facebook_link`='$facebook',`gender`='$gender', `height`=\"$height\", `weight`='$weight',`blood_type`='$blood_type',`residential_address`='$residential_address',
         `residential_zip`='$residential_zip', `residential_tel_no`='$residential_tel_no', `permanent_address`='$permanent_address',
         `permanent_zip`='$permanent_zip', `permanent_tel_no`='$permanent_tel_no', `citizenship`='$citizenship',
         `civil_status`='$civil_status', `sss_no`='$sss_no', `tin`='$tin',
         `philhealth_no`='$philhealth_no', `pagibig_id_no`='$pagibig_id_no' WHERE `user_id`='$user_id';";
    }
    if (mysqli_query($connect, $update_stmt) === true) {
        echo $update_stmt;
    } else {
        echo $connect->error;
    }
?>
