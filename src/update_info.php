<?php
include 'utilities/db.php';
include 'utilities/session.php';
$connect = Connect();


//personal information
$birth_date = mysqli_real_escape_string($connect, $_POST['birth_date']);
$birth_place = mysqli_real_escape_string($connect,$_POST['pbirth']);
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
$child_birth =$_POST['child_birth'];


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
$birthdate = date('Y-m-d',strtotime($birthdate));
// $child_birth = date('Y-m-d',strtotime($child_birth));

$insert_stmt = "UPDATE `user_info` SET `birth_date`='$birth_date', `birth_place`='$birth_place', `contact_number`='$contact_number', `gender`='$gender', `height`='$height', `weight`='$weight',
 `blood_type`='$blood_type', `residential_address`='$residential_address', `residential_zip`='$residential_zip', `residential_tel_no`='$residential_tel_no', `permanent_address`='$permanent_address',
  `permanent_zip`='$permanent_zip', `permanent_tel_no`='$permanent_tel_no', `citizenship`='$citizenship', `religion`='$religion', `civil_status`='$civil_status', `sss_no`='$sss_no', `tin`='$tin',
  `philhealth_no`='$philhealth_no', `pagibig_id_no`='$pagibig_id_no' WHERE `username`='$username';";
$sql = "SELECT FROM user_info where username='$username';"
if($connect->query($insert_stmt) === true){
    $insert_stmt = "INSERT INTO `user_background`(`bg_id`,`spouse_first_name`,`spouse_middle_name`,`spouse_last_name`,
    `occupation`,`employer`,`business_address`,`spouse_tel_no`,`father_first_name`,`father_middle_name`,`father_last_name`,
    `mother_first_name`,`mother_middle_name`,`mother_last_name`) VALUES ('null','$spouse_first_name','$spouse_middle_name',
    '$spouse_last_name','$occupation','$employer','$business_address','$spouse_tel_no','$father_first_name','$father_middle_name',
    '$father_last_name','$mother_first_name','$mother_middle_name','$mother_last_name');";
    if($connect->query($insert_stmt) === true){
        // for ($i=1; $i < count($child_name); $i++) {
        //     $insert_stmt="INSERT INTO `user_offspring` (`child_id`,`name`,`birth`) VALUES ('null','$child_name[$i]','$child_birth[$i]');";
        //     if($connect->query() === true){
        //         echo "<script>
        //                 alert('DONE!');
        //               </script>";
        //     }
        // }
        echo "<script>
                alert('DOne');
              </script>";
    }
    echo "<script>
            alert('DOne');

          </script>";
} else {
    echo "<script>
            alert('Failure');
            window.history.back();
          </script>";
}
?>
