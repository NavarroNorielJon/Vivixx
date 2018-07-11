<?php
    include '../../utilities/db.php';
    $connect = Connect();

    $user_id = $_POST["userid2"];
    $sql = "SELECT * FROM user_background where user_id='$user_id';";
    $result = mysqli_query($connect, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    if (!empty($_POST['spouse_first_name'])) {
        $spouse_first_name = "'".ucwords(mysqli_real_escape_string($connect, $_POST['spouse_first_name']))."'";
    } else {
        $spouse_first_name = 'NULL';
    }

    if (!empty($_POST['spouse_middle_name'])) {
        $spouse_middle_name = "'".ucwords(mysqli_real_escape_string($connect, $_POST['spouse_middle_name']))."'";
    } else {
        $spouse_middle_name = 'NULL';
    }

    if (!empty($_POST['spouse_last_name'])) {
        $spouse_last_name = "'".ucwords(mysqli_real_escape_string($connect, $_POST['spouse_last_name']))."'";

    } else {
        $spouse_last_name = 'NULL';
    }

    if (!empty($_POST['occupation'])) {
        $occupation = "'".ucwords(mysqli_real_escape_string($connect, $_POST['occupation']))."'";
    } else {
        $occupation = 'NULL';
    }

    if (!empty($_POST['employer'])) {
        $employer = "'".ucwords(mysqli_real_escape_string($connect, $_POST['employer']))."'";
    } else {
        $employer = 'NULL';
    }

    if (!empty($_POST['business_address'])) {
        $business_address = "'".ucwords(mysqli_real_escape_string($connect, $_POST['business_address']))."'";
    } else {
        $business_address = 'NULL';
    }
    if ($_POST['sp_area_code'] == 'None') {
        $spouse_tel_no = 'NULL';
    } else {
        $spouse_tel_no = "'".mysqli_real_escape_string($connect, $_POST['sp_area_code']). "-" . mysqli_real_escape_string($connect, $_POST['spouse_tel_no'])."'";
    }

    $father_first_name = ucwords(mysqli_real_escape_string($connect, $_POST['father_first_name']));
    if (!empty($_POST['father_middle_name'])) {
        $father_middle_name = "'".ucwords(mysqli_real_escape_string($connect, $_POST['father_middle_name']))."'";
    } else {
        $father_middle_name = 'NULL';
    }
    $father_last_name = ucwords(mysqli_real_escape_string($connect, $_POST['father_last_name']));
    $mother_first_name = ucwords(mysqli_real_escape_string($connect, $_POST['mother_first_name']));
    if (!empty($_POST['mother_middle_name'])) {
        $mother_middle_name = "'".ucwords(mysqli_real_escape_string($connect, $_POST['mother_middle_name']))."'";
    } else {
        $mother_middle_name = 'NULL';
    }
    $mother_last_name = ucwords(mysqli_real_escape_string($connect, $_POST['mother_last_name']));
    //child info
    $child_name = $_POST['child_name'];
    $child_birth = $_POST['child_birth'];

    for ($i=0; $i < count($child_name) ; $i++) {
        if ($child_name[$i] === "" && $child_birth[$i] === "") {
            continue;
        } else{
            $update_stmt = "UPDATE `user_offspring` SET `child_name`='$child_name[$i]',`child_birth_date`='$child_birth[$i]' WHERE user_id='$user_id';";
            if (mysqli_query($connect, $update_stmt) === true) {
                echo $update_stmt;
                echo "<br>";

            } else {
                print_r($connect->error);
            }
        }
    }
    $update_stmt ="UPDATE `user_background` SET `spouse_first_name`= $spouse_first_name,`spouse_middle_name`=$spouse_middle_name,`spouse_last_name`=$spouse_last_name,
    `occupation`=$occupation,`employer`=$employer,`business_address`=$business_address,`spouse_tel_no`=$spouse_tel_no,`father_first_name`='$father_first_name',
    `father_middle_name`=$father_middle_name,`father_last_name`='$father_last_name',
    `mother_first_name`='$mother_first_name',`mother_middle_name`=$mother_middle_name,`mother_last_name`='$mother_last_name' WHERE user_id='$user_id'";
    if (mysqli_query($connect, $update_stmt) === true) {
        echo $update_stmt;
        echo "<br>";
    } else {
        echo $connect->error;
    }
?>
