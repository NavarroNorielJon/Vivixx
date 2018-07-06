<?php
include 'db.php';
include 'session.php';
$connect = Connect();


//personal information
$birth_date = mysqli_real_escape_string($connect, $_POST['birth_date']);
$birth_place = ucwords(mysqli_real_escape_string($connect,$_POST['birth_place']));
$contact_number = mysqli_real_escape_string($connect, $_POST['contact_number']);
$facebook = mysqli_real_escape_string($connect, $_POST['facebook']);
$gender = mysqli_real_escape_string($connect, $_POST['gender']);
if ($gender === "Other") {
    $gender = mysqli_real_escape_string($connect, $_POST['spec']);
}
$ft = mysqli_real_escape_string($connect, $_POST['ft']);
$in = mysqli_real_escape_string($connect, $_POST['in']);
$height = $ft . "'" . $in;
$weight = mysqli_real_escape_string($connect, $_POST['weight']);
$blood_type = mysqli_real_escape_string($connect, $_POST['blood']);
$residential_address = ucwords(mysqli_real_escape_string($connect, $_POST['residential_address']));
$residential_zip = mysqli_real_escape_string($connect, $_POST['residential_zip']);
$residential_tel_no = mysqli_real_escape_string($connect, $_POST['res_area_code']). "-" . mysqli_real_escape_string($connect, $_POST['residential_tel_no']);
$permanent_address = ucwords(mysqli_real_escape_string($connect, $_POST['permanent_address']));
$permanent_zip = mysqli_real_escape_string($connect, $_POST['permanent_zip']);
$permanent_tel_no = mysqli_real_escape_string($connect, $_POST['per_area_code']). "-" . mysqli_real_escape_string($connect, $_POST['permanent_tel_no']);
$citizenship = ucwords(mysqli_real_escape_string($connect, $_POST['citizenship']));
$civil_status = ucwords(mysqli_real_escape_string($connect, $_POST['civil_status']));

if ($civil_status === "others") {
    $civil_status = ucwords(mysqli_real_escape_string($connect, $_POST['other_civil']));
}

$sss_no = mysqli_real_escape_string($connect, $_POST['sss_no']);
$tin = mysqli_real_escape_string($connect, $_POST['tin']);
$philhealth_no = mysqli_real_escape_string($connect, $_POST['philhealth_no']);
$pagibig_id_no = mysqli_real_escape_string($connect, $_POST['pagibig_id_no']);

