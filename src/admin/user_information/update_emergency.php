<?php
    include '../../mis/utilities/db.php';
    $connect = Connect();

    $user_id = $_POST["userid4"];
    $sql = "SELECT * FROM emergency_info_sheet where user_id='$user_id';";
    $result = mysqli_query($connect, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

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
    if ($_POST['yesorno'] === 'none') {
        $answer = $row['answer'];
    } else {
        $answer = mysqli_real_escape_string($connect, $_POST['yesorno']);

        if ($answer === "Yes") {
            $answer .= "|". ucwords(mysqli_real_escape_string($connect, $_POST['answer']));
        }
    }
    $update_stmt = "UPDATE `emergency_info_sheet` SET `coordinates`='$coordinates',`main_address`='$main_address',`secondary_address`='$secondary_address',
                    `provincial_address`='$provincial_address',`answer`='$answer' WHERE user_id='$user_id';";
    mysqli_query($connect, $update_stmt);

    for ($i=0; $i < count($r_name); $i++) {
        $c = $i+1;
        if ($r_name[$i] !== "" ) {
            $update_stmt = "UPDATE `relatives` SET `r_name`='$r_name[$i]',`r_number`='$r_mobile_number[$i]',`r_relationship`='$r_relationship[$i]' WHERE n_id='$c';";
            mysqli_query($connect, $update_stmt);

        }
    }
    for ($i=0; $i < count($h_name); $i++) {
        $c = $i+1;
        if ($h_name[$i] !== "" ) {
            $update_stmt = "UPDATE `housemates` SET `h_name`='$h_name[$i]',`h_number`='$h_mobile_number[$i]',`h_relationship`='$h_relationship[$i]' WHERE n_id='$c';";
            mysqli_query($connect, $update_stmt);

        }

    }
