<!DOCTYPE html>
<html>
<head>
	<title>Vivixx PH</title> 
</head>
	
<body>
	<table class="table" id="table">
  		<thead>
    		<tr>
        		<th>First Name</th>
        		<th>Last Name</th>
        		<th>Gender</th>
        		<th>Address</th>
        		<th>Contact Number</th>
        		<th>Email</th>
        		<th>Edit or View data</th>
    		</tr>
  		</thead>
		
		<?php
		include '../../utilities/session.php';
			$sql = "select * from user_info natural join user where type='user';";
			$result = $connect->query($sql);
			if($result-> num_rows > 0){
    			while($row = $result->fetch_assoc()){
        			if($row["gender"] === "m"){
            			$gender = "Male";
        			}else if($row["gender"] === "f"){
            			$gender = "Female";
        			}else{
						$gender = "Not set";
					}
					if(!isset($row["residential_address"])){
						$address = "Not set";
					}else{
						$address = $row["residential_address"];
					}
					if(!isset($row["contact_number"])){
						$contact = "Not set";
					}else{
						$contact = $row["contact_number"];
					}

        	$show = "
        			<input name='show' value='show' style='display: none;'>
        			<a href='view_information.php?user_id=".$row['user_id']."& fname=".$row['first_name']."& mname=".$row['middle_name'] ."& lname=" .$row['last_name'] ."' class='show btn btn-primary'>Show more</a>";
        	
			//print data in table
        	echo "
					<tr>
						<td>" . ucwords($row['first_name']) . "</td>
						<td>" . ucwords($row['last_name']) . "</td>
						<td>" . $gender . "</td>
						<td>" . $address . "</td>
						<td>" . $contact . "</td>
						<td>" . $row['email'] . "</td>
						<td>" . $show ."</td>
					</tr>";
    }

}
$connect-> close();
?>
</table>
	
	<div id="result">
	</div>		
		<script>
			$(document).ready(function(){
				$('.show').click(function(e){
					e.preventDefault();
					$.ajax({
						url: $(this).attr('href'),
						success: function(res){
							$('#result').html(res);
						}
					});
				});
			});
		</script>
</body>	
</html>