//family background
$spouse_first_name = ucwords(mysqli_real_escape_string($connect, $_POST['spouse_first_name']));
$spouse_middle_name = ucwords(mysqli_real_escape_string($connect, $_POST['spouse_middle_name']));
$spouse_last_name = ucwords(mysqli_real_escape_string($connect, $_POST['spouse_last_name']));
$occupation = ucwords(mysqli_real_escape_string($connect, $_POST['occupation']));
$employer = ucwords(mysqli_real_escape_string($connect, $_POST['employer']));
$business_address = ucwords(mysqli_real_escape_string($connect, $_POST['business_address']));
if (isset($_POST['sp_area_code']) === "") {
    $spouse_tel_no = mysqli_real_escape_string($connect, $_POST['spouse_tel_no']);
} else {
    $area = mysqli_real_escape_string($connect, isset($_POST['sp_area_code']));
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


// //Educational background
$elem_school_name = ucwords(mysqli_real_escape_string($connect, $_POST['elem_school_name']));
$elem_status = mysqli_real_escape_string($connect, $_POST['option1']);

if ($elem_status === "g1") {
    $elem_res = ucwords(mysqli_real_escape_string($connect, $_POST['elem_yr_grad']));
} else {
    $elem_res = ucwords(mysqli_real_escape_string($connect, $_POST['elem_high_level']));
}

$sec_school_name = ucwords(mysqli_real_escape_string($connect, $_POST['sec_school_name']));
$sec_status = mysqli_real_escape_string($connect, $_POST['option2']);

if ($sec_status === "g2") {
    $sec_res = ucwords(mysqli_real_escape_string($connect, $_POST['sec_yr_grad']));
} else {
    $sec_res = ucwords(mysqli_real_escape_string($connect, $_POST['sec_high_level']));
}

$col_school_name = ucwords(mysqli_real_escape_string($connect, $_POST['col_school_name']));
$col_status = mysqli_real_escape_string($connect, $_POST['option3']);

if ($col_status === "g3") {
    $col_res = ucwords(mysqli_real_escape_string($connect, $_POST['col_yr_grad']));
}else {
    $col_res = ucwords(mysqli_real_escape_string($connect, $_POST['col_high_level']));
}

$post_school_name = ucwords(mysqli_real_escape_string($connect, $_POST['pos_school_name']));
$post_status = mysqli_real_escape_string($connect, $_POST['option4']);

if ($post_status === "g4") {
    $post_res = ucwords(mysqli_real_escape_string($connect, $_POST['pos_yr_grad']));
}else {
    $post_res = ucwords(mysqli_real_escape_string($connect, $_POST['pos_high_level']));
}

// //Emergency info Sheet
$long = mysqli_real_escape_string($connect, $_POST['lng']);
$lat = mysqli_real_escape_string($connect, $_POST['lat']);
$coordinates = $lat . "|" . $long;
$main_address = mysqli_real_escape_string($connect, $_POST['main_address']);

//     //Housemate
$h_name = $_POST['hname'];
$h_relationship = $_POST['hrel'];
$h_mobile_number = $_POST['hnumber'];

//     //Relatives
$r_name = $_POST['rname'];
$r_relationship = $_POST['rrel'];
$r_mobile_number =$_POST['rnumber'];

$secondary_address = ucwords(mysqli_real_escape_string($connect, $_POST['secondary_add']));
$provincial_address = ucwords(mysqli_real_escape_string($connect, $_POST['provincial_add']));
$answer = mysqli_real_escape_string($connect, $_POST['yesorno']);

if ($answer === "Yes") {
    $answer .= "|". ucwords(mysqli_real_escape_string($connect, $_POST['answer']));
}


// //employee info sheet
$persona = ucwords(mysqli_real_escape_string($connect, $_POST['persona']));
$mobile = mysqli_real_escape_string($connect, $_POST['mobile']);
$landline = mysqli_real_escape_string($connect, $_POST['l_area_code']) . "-" . mysqli_real_escape_string($connect, $_POST['landline']);
$department = $_POST['department'];
$account = $_POST['account'];
$departments = "";
$accounts = "";
for ($i=0; $i < count($department); $i++) {
	if ($department[$i] === "ash") {
	    $department[$i] = "Administration/HR Support";
	} elseif ($department[$i] === "its") {
	    $department[$i] = "IT Support";
	} elseif ($department[$i] === "main") {
		 $department[$i] = "Maintenance";
	} elseif ($department[$i] === "nva") {
	    $department[$i] = "Non-Voice Account";
	} elseif ($department[$i] === "voa") {
	    $department[$i] = "Voice Account";
	} elseif ($department[$i] === "ve") {
	    $department[$i] = "Video ESL";
	} elseif ($department[$i] === "va") {
	    $department[$i] = "Virtual Assistant";
	} elseif ($department[$i] === "sec") {
		$department[$i] = "Security";
	}

	if ($i !== (count($department)-1)) {
		$departments .= $department[$i]."|";
		$accounts .= $account[$i]."|";
	}else {
		$departments .= $department[$i];
        $accounts .= $account[$i];
	}
}

$com_email = mysqli_real_escape_string($connect, $_POST['com_email']);
$e_pass = mysqli_real_escape_string($connect, $_POST['c_password']);
$skype = mysqli_real_escape_string($connect, $_POST['skype']);
$s_pass = mysqli_real_escape_string($connect, $_POST['s_password']);
$qq_num = mysqli_real_escape_string($connect, $_POST['qq_num']);
$qq_pass = mysqli_real_escape_string($connect, $_POST['qq_password']);

$birth_date = date('Y-m-d',strtotime($birth_date));

if ($elem_status == "none") {
    $elementary = "None";
} else {
    $elementary = $elem_school_name . "|" . $elem_res;
}
if ($sec_status == "none") {
    $secondary = "None";
} else {
    $secondary = $sec_school_name . "|" . $sec_res;
}
if ($col_status == "none") {
    $college = "None";
} else {
    $college = $col_school_name . "|" . $col_res;
}
if ($post_status == "none") {
    $post_grad = "None";
} else {
    $post_grad = $post_school_name . "|" . $post_res;
}

$sql = "SELECT user_id FROM user where username='$username'";
$result = $connect->query($sql);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$id = $row['user_id'];

$update_stmt = "UPDATE `user_info` SET `birth_date`='$birth_date', `birth_place`='$birth_place', `contact_number`='$contact_number',
 `facebook_link`='$facebook',`gender`='$gender', `height`=\"$height\", `weight`='$weight',`blood_type`='$blood_type',`residential_address`='$residential_address',
 `residential_zip`='$residential_zip', `residential_tel_no`='$residential_tel_no', `permanent_address`='$permanent_address',
 `permanent_zip`='$permanent_zip', `permanent_tel_no`='$permanent_tel_no', `citizenship`='$citizenship',
 `civil_status`='$civil_status', `sss_no`='$sss_no', `tin`='$tin',
 `philhealth_no`='$philhealth_no', `pagibig_id_no`='$pagibig_id_no' WHERE `user_id`='$id';";
 if ($connect->query($update_stmt) === true) {
    if ($spouse_tel_no === "-" && $spouse_first_name === "" && $spouse_middle_name === "" && $spouse_last_name === "" && $occupation === "" && $employer === "" && $business_address === "") {
        $insert_stmt = "INSERT INTO `user_background`(`user_id`,`father_first_name`,`father_middle_name`,`father_last_name`,
        `mother_first_name`,`mother_middle_name`,`mother_last_name`) VALUES ('$id','$father_first_name','$father_middle_name',
        '$father_last_name','$mother_first_name','$mother_middle_name','$mother_last_name');";
    } else {
        $insert_stmt = "INSERT INTO `user_background`(`user_id`,`spouse_first_name`,`spouse_middle_name`,`spouse_last_name`,
        `occupation`,`employer`,`business_address`,`spouse_tel_no`,`father_first_name`,`father_middle_name`,`father_last_name`,
        `mother_first_name`,`mother_middle_name`,`mother_last_name`) VALUES ('$id','$spouse_first_name','$spouse_middle_name',
        '$spouse_last_name','$occupation','$employer','$business_address','$spouse_tel_no','$father_first_name','$father_middle_name',
        '$father_last_name','$mother_first_name','$mother_middle_name','$mother_last_name');";
    }
     if ($connect->query($insert_stmt) === true) {
         $insert_stmt = "INSERT INTO `user_educ` (`user_id`,`elementary`,`secondary`,`college`,`post_grad`) VALUES ('$id','$elementary','$secondary','$college','$post_grad');";
         if ($connect->query($insert_stmt) === true) {
         } else {
             print_r($connect->error);
         }
         for ($i=0; $i < count($child_name) ; $i++) {
             if ($child_name[$i] === "" && $child_birth[$i] === "") {
                 continue;
             } else{
                 $insert_stmt = "INSERT INTO `user_offspring` (`child_name`,`child_birth_date`,`user_id`) VALUES ('$child_name[$i]','$child_birth[$i]','$id');";
                 if ($connect->query($insert_stmt) === true) {
                 } else {
                     print_r($connect->error);
                 }
             }
         }
         $insert_stmt = "INSERT INTO `emergency_info_sheet`(`user_id`,`coordinates`,`main_address`,`secondary_address`,
                         `provincial_address`,`answer`,`hmate_id`,`relative_id`) VALUES ('$id','$coordinates','$main_address',
                         '$secondary_address','$provincial_address','$answer','$id','$id');";
         if ($connect->query($insert_stmt) === true) {
            for ($i=0; $i < count($r_name); $i++) {
                if ($r_name[$i] !== "" ) {
                    $insert_stmt = "INSERT INTO `relatives` (`r_id`,`r_name`,`r_number`,`r_relationship`) VALUES ('$id','$r_name[$i]','$r_mobile_number[$i]','$r_relationship[$i]');";
                    if ($connect->query($insert_stmt) === true) {
                    } else {
                        print_r($connect->error);
                    }
                }
            }
            for ($i=0; $i < count($h_name); $i++) {
                if ($h_name[$i] !== "" ) {
                    $insert_stmt = "INSERT INTO `housemates` (`h_id`,`h_name`,`h_number`,`h_relationship`) VALUES ('$id','$h_name[$i]','$h_mobile_number[$i]','$h_relationship[$i]');";
                    if ($connect->query($insert_stmt) === true) {
                    } else {
                        print_r($connect->error);
                    }
                }
            }
            $insert_stmt = "INSERT INTO `employee_info` (`user_id`,`persona`,`mobile_number`,`landline`,`department`,`account`,`comp_email`,
                            `comp_email_password`,`skype`,`skype_password`,`qq_number`,`qq_password`) VALUES ('$id','$persona','$mobile','$landline','$departments','$accounts',
                            '$com_email','$e_pass','$skype','$s_pass','$qq_num','$qq_pass') ;";
            if ($connect->query($insert_stmt) === true) {
            } else {
                print_r($connect->error);
            }
        } else {
            print_r($connect->error);
        }
     } else {
         print_r($connect->error);
     }
 } else {
     print_r($connect->error);
 }
?>
