<?php
	include 'session.php';
	$connect = Connect();
	$directory = "../img/profile-images/";
	$file_name = $_FILES["prof-image"]["name"];
	$file_tmp = $_FILES["prof-image"]["tmp_name"];
	$uploadSuccess = 1;
	$fileType = strtolower(pathinfo($file_tmp,PATHINFO_EXTENSION));
	$data = base64_decode(file_get_contents($file_tmp));


	if(isset($_POST["submit"])) {
		$verify = getimagesize($_FILES["prof-image"]["tmp_name"]);
		$stmt = "INSERT INTO user_info (`profile_image`) VALUES ('$data')";
		$result = mysqli_query($connect, $stmt);

		if($verify != false) {
				echo "<script>alert('Lahat kayo matalino!');</script>";
			// move_uploaded_file($_FILES["prof-image"]['tmp_name'],$file);
		} else {
			echo "<script>alert('File upload failed');</script>";
			$uploadSuccess = 0;
		}
	}


?>