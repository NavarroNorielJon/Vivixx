<?php
include 'utilities/db.php';
$connect = Connect();
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
echo $departments;
echo "<br>";
echo $accounts;

 ?>
