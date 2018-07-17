<?php
    include '../../utilities/db.php';
    $connect = Connect();

    $user_id = $_POST["userid3"];
    $sql = "SELECT * FROM user_educ where user_id='$user_id';";
    $result = mysqli_query($connect, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    $elem_school_name = ucwords(mysqli_real_escape_string($connect, $_POST['elem_school_name']));
    $elem_status = mysqli_real_escape_string($connect, $_POST['option1']);

    if ($elem_status === "g1") {
        $elem_status = "Graduate";
        if (!empty($_POST['elem_old_yr'])) {
            $elem_res = ucwords(mysqli_real_escape_string($connect, $_POST['elem_old_yr']));
        } else{
            $elem_res = ucwords(mysqli_real_escape_string($connect, $_POST['elem_yr_grad']));
        }
    } elseif ($elem_status === "u1") {
        $elem_status = "Undergraduate";
        if (!empty($_POST['elem_old_level'])) {
            $elem_res = ucwords(mysqli_real_escape_string($connect, $_POST['elem_old_level']));
        } else {
            $elem_res = ucwords(mysqli_real_escape_string($connect, $_POST['elem_high_level']));
        }
    } else {
        if ($elem_status === "Graduate") {
            $elem_res = ucwords(mysqli_real_escape_string($connect, $_POST['elem_old_yr']));
        } elseif ($elem_status === "Undergraduate") {
            $elem_res = ucwords(mysqli_real_escape_string($connect, $_POST['elem_old_level']));
        }
    }

    $sec_school_name = ucwords(mysqli_real_escape_string($connect, $_POST['sec_school_name']));
    $sec_status = mysqli_real_escape_string($connect, $_POST['option2']);

    if ($sec_status === "g2") {
        $sec_status = "Graduate";
        if (!empty($_POST['sec_old_yr'])) {
            $sec_res = ucwords(mysqli_real_escape_string($connect, $_POST['sec_old_yr']));
        } else{
            $sec_res = ucwords(mysqli_real_escape_string($connect, $_POST['sec_yr_grad']));
        }
    } elseif ($sec_status === "u2") {
        $sec_status = "Undergraduate";
        if (!empty($_POST['sec_old_level'])) {
            $sec_res = ucwords(mysqli_real_escape_string($connect, $_POST['sec_old_level']));
        } else {
            $sec_res = ucwords(mysqli_real_escape_string($connect, $_POST['sec_high_level']));
        }
    } else {
        if ($sec_status === "Graduate") {
            $sec_res = ucwords(mysqli_real_escape_string($connect, $_POST['sec_old_yr']));
        } elseif ($sec_status === "Undergraduate") {
            $sec_res = ucwords(mysqli_real_escape_string($connect, $_POST['sec_old_level']));
        }
    }

    $col_school_name = ucwords(mysqli_real_escape_string($connect, $_POST['col_school_name']));
    $col_status = mysqli_real_escape_string($connect, $_POST['option3']);

    if ($col_status === "g3") {
        $col_status = "Graduate";
        if (!empty($_POST['col_old_yr'])) {
            $col_res = ucwords(mysqli_real_escape_string($connect, $_POST['col_old_yr']));
        } else{
            $col_res = ucwords(mysqli_real_escape_string($connect, $_POST['col_yr_grad']));
        }
    }elseif ($col_status === "u3") {
        $col_status = "Undergraduate";
        if (!empty($_POST['col_old_level'])) {
            $col_res = ucwords(mysqli_real_escape_string($connect, $_POST['col_old_level']));
        } else {
            $col_res = ucwords(mysqli_real_escape_string($connect, $_POST['col_high_level']));
        }
    } else {
        if ($col_status === "Graduate") {
            $col_res = ucwords(mysqli_real_escape_string($connect, $_POST['col_old_yr']));
        } elseif ($col_status === "Undergraduate") {
            $col_res = ucwords(mysqli_real_escape_string($connect, $_POST['col_old_level']));
        }
    }

    $post_school_name = ucwords(mysqli_real_escape_string($connect, $_POST['pos_school_name']));
    $post_status = mysqli_real_escape_string($connect, $_POST['option4']);

    if ($post_status === "g4") {
        $post_status = "Graduate";
        if (!empty($_POST['post_old_yr'])) {
            $post_res = ucwords(mysqli_real_escape_string($connect, $_POST['post_old_yr']));
        } else{
            $post_res = ucwords(mysqli_real_escape_string($connect, $_POST['pos_yr_grad']));
        }
    }elseif ($post_status === "u4") {
        $post_status = "Undergraduate";
        if (!empty($_POST['pos_old_level'])) {
            $post_res = ucwords(mysqli_real_escape_string($connect, $_POST['pos_old_level']));
        } else {
            $post_res = ucwords(mysqli_real_escape_string($connect, $_POST['pos_high_level']));
        }
    } else {
        if ($post_status === "Graduate") {
            $post_res = ucwords(mysqli_real_escape_string($connect, $_POST['pos_old_yr']));
        } elseif ($post_status === "Undergraduate"){
            $post_res = ucwords(mysqli_real_escape_string($connect, $_POST['pos_old_level']));
        }
    }

    if ($elem_status == "None") {
        $elementary = "None|None|None";
    } else {
        $elementary = $elem_school_name . "|" . $elem_status . "|". $elem_res;
    }
    if ($sec_status == "None") {
        $secondary = "None|None|None";
    } else {
        $secondary = $sec_school_name . "|". $sec_status . "|" . $sec_res;
    }
    if ($col_status == "None") {
        $college = "None|None|None";
    } else {
        $college = $col_school_name . "|" . $col_status . "|" . $col_res;
    }
    if ($post_status == "None") {
        $post_grad = "None|None|None";
    } else {
        $post_grad = $post_school_name . "|" . $post_status . "|" . $post_res;
    }

    $update_stmt = "UPDATE `user_educ` SET `elementary`='$elementary',`secondary`='$secondary',`college`='$college',`post_grad`='$post_grad' WHERE user_id='$user_id';";
    if (mysqli_query($connect, $update_stmt) === true) {
    } else {
        echo $connect->error;
    }
?>
