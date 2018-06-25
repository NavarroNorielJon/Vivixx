<?php
include 'db.php';
include 'session.php';
$connect = Connect();


//personal information
$birth_date = mysqli_real_escape_string($connect, $_POST['birth_date']);
$birth_place = mysqli_real_escape_string($connect,$_POST['birth_place']);
$contact_number = mysqli_real_escape_string($connect, $_POST['contact_number']);
$gender = mysqli_real_escape_string($connect, $_POST['gender']);
$ft = mysqli_real_escape_string($connect, $_POST['ft']);
$in = mysqli_real_escape_string($connect, $_POST['in']);
$height = $ft . "'" . $in;
$weight = mysqli_real_escape_string($connect, $_POST['weight']);
$blood_type = mysqli_real_escape_string($connect, $_POST['blood']);
$residential_address = mysqli_real_escape_string($connect, $_POST['residential_address']);
$residential_zip = mysqli_real_escape_string($connect, $_POST['residential_zip']);
$residential_tel_no = mysqli_real_escape_string($connect, $_POST['residential_tel_no']);
$permanent_address = mysqli_real_escape_string($connect, $_POST['permanent_address']);
$permanent_zip = mysqli_real_escape_string($connect, $_POST['permanent_zip']);
$permanent_tel_no = mysqli_real_escape_string($connect, $_POST['permanent_tel_no']);
$citizenship = mysqli_real_escape_string($connect, $_POST['citizenship']);
$religion = mysqli_real_escape_string($connect, $_POST['religion']);
$civil_status = mysqli_real_escape_string($connect, $_POST['civil_status']);

if ($civil_status === "others") {
    $civil_status = mysqli_real_escape_string($connect, $_POST['other_civil']);
}

$sss_no = mysqli_real_escape_string($connect, $_POST['sss_no']);
$tin = mysqli_real_escape_string($connect, $_POST['tin']);
$philhealth_no = mysqli_real_escape_string($connect, $_POST['philhealth_no']);
$pagibig_id_no = mysqli_real_escape_string($connect, $_POST['pagibig_id_no']);

//family background
$spouse_first_name = mysqli_real_escape_string($connect, $_POST['spouse_first_name']);
$spouse_middle_name = mysqli_real_escape_string($connect, $_POST['spouse_middle_name']);
$spouse_last_name = mysqli_real_escape_string($connect, $_POST['spouse_last_name']);
$occupation = mysqli_real_escape_string($connect, $_POST['occupation']);
$employer = mysqli_real_escape_string($connect, $_POST['employer']);
$business_address = mysqli_real_escape_string($connect, $_POST['business_address']);
$spouse_tel_no = mysqli_real_escape_string($connect, $_POST['spouse_tel_no']);
$father_first_name = mysqli_real_escape_string($connect, $_POST['father_first_name']);
$father_middle_name = mysqli_real_escape_string($connect, $_POST['father_middle_name']);
$father_last_name = mysqli_real_escape_string($connect, $_POST['father_last_name']);
$mother_first_name = mysqli_real_escape_string($connect, $_POST['mother_first_name']);
$mother_middle_name = mysqli_real_escape_string($connect, $_POST['mother_middle_name']);
$mother_last_name = mysqli_real_escape_string($connect, $_POST['mother_last_name']);
//child info
$child_name = $_POST['child_name'];
$child_birth = $_POST['child_birth'];


// //Educational background
$elem_school_name = mysqli_real_escape_string($connect, $_POST['elem_school_name']);
$elem_status = mysqli_real_escape_string($connect, $_POST['option1']);

if ($elem_status === "g1") {
    $elem_res = mysqli_real_escape_string($connect, $_POST['elem_yr_grad']);

} else {
    $elem_res = mysqli_real_escape_string($connect, $_POST['elem_high_level']);
}

$sec_school_name = mysqli_real_escape_string($connect, $_POST['sec_school_name']);
$sec_status = mysqli_real_escape_string($connect, $_POST['option2']);

if ($sec_status === "g2") {
    $sec_res = mysqli_real_escape_string($connect, $_POST['sec_yr_grad']);
} else {
    $sec_res = mysqli_real_escape_string($connect, $_POST['sec_high_level']);
}

$col_school_name = mysqli_real_escape_string($connect, $_POST['col_school_name']);
$col_status = mysqli_real_escape_string($connect, $_POST['option3']);

if ($col_status === "g3") {
    $col_res = mysqli_real_escape_string($connect, $_POST['col_yr_grad']);
}else {
    $col_res = mysqli_real_escape_string($connect, $_POST['col_high_level']);
}

$post_school_name = mysqli_real_escape_string($connect, $_POST['post_school_name']);
$post_status = mysqli_real_escape_string($connect, $_POST['option4']);

if ($post_status === "g4") {
    $post_res = mysqli_real_escape_string($connect, $_POST['pos_yr_grad']);
}else {
    $post_res = mysqli_real_escape_string($connect, $_POST['pos_high_level']);
}

// //Emergency info Sheet
$long = mysqli_real_escape_string($connect, $_POST['lng']);
$lat = mysqli_real_escape_string($connect, $_POST['lat']);
$coordinates = $lat . "," . $long;
$main_address = mysqli_real_escape_string($connect, $_POST['main_address']);

//     //Housemate
$h_name = $_POST['hname'];
$h_relationship = $_POST['hrel'];
$h_mobile_number = $_POST['mnumber'];

//     //Relatives
$r_name = $_POST['rname'];
$r_relationship = $_POST['rrel'];
$r_mobile_number =$_POST['rmnumber'];

$secondary_address = mysqli_real_escape_string($connect, $_POST['secondary_add']);
$provincial_address = mysqli_real_escape_string($connect, $_POST['provincial_add']);

