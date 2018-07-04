<?php
include 'utilities/db.php';
$connect = Connect();
$department = $_POST['department'];
$departments = "";
$account = "";
for ($i=0; $i < count($department); $i++) {

	if ($department[$i] === "ash") {
	    $department[$i] = "Administration/HR Support";

		if ($i == (count($department)-1)) {
			$account .= $_POST['ash'][$i];
		}else{
			$account .= $_POST['ash'][$i]."|";
		}

	} elseif ($department[$i] === "its") {
	    $department[$i] = "IT Support";
		if ($i == (count($department)-1)) {
			$account .=  $_POST['itsupport'][$i];
		}else{
			$account .=  $_POST['itsupport'][$i] . "|";
		}

	} elseif ($department[$i] === "main") {
		 $department[$i] = "Maintenance";
		 if ($i == (count($department)-1)) {
			 $account .= $_POST['main'][$i];
		 }else{
			 $account .= $_POST['main'][$i]. "|";
		 }

	} elseif ($department[$i] === "nva") {
	    $department[$i] = "Non-Voice Account";
		if ($i == (count($department)-1)) {
			$account .= $_POST['nonvoice'][$i];
		}else{
			$account .= $_POST['nonvoice'][$i]. "|";
		}

	} elseif ($department[$i] === "voa") {
	    $department[$i] = "Voice Account";
		if ($i == (count($department)-1)) {
			$account .= $_POST['voice'][$i];
		}else{
			$account .= $_POST['voice'][$i]. "|";
		}

	} elseif ($department[$i] === "ve") {
	    $department[$i] = "Video ESL";
		if ($i == (count($department)-1)) {
			echo $i;
			print_r($department);
			print_r($_POST['video']);
			$account .= $_POST['video'][$i];
		}else{
			$account .= $_POST['video'][$i]. "|";
		}

	} elseif ($department[$i] === "va") {
	    $department[$i] = "Virtual Assistant";
		if ($i == (count($department)-1)) {
			$account .= $_POST['virtual'][$i];
		}else{
			$account .= $_POST['virtual'][$i]. "|";
		}
	} elseif ($department[$i] === "sec") {
		$department[$i] = "Security";
		if ($i == (count($department)-1)) {
			$account .= $_POST['sec'][$i];
		}else{
			$account .= $_POST['sec'][$i]. "|";
		}

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
