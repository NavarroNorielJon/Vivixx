<?php
include 'utilities/db.php';
$connect = Connect();
$department = $_POST['department'];
$departments = "";
$account = "";
for ($i=0; $i < count($department); $i++) {
	if ($department[$i] === "ash") {
	    $department[$i] = "Administration/HR Support";
		$account .= $_POST['account'][$i];
	} elseif ($department[$i] === "its") {
	    $department[$i] = "IT Support";
		$account .=  $_POST['account'][$i];
	} elseif ($department[$i] === "main") {
		 $department[$i] = "Maintenance";
		 $account .= $_POST['account'][$i];
	} elseif ($department[$i] === "nva") {
	    $department[$i] = "Non-Voice Account";
		$account .= $_POST['account'][$i];
	} elseif ($department[$i] === "voa") {
	    $department[$i] = "Voice Account";
		$account .= $_POST['account'][$i];
	} elseif ($department[$i] === "ve") {
	    $department[$i] = "Video ESL";
		$account .= $_POST['account'][$i];
	} elseif ($department[$i] === "va") {
	    $department[$i] = "Virtual Assistant";
		$account .= $_POST['account'][$i];
	} elseif ($department[$i] === "sec") {
		$department[$i] = "Security";
		$account .= $_POST['account'][$i];
	}

	if ($i !== (count($department)-1)) {
		$departments .= $department[$i]."|";
		$account .= "|";
	}else {
		$departments .= $department[$i];
	}
}
echo $departments;
echo "<br>";
echo $account;

 ?>
