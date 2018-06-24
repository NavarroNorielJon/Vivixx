<?php
 	include 'session.php';

	$connect = Connect();
	if (isset($_POST['upload'])) {
		$file = base64_encode(file_get_contents($_FILES['image']['tmp_name']));
		$sql = "UPDATE `user_info` SET `prof_image`='$file' where user_id='$user_id'";
		if ($_FILES['image']['size'] < 800000) {
			if ($connect->query($sql) === true) {
				echo "<script>
						window.location = '../pages/profile';
					  </script>";
			} else {
				echo "<script>
						alert('Error uploading');
						window.location = '../pages/profile';
					  </script>";
			}
		}else {
			echo "<script>
					alert('Your file is too large');
					window.location = '../pages/profile';
				  </script>";
		}

	} else {
		echo "<script>
				alert('$connect->error');
				window.location = '../pages/profile';
			  </script>";
	}


?>
