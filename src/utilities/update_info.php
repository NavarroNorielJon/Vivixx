<?php
include 'mis/session.php';
$connect = Connect();


//personal information
$birth_date = mysqli_real_escape_string($connect, $_POST['birth_date']);
$birth_place = ucwords(mysqli_real_escape_string($connect,$_POST['birth_place']));
$contact_number = mysqli_real_escape_string($connect, $_POST['contact_number']);
if (!empty($_POST['facebook'])) {
    $facebook ="'" . mysqli_real_escape_string($connect, $_POST['facebook'])."'";
} else {
    $facebook = 'NULL';
}
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

if (!empty($_POST['sss_no'])) {
    $sss_no ="'" . mysqli_real_escape_string($connect, $_POST['sss_no'])."'";
} else {
    $sss_no = 'NULL';
}
if (!empty($_POST['tin'])) {
    $tin ="'" . mysqli_real_escape_string($connect, $_POST['tin'])."'";
} else {
    $tin = 'NULL';
}
if (!empty($_POST['philhealth_no'])) {
    $philhealth_no ="'" . mysqli_real_escape_string($connect, $_POST['philhealth_no'])."'";
} else {
    $philhealth_no = 'NULL';
}
if (!empty($_POST['pagibig_id_no'])) {
    $pagibig_id_no ="'" . mysqli_real_escape_string($connect, $_POST['pagibig_id_no'])."'";
} else {
    $pagibig_id_no = 'NULL';
}
//family background
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


// //Educational background
$elem_status = mysqli_real_escape_string($connect, $_POST['option1']);
if ($elem_status === "g1") {
    $elem_status = "Graduate";
    $elem_school_name = ucwords(mysqli_real_escape_string($connect, $_POST['elem_school_name']));
    $elem_res = ucwords(mysqli_real_escape_string($connect, $_POST['elem_yr_grad']));
    $elementary = $elem_school_name . "|" . $elem_status . "|". $elem_res;
} elseif ($elem_status === "u1") {
    $elem_status = "Undergraduate";
    $elem_school_name = ucwords(mysqli_real_escape_string($connect, $_POST['elem_school_name']));
    $elem_res = ucwords(mysqli_real_escape_string($connect, $_POST['elem_yr_grad']));
    $elementary = $elem_school_name . "|" . $elem_status . "|". $elem_res;
} else{
    $elementary = "None|None|None";
}

$sec_status = mysqli_real_escape_string($connect, $_POST['option2']);
if ($sec_status === "g2") {
    $sec_status = "Graduate";
    $sec_school_name = ucwords(mysqli_real_escape_string($connect, $_POST['sec_school_name']));
    $sec_res = ucwords(mysqli_real_escape_string($connect, $_POST['sec_yr_grad']));
    $secondary = $sec_school_name . "|". $sec_status . "|" . $sec_res;
} elseif ($sec_status === "u2") {
    $sec_status = "Undergraduate";
    $sec_school_name = ucwords(mysqli_real_escape_string($connect, $_POST['sec_school_name']));
    $sec_res = ucwords(mysqli_real_escape_string($connect, $_POST['sec_yr_grad']));
    $secondary = $sec_school_name . "|". $sec_status . "|" . $sec_res;
}else{
    $secondary = "None|None|None";
}

$col_status = mysqli_real_escape_string($connect, $_POST['option3']);
if ($col_status === "g3") {
    $col_status = "Graduate";
    $col_school_name = ucwords(mysqli_real_escape_string($connect, $_POST['col_school_name']));
    $col_res = ucwords(mysqli_real_escape_string($connect, $_POST['col_yr_grad']));
    $college = $col_school_name . "|" . $col_status . "|" . $col_res;
}elseif ($col_status === "u3") {
    $col_status = "Undergraduate";
    $col_school_name = ucwords(mysqli_real_escape_string($connect, $_POST['col_school_name']));
    $col_res = ucwords(mysqli_real_escape_string($connect, $_POST['col_yr_grad']));
    $college = $col_school_name . "|" . $col_status . "|" . $col_res;
}else {
    $college = "None|None|None";
}

