<?php
include 'db.php';
include 'session.php';
$connect = Connect();


//personal information
$birth_date = mysqli_real_escape_string($connect, $_POST['birth_date']);
$birth_place = mysqli_real_escape_string($connect,$_POST['birth_place']);
$contact_number = mysqli_real_escape_string($connect, $_POST['contact_number']);
$gender = mysqli_real_escape_string($connect, $_POST['gender']);
$height = mysqli_real_escape_string($connect, $_POST['height']);
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
$child_name = $_POST['child_name'];
$child_birth = $_POST['child_birth'];



//Educational background
$elem_school_name = mysqli_real_escape_string($connect, $_POST['elem_school_name']);
$elem_yr_grad = mysqli_real_escape_string($connect, $_POST['elem_yr_grad']);
$elem_high_level = mysqli_real_escape_string($connect, $_POST['elem_high_level']);

$sec_school_name = mysqli_real_escape_string($connect, $_POST['sec_school_name']);
$sec_yr_grad = mysqli_real_escape_string($connect, $_POST['sec_yr_grad']);
$sec_high_level = mysqli_real_escape_string($connect, $_POST['sec_high_level']);

$col_school_name = mysqli_real_escape_string($connect, $_POST['col_school_name']);
$col_yr_grad = mysqli_real_escape_string($connect, $_POST['col_yr_grad']);
$col_high_level = mysqli_real_escape_string($connect, $_POST['col_high_level']);

$post_school_name = mysqli_real_escape_string($connect, $_POST['post_school_name']);
$post_yr_grad = mysqli_real_escape_string($connect, $_POST['post_yr_grad']);
$post_high_level = mysqli_real_escape_string($connect, $_POST['post_high_level']);

//Emergency info Sheet
$long = mysqli_real_escape_string($connect, $_POST['lng']);
$lat = mysqli_real_escape_string($connect, $_POST['lat']);
    //Housemate
$h_name1 = mysqli_real_escape_string($connect, $_POST['hname1']);
$h_mobile_number11 = mysqli_real_escape_string($connect, $_POST['mnumber11']);
$h_mobile_number12 = mysqli_real_escape_string($connect, $_POST['mnumber12']);
$h_relationship1 = mysqli_real_escape_string($connect, $_POST['hrel1']);

$h_name2 = mysqli_real_escape_string($connect, $_POST['hname2']);
$h_mobile_number21 = mysqli_real_escape_string($connect, $_POST['mnumber21']);
$h_mobile_number22 = mysqli_real_escape_string($connect, $_POST['mnumber22']);
$h_relationship2 = mysqli_real_escape_string($connect, $_POST['hrel2']);
    //Relatives
$r_name1 = mysqli_real_escape_string($connect, $_POST['rname1']);
$r_mobile_number11 = mysqli_real_escape_string($connect, $_POST['rmnumber11']);
$r_mobile_number12 = mysqli_real_escape_string($connect, $_POST['rmnumber12']);
$r_relationship1 = mysqli_real_escape_string($connect, $_POST['rrel1']);

$r_name2 = mysqli_real_escape_string($connect, $_POST['rname2']);
$r_mobile_number21 = mysqli_real_escape_string($connect, $_POST['rmnumber21']);
$r_mobile_number22 = mysqli_real_escape_string($connect, $_POST['rmnumber22']);
$r_relationship2 = mysqli_real_escape_string($connect, $_POST['rrel2']);

$secondary_address = mysqli_real_escape_string($connect, $_POST['secondary_add']);
$provincial_address = mysqli_real_escape_string($connect, $_POST['provincial_add']);

//tutor info sheet
$tutor_name = mysqli_real_escape_string($connect, $_POST['tutor_name']);
$nickname = mysqli_real_escape_string($connect, $_POST['nickname']);
$mobile = mysqli_real_escape_string($connect, $_POST['mobile']);
$landline = mysqli_real_escape_string($connect, $_POST['landline']);
$account = mysqli_real_escape_string($connect, $_POST['acc']);
$com_email = mysqli_real_escape_string($connect, $_POST['com_email']);
$e_pass = mysqli_real_escape_string($connect, $_POST['e_pass']);
$skype = mysqli_real_escape_string($connect, $_POST['skype']);
$s_pass = mysqli_real_escape_string($connect, $_POST['s_pass']);
$qq_num = mysqli_real_escape_string($connect, $_POST['qq_num']);
$qq_pass = mysqli_real_escape_string($connect, $_POST['qq_pass']);


