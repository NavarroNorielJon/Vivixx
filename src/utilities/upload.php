<?php
	include 'session.php';
	$directory = "../img/profile-images";
	$file = $directory . basename($_FILES["prof-image"]["name"]);
	$uploadSuccess = 1;
	$fileType = strtolower(pathinfo($file,PATHINFO_EXTENSION));

	if(isset($_POST["submit"])) {
		$verify = getimagesize($_FILES["prof-image"]["tmp_name"]);

		if($verify != false) {
			echo "<script>alert('File Successfully Uploaded');</script>";
			$uploadSuccess = 1;
		} else {
			echo "<script>alert('File upload failed');</script>";
			$uploadSuccess = 0;
		}
	}
?>