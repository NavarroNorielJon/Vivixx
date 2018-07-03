<?php
include 'utilities/db.php';
$connect = Connect();
$department = $_POST['department'];
$departments = "";
$account = "";

for ($i=0; $i < count($department); $i++) {

	if ($department[$i] === "ash") {
	    $department[$i] = "Administration/HR Support";
	    $account .= mysqli_real_escape_string($connect, $_POST['adminsp'])."|";
	} elseif ($department[$i] === "its") {
	    $department[$i] = "IT Support";
	    $account .=  mysqli_real_escape_string($connect, $_POST['itsupport']). "|";
	} elseif ($department[$i] === "main") {
		 $department[$i] = "Maintenance";
		 $account .=  mysqli_real_escape_string($connect, $_POST['main']). "|";
	} elseif ($department[$i] === "nva") {
	    $department[$i] = "Non-Voice Account";
	    $account .= mysqli_real_escape_string($connect, $_POST['nonvoice']). "|";
	} elseif ($department[$i] === "voa") {
	    $department[$i] = "Voice Account";
	   	$account .= mysqli_real_escape_string($connect, $_POST['voice']). "|";
	} elseif ($department[$i] === "ve") {
	    $department[$i] = "Video ESL";
	   	$account .= mysqli_real_escape_string($connect, $_POST['video']). "|";
	} elseif ($department[$i] === "va") {
	    $department[$i] = "Virtual Assistant";
	    $account .= mysqli_real_escape_string($connect, $_POST['virtual']). "|";
	} elseif ($department[$i] === "sec") {
		$department[$i] = "Security";
	   	$account .= mysqli_real_escape_string($connect, $_POST['sec']). "|";
	}

	if ($i !== (count($department)-1)) {
		$departments .= $department[$i]."|";

	}else {
		$departments .= $department[$i];
	}
}
echo $departments;
echo "<br>";
echo $account;

 ?>
