<?php
    ini_set('post_max_size', '16M');
    ini_set('upload_max_filesize', '16M');
    include '../../utilities/db.php';
    $connect = Connect();

    $user_id = $_POST["userid"];
    $sql = "SELECT * FROM user_background where user_id='$user_id';";
    $result = mysqli_query($connect, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    $spouse_first_name = ucwords(mysqli_real_escape_string($connect, $_POST['spouse_first_name']));
    $spouse_middle_name = ucwords(mysqli_real_escape_string($connect, $_POST['spouse_middle_name']));
    $spouse_last_name = ucwords(mysqli_real_escape_string($connect, $_POST['spouse_last_name']));
    $occupation = ucwords(mysqli_real_escape_string($connect, $_POST['occupation']));
    $employer = ucwords(mysqli_real_escape_string($connect, $_POST['employer']));
    $business_address = ucwords(mysqli_real_escape_string($connect, $_POST['business_address']));
    if (isset($_POST['sp_area_code']) != "") {
        $area = mysqli_real_escape_string($connect, $_POST['sp_area_code']);
        $spouse_tel_no = $area . "-" . mysqli_real_escape_string($connect, $_POST['spouse_tel_no']);
    }
    $father_first_name = ucwords(mysqli_real_escape_string($connect, $_POST['father_first_name']));
    $father_middle_name = ucwords(mysqli_real_escape_string($connect, $_POST['father_middle_name']));
    $father_last_name = ucwords(mysqli_real_escape_string($connect, $_POST['father_last_name']));
    $mother_first_name = ucwords(mysqli_real_escape_string($connect, $_POST['mother_first_name']));
    $mother_middle_name = ucwords(mysqli_real_escape_string($connect, $_POST['mother_middle_name']));
    $mother_last_name = ucwords(mysqli_real_escape_string($connect, $_POST['mother_last_name']));
    //child info
    $child_name = $_POST['child_name'];
    $child_birth = $_POST['child_birth'];
    if (!empty($_POST['middle_name'])) {
        if ($_FILES['prof_image']['tmp_name'] != "" && $_FILES['signature']['tmp_name'] == "") {
            $update_stmt = "UPDATE `user_info` SET `prof_image`='$prof_image',`first_name`='$first_name',`middle_name`='$middle_name',`last_name`='$last_name',`birth_date`='$birth_date', `birth_place`='$birth_place', `contact_number`='$contact_number',
             `facebook_link`='$facebook',`gender`='$gender', `height`=\"$height\", `weight`='$weight',`blood_type`='$blood_type',`residential_address`='$residential_address',
             `residential_zip`='$residential_zip', `residential_tel_no`='$residential_tel_no', `permanent_address`='$permanent_address',
             `permanent_zip`='$permanent_zip', `permanent_tel_no`='$permanent_tel_no', `citizenship`='$citizenship',
             `civil_status`='$civil_status', `sss_no`='$sss_no', `tin`='$tin',
             `philhealth_no`='$philhealth_no', `pagibig_id_no`='$pagibig_id_no' WHERE `user_id`='$user_id';";
        } elseif ($_FILES['signature']['tmp_name'] != "" && $_FILES['prof_image']['tmp_name'] == "") {
            $update_stmt = "UPDATE `user_info` SET `signature`='$signature',`first_name`='$first_name',`middle_name`='$middle_name',`last_name`='$last_name',`birth_date`='$birth_date', `birth_place`='$birth_place', `contact_number`='$contact_number',
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
            $update_stmt = "UPDATE `user_info` SET `first_name`='$first_name',`middle_name`='$middle_name',`last_name`='$last_name',`birth_date`='$birth_date', `birth_place`='$birth_place', `contact_number`='$contact_number',
             `facebook_link`='$facebook',`gender`='$gender', `height`=\"$height\", `weight`='$weight',`blood_type`='$blood_type',`residential_address`='$residential_address',
             `residential_zip`='$residential_zip', `residential_tel_no`='$residential_tel_no', `permanent_address`='$permanent_address',
             `permanent_zip`='$permanent_zip', `permanent_tel_no`='$permanent_tel_no', `citizenship`='$citizenship',
             `civil_status`='$civil_status', `sss_no`='$sss_no', `tin`='$tin',
             `philhealth_no`='$philhealth_no', `pagibig_id_no`='$pagibig_id_no' WHERE `user_id`='$user_id';";
        }
    } else {
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
            $update_stmt = "UPDATE `user_info` SET `prof_image`='$prof_image',`signature`='$signature',`first_name`='$first_name',`middle_name`=$middle_name,`last_name`='$last_name',`birth_date`='$birth_date', `birth_place`='$birth_place', `contact_number`='$contact_number',
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

    }
    if (mysqli_query($connect, $update_stmt) === true) {
    } else {
        echo $connect->error;
    }
?>