// if (empty($username)|| empty($email) || empty($password) || empty($cpassword)) {
//     echo "
//          <script>
//              alert('You must fill up all neccessary fields.');
//              window.history.back();
//          </script>
//
//      ";
//     exit;
// }



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


$elementary = $elem_school_name . "," . $elem_yr_grad ."," . $elem_high_level;
$secondary = $sec_school_name . "," . $sec_yr_grad . "," . $sec_high_level;
$college = $col_school_name . "," . $col_yr_grad . "," . $col_high_level;
$post_grad = $post_school_name . "," . $post_yr_grad . "," . $post_high_level;

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

if($connect->query($update_stmt) === true){
    $insert_stmt = "INSERT INTO `user_background`(`bg_id`,`spouse_first_name`,`spouse_middle_name`,`spouse_last_name`,
    `occupation`,`employer`,`business_address`,`spouse_tel_no`,`father_first_name`,`father_middle_name`,`father_last_name`,
    `mother_first_name`,`mother_middle_name`,`mother_last_name`) VALUES ('$id','$spouse_first_name','$spouse_middle_name',
    '$spouse_last_name','$occupation','$employer','$business_address','$spouse_tel_no','$father_first_name','$father_middle_name',
    '$father_last_name','$mother_first_name','$mother_middle_name','$mother_last_name');";
    if($connect->query($insert_stmt) === true){
        foreach ($child_name as $value1) {
            foreach ($child_birth as $value2) {
            }
            $insert_stmt = "INSERT INTO `user_offspring` (`child_name`,`child_birth_date`,`user_id`)
                VALUES ('$value1','$value2','$id');";
            if ($connect->query($insert_stmt) === true) {
                $insert_stmt = "INSERT INTO `user_educ` (`user_id`,`elementary`,`secondary`,`college`,`post_grad`)
                    VALUES ('$id','$elementary','$secondary','$college','$post_grad');";
                if($connect->query($insert_stmt) === true){
                    $insert_stmt = "INSERT INTO `emergency_info_sheet`(`user_id`,`coordinates`,`main_address`,`secondary_address`,
                                    `provincial_address`,`hmate_id`,`relative_id`) VALUES ('$id','$coordinates','$main_address','$secondary_address','$provincial_address','$id','$id');";
                    if ($connect->query($insert_stmt) === true) {
                        $insert_stmt = "INSERT INTO `housemates`(`h_id`,`h_name`,`h_mobile_number`,`h_relationship`) VALUES ('$id','$h_name','$h_mobile_number','$h_relationship');";
                        if ($connect->query($insert_stmt) === true) {
                            $insert_stmt = "INSERT INTO `relatives`(`r_id`,`r_name`,`h_mobile_number`,`r_relationship`) VALUES ('$id','$r_name','$r_mobile_number','$r_relationship');";
                        } else {
                            echo "<script>
                                    alert('error');
                                    window.history.back();
                                  </script>";
                                  exit;
                        }
                    } else {
                        echo "<script>
                                alert('error');
                                window.history.back();
                              </script>";
                              exit;
                    }
                    echo "<script>
                            window.location = '/';
                          </script>";
                          exit;
                }else {
                    echo "<script>
                            alert('error');
                            window.history.back();
                          </script>";
                          exit;
                }
            } else {
                echo "<script>
                        alert('error');
                        window.history.back();
                      </script>";
                      exit;
            }
            echo "<script>
                    window.location = '/';
                  </script>";
                  exit;
        }
        echo "<script>
                window.location = '/';
              </script>";
              exit;
    }else {
        echo "<script>
                alert('error');
                window.history.back();
              </script>";
              exit;
    }
} else {


    echo "<script>
            alert('Failure');
            window.history.back();
          </script>";
          exit;
}
?>
