<!DOCTYPE html>
<html>
<head>
	<title>Vivixx</title>
	<meta charset="utf-8">
	<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
	<link type="text/css" rel="stylesheet" href="../style/bootstrap/bootstrap.min.css" media="screen, projection">
    <link type="text/css" rel="stylesheet" href="../style/style.css" media="screen, projection">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
	
<body style="background-color:white !important;";>
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
			$sql = "select * from user_info natural join user;";
			$result = $connect->query($sql);
			
			if($result-> num_rows > 0){
    			while($row = $result->fetch_assoc()){
        			if($row["gender"] === "m"){
            			$gender = "Male";
        			}else{
            			$gender = "Female";
        	}

        	$show = "
        			<input name='show' value='show' style='display: none;'>
        			<a href='#!' data-toggle='modal' data-target='#1st'><input class='btn btn-warning' type='submit' value='show more'></a>";
        	
			//print data in table
        	echo "
        		<form action='show_all' method='POST'>
					<tr>
						<td>" . ucwords($row['first_name']) . "</td>
						<td>" . ucwords($row['last_name']) . "</td>
						<td>" . $gender . "</td>
						<td>" . $row['residential_address'] . "</td>
						<td>" . $row['contact_number'] . "</td>
						<td>" . $row['email'] . "</td>
						<td>" . $show ."</td>
					</tr>
        		</form>";
    }

}else{
    echo "database has no query";
}
$connect-> close();
?>
</table>
	
	<div class="modal fade" id="1st" tabindex="-1" role="dialog" >
	<div class="modal-dialog" role="document" style="min-width: 130vh; max-width: 130vh;">
        <div class="modal-content">
            <!-- <div class="modal-header">
				<?php
					
				?>
            </div> -->

            <div class="modal-body" >
            	
				<?php
					include 'update_information.php';
				?>
				
            </div>
        </div>
    </div>
</div>		
  		<script type="text/javascript" src="../script/ajax.js"></script>
        <script type="text/javascript" src="../script/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="../script/popper.min.js"></script>
        <script type="text/javascript" src="../script/bootstrap/bootstrap.min.js"></script>
		<script type="text/javascript" src="../script/sweetalert.min.js"></script>
</body>	
</html>
