<?php
    include '../../mis/utilities/db.php';
    $connect = Connect();

    $user_id = $_POST["userid5"];
    $sql = "SELECT * FROM employee_info where user_id='$user_id';";
    $result = mysqli_query($connect, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    $persona = ucwords(mysqli_real_escape_string($connect, $_POST['persona']));
    $mobile = mysqli_real_escape_string($connect, $_POST['mobile']);
    if ($_POST['l_area_code'] == 'none') {
        $landline = $row['landline'];
    } else {
        $landline = mysqli_real_escape_string($connect, $_POST['l_area_code']) . "-" . mysqli_real_escape_string($connect, $_POST['landline']);
    }
    $department = $_POST['department'];
    $account = $_POST['account'];
    $position = mysqli_real_escape_string($connect, $_POST['position']);
    $date_hired = mysqli_real_escape_string($connect, $_POST['date_hired']);
    if(!empty($_POST["eoc"])){
        $eoc ="'" .mysqli_real_escape_string($connect,$_POST["eoc"])."'";
    }else{
        $eoc = 'NULL';
    }
    $employee_status = mysqli_real_escape_string($connect, $_POST['employee_status']);

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

    $update_stmt = "UPDATE `employee_info` SET `persona`='$persona',`mobile_number`='$mobile',`landline`='$landline',`department`='$departments',`account`='$accounts',`employee_status`='$employee_status',`position`='$position',`date_hired`='$date_hired',`end_of_contract`=$eoc,
    `comp_email`='$com_email',`comp_email_password`='$e_pass',`skype`='$skype',`skype_password`='$s_pass',`qq_number`='$qq_num',`qq_password`='$qq_pass' WHERE user_id='$user_id';";
    mysqli_query($connect, $update_stmt);
