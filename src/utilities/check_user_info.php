<?php
	if( $birth_date == null && $birth_place == null && $contact_number == null &&
	   $gender == null && $height == null && $weight == null && $blood_type == null && $residential_address == null && $residential_zip == null && $residential_tel_no == null && $permanent_address == null && $permanent_zip == null && $permanent_tel_no == null && $citizenship == null
		&& $civil_status == null && $sss_no == null && $tin == null && $philhealth_no == null && $pagibig_id_no == null) {
	header("location:/pages/update_information");
	} 
?>