// //tutor info sheet
$tutor_name = mysqli_real_escape_string($connect, $_POST['tutor_name']);
$nickname = mysqli_real_escape_string($connect, $_POST['nickname']);
$mobile = mysqli_real_escape_string($connect, $_POST['mobile']);
$landline = mysqli_real_escape_string($connect, $_POST['landline']);
$account = mysqli_real_escape_string($connect, $_POST['acc']);
$com_email = mysqli_real_escape_string($connect, $_POST['com_email']);
$e_pass = mysqli_real_escape_string($connect, $_POST['c_password']);
$skype = mysqli_real_escape_string($connect, $_POST['skype']);
$s_pass = mysqli_real_escape_string($connect, $_POST['s_password']);
$qq_num = mysqli_real_escape_string($connect, $_POST['qq_num']);
$qq_pass = mysqli_real_escape_string($connect, $_POST['qq_password']);

$sql = "SELECT * FROM user_info where contact_number = '$contact_number'";
$result = $connect->query($sql);

// /**
//  *Checks if the contact is already being used and will return
//  *to registration.
//  */
if($result->num_rows > 0){
    echo "
        <script>
            alert('The Contact you have entered is already in use.');
            window.history.back();
        </script>
    ";
    exit;
}
$birth_date = date('Y-m-d',strtotime($birth_date));


$elementary = $elem_school_name . "|" . $elem_res;
$secondary = $sec_school_name . "|" . $sec_res;
$college = $col_school_name . "|" . $col_res;
$post_grad = $post_school_name . "|" . $post_res;

$sql = "SELECT user_id FROM user where username='$username'";
$result = $connect->query($sql);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$id = $row['user_id'];

$update_stmt = "UPDATE `user_info` SET `birth_date`='$birth_date', `birth_place`='$birth_place', `contact_number`='$contact_number',
 `gender`='$gender', `height`='$height', `weight`='$weight',`blood_type`='$blood_type', `residential_address`='$residential_address',
 `residential_zip`='$residential_zip', `residential_tel_no`='$residential_tel_no', `permanent_address`='$permanent_address',
 `permanent_zip`='$permanent_zip', `permanent_tel_no`='$permanent_tel_no', `citizenship`='$citizenship',
 `religion`='$religion', `civil_status`='$civil_status', `sss_no`='$sss_no', `tin`='$tin',
 `philhealth_no`='$philhealth_no', `pagibig_id_no`='$pagibig_id_no' WHERE `user_id`='$id';";

if ($connect->query($update_stmt) === true) {
    $insert_stmt = "INSERT INTO `user_background`(`bg_id`,`spouse_first_name`,`spouse_middle_name`,`spouse_last_name`,
    `occupation`,`employer`,`business_address`,`spouse_tel_no`,`father_first_name`,`father_middle_name`,`father_last_name`,
    `mother_first_name`,`mother_middle_name`,`mother_last_name`) VALUES ('$id','$spouse_first_name','$spouse_middle_name',
    '$spouse_last_name','$occupation','$employer','$business_address','$spouse_tel_no','$father_first_name','$father_middle_name',
    '$father_last_name','$mother_first_name','$mother_middle_name','$mother_last_name');";
    if ($connect->query($insert_stmt) === true) {
        foreach ($child_name as $name) {
            foreach ($child_birth as $birth) {
                $insert_stmt = "INSERT INTO `user_offspring` (`child_name`,`child_birth_date`,`user_id`)
                    VALUES ('$name','$birth','$id');";
            }
            $connect->query($insert_stmt);
        }
        $insert_stmt = "INSERT INTO `user_educ` (`user_id`,`elementary`,`secondary`,`college`,`post_grad`)
            VALUES ('$id','$elementary','$secondary','$college','$post_grad');";
        if ($connect->query($insert_stmt) === true) {
            foreach ($r_name as $key => $rname) {
                foreach ($r_relationship as $key => $rrel) {
                    foreach ($r_mobile_number as $key => $rnum) {
                        $insert_stmt = "INSERT INTO `relative`(`r_id`,`r_name`,`r_number`,`r_relationship`) VALUES ('$id','$rname','$rnum','$rrel');";
                    }
                }
                $connect->query($insert_stmt);
            }

            foreach ($h_name as $key => $hname) {
                foreach ($h_relationship as $key => $hrel) {
                    foreach ($h_mobile_number as $key => $hnum) {
                        $insert_stmt = "INSERT INTO `housemate`(`h_id`,`h_name`,`h_number`,`h_relationship`) VALUES ('$id','$hname','$hnum','$hrel');";
                    }
                }
                $connect->query($insert_stmt);
            }

            $insert_stmt = "INSERT INTO `emergency_info_sheet`(`user_id`,`coordinates`,`main_address`,`secondary_address`,
                            `provincial_address`,`hmate_id`,`relative_id`) VALUES ('$id','$coordinates','$main_address',
                            '$secondary_address','$provincial_address','$id','$id');";
            if ($connect->query($insert_stmt) === true) {
                $insert_stmt = "INSERT INTO `tutor_info` (`user_id`,`full_name`,`nickname`,`mobile_number`,`landline`,`accounts`,`email`,
                                `email_password`,`skype`,`skype_password`,`qq_number`,`qq_password`) VALUES ('$id','$tutor_name','$nickname','$mobile','$landline','$account',
                                '$com_email','$e_pass','$skype','$s_pass','$qq_num','$qq_pass') ;";
                $connect->query($insert_stmt);
            }else {
                print_r($connect->error);
            }
        }else {
            print_r($connect->error);
        }
    }else {
        print_r($connect->error);
    }
}else {
    print_r($connect->error);
}

?>