$post_status = mysqli_real_escape_string($connect, $_POST['option4']);
if ($post_status === "g4") {
    $post_status = "Graduate";
    $post_school_name = ucwords(mysqli_real_escape_string($connect, $_POST['pos_school_name']));
    $post_res = ucwords(mysqli_real_escape_string($connect, $_POST['pos_yr_grad']));
    $post_grad = $post_school_name . "|" . $post_status . "|" . $post_res;
}elseif ($post_status === "u4") {
    $post_status = "Undergraduate";
    $post_school_name = ucwords(mysqli_real_escape_string($connect, $_POST['pos_school_name']));
    $post_res = ucwords(mysqli_real_escape_string($connect, $_POST['pos_yr_grad']));
    $post_grad = $post_school_name . "|" . $post_status . "|" . $post_res;
}else {
    $post_grad = "None|None|None";
}

// //Emergency info Sheet
$long = mysqli_real_escape_string($connect, $_POST['lng']);
$lat = mysqli_real_escape_string($connect, $_POST['lat']);
$coordinates = $lat . "|" . $long;
$main_address = ucwords(mysqli_real_escape_string($connect, $_POST['main_address']));

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
$answer = ucwords(mysqli_real_escape_string($connect, $_POST['yesorno']));

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




$sql = "SELECT user_id FROM user where username='$username'";
$result = $connect->query($sql);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$id = $row['user_id'];

$update_stmt = "UPDATE `user_info` SET `birth_date`='$birth_date', `birth_place`='$birth_place', `contact_number`='$contact_number',
 `facebook_link`=$facebook,`gender`='$gender', `height`=\"$height\", `weight`='$weight',`blood_type`='$blood_type',`residential_address`='$residential_address',
 `residential_zip`='$residential_zip', `residential_tel_no`='$residential_tel_no', `permanent_address`='$permanent_address',
 `permanent_zip`='$permanent_zip', `permanent_tel_no`='$permanent_tel_no', `citizenship`='$citizenship',
 `civil_status`='$civil_status', `sss_no`=$sss_no, `tin`=$tin,
 `philhealth_no`=$philhealth_no, `pagibig_id_no`=$pagibig_id_no WHERE `user_id`='$id';";
 if ($connect->query($update_stmt) === true) {
    if ($spouse_first_name === "" && $spouse_middle_name === "" && $spouse_last_name === "" && $occupation === "" && $employer === "" && $business_address === "") {
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
             $child_name[$i] = ucwords($child_name[$i]);
             if ($child_name[$i] === "" && $child_birth[$i] === "") {
                 continue;
             } else{
                 $c = $i+1;
                 $insert_stmt = "INSERT INTO `user_offspring` (`n_id`,`child_name`,`child_birth_date`,`user_id`) VALUES ('$c','$child_name[$i]','$child_birth[$i]','$id');";
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
                $r_name[$i] = ucwords($r_name[$i]);
                $c = $i + 1;
                if ($r_name[$i] !== "" ) {
                    $insert_stmt = "INSERT INTO `relatives` (`r_id`,`r_name`,`r_number`,`r_relationship`,`n_id`) VALUES ('$id','$r_name[$i]','$r_mobile_number[$i]','$r_relationship[$i]','$c');";
                    if ($connect->query($insert_stmt) === true) {
                    } else {
                        print_r($connect->error);
                    }
                } else {
                    $insert_stmt = "INSERT INTO `relatives` (`r_id`,`r_name`,`r_number`,`r_relationship`,`n_id`) VALUES ('$id',NULL,NULL,NULL,'$c');";
                    if ($connect->query($insert_stmt) === true) {
                    } else {
                        print_r($connect->error);
                    }
                }
            }
            for ($i=0; $i < count($h_name); $i++) {
                $h_name[$i] = ucwords($h_name[$i]);
                $c = $i + 1;
                if ($h_name[$i] !== "" ) {
                    $insert_stmt = "INSERT INTO `housemates` (`h_id`,`h_name`,`h_number`,`h_relationship`,`n_id`) VALUES ('$id','$h_name[$i]','$h_mobile_number[$i]','$h_relationship[$i]','$c');";
                    if ($connect->query($insert_stmt) === true) {
                    } else {
                        print_r($connect->error);
                    }
                } else {
                    $insert_stmt = "INSERT INTO `housemates` (`h_id`,`h_name`,`h_number`,`h_relationship`,`n_id`) VALUES ('$id',NULL,NULL,NULL,'$c');";
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
