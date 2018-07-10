<?php
    include '../../utilities/db.php';
    $connect = Connect();

    $user_id = $_POST["userid"];
    $sql = "SELECT * FROM user_educ where user_id='$user_id';";
    $result = mysqli_query($connect, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    $elem_school_name = ucwords(mysqli_real_escape_string($connect, $_POST['elem_school_name']));
    $elem_status = mysqli_real_escape_string($connect, $_POST['option1']);

    if ($elem_status === "g1") {
        $elem_status = "Graduate";
        $elem_res = ucwords(mysqli_real_escape_string($connect, $_POST['elem_yr_grad']));
    } else {
        $elem_status = "Undergraduate";
        $elem_res = ucwords(mysqli_real_escape_string($connect, $_POST['elem_high_level']));
    }

    $sec_school_name = ucwords(mysqli_real_escape_string($connect, $_POST['sec_school_name']));
    $sec_status = mysqli_real_escape_string($connect, $_POST['option2']);

    if ($sec_status === "g2") {
        $sec_status = "Graduate";
        $sec_res = ucwords(mysqli_real_escape_string($connect, $_POST['sec_yr_grad']));
    } else {
        $sec_status = "Undergraduate";
        $sec_res = ucwords(mysqli_real_escape_string($connect, $_POST['sec_high_level']));
    }

    $col_school_name = ucwords(mysqli_real_escape_string($connect, $_POST['col_school_name']));
    $col_status = mysqli_real_escape_string($connect, $_POST['option3']);

    if ($col_status === "g3") {
        $col_status = "Graduate";
        $col_res = ucwords(mysqli_real_escape_string($connect, $_POST['col_yr_grad']));
    }else {
        $col_status = "Undergraduate";
        $col_res = ucwords(mysqli_real_escape_string($connect, $_POST['col_high_level']));
    }

    $post_school_name = ucwords(mysqli_real_escape_string($connect, $_POST['pos_school_name']));
    $post_status = mysqli_real_escape_string($connect, $_POST['option4']);

    if ($post_status === "g4") {
        $post_status = "Graduate";
        $post_res = ucwords(mysqli_real_escape_string($connect, $_POST['pos_yr_grad']));
    }else {
        $post_status = "Undergraduate";
        $post_res = ucwords(mysqli_real_escape_string($connect, $_POST['pos_high_level']));
    }

    if ($elem_status == "none") {
        $elementary = "None|None|None";
    } else {
        $elementary = $elem_school_name . "|" . $elem_status . "|". $elem_res;
    }
    if ($sec_status == "none") {
        $secondary = "None|None|None";
    } else {
        $secondary = $sec_school_name . "|". $sec_status . "|" . $sec_res;
    }
    if ($col_status == "none") {
        $college = "None|None|None";
    } else {
        $college = $col_school_name . "|" . $col_status . "|" . $col_res;
    }
    if ($post_status == "none") {
        $post_grad = "None|None|None";
    } else {
        $post_grad = $post_school_name . "|" . $post_status . "|" . $post_res;
    }

    $update_stmt = "UPDATE `user_educ` SET `elementary`='$elementary',`secondary`='$secondary',`college`='$college',`post_grad`='$post_grad' WHERE user_id='$user_id';";
    if (mysqli_query($connect, $update_stmt) === true) {
        echo $update_stmt;
    } else {
        echo $connect->error;
    }
?>
