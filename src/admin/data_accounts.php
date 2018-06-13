<!DOCTYPE html>
<html>
<head>
	<title>Vivixx</title>
    
</head>
	
<body style="background-color:white !important;";>
<table class="table" id="table">
  <thead>
    <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Username</th>
        <th>Email</th>
        <th>Status</th>
        <th>Action</th>
    </tr>
  </thead>

    <?php
    include '../utilities/session.php';
    $sql = "select username, email, first_name, last_name,status from user natural join user_info;";
    $result = $connect->query($sql);

    if($result-> num_rows > 0){
        $counter = 0;
        while($row = $result->fetch_assoc()){
          //enable or disable button
          if($row["status"] === "enabled"){
            $button = "
            <input name='disable' value='Disable' style='display: none;'>
            <a href='update_status.php?disable=".$row['status']."& username=".$row['username']."' class='show btn btn-danger'>Disable</a>";
          }else{
            $button = "
            <input name='enable' value='Enable' style='display: none;'>
            <a href='update_status.php?enable=".$row['status']."& username=".$row['username']."' class='show btn btn-success'>Enable</a>";
          }
          //print data in table
            echo "
            <tr>
            <td>" . ucwords($row['first_name']) . "</td>
            <td>" . ucwords($row['last_name']) . "</td>
            <td>" . $row['username'] . "</td>
            <td>" . $row['email'] . "</td>
            <td>" . $row['status'] . "</td>
            <td>
             ".$button."</td>
            </tr>";
          }
        }else {
         echo "database has no query";
    }

    $connect-> close();
    ?>
  </table>

  <div id="result1">
	</div>		
		<script>
			$(document).ready(function(){
				$('.show').click(function(e){
					e.preventDefault();
					$.ajax({
						url: $(this).attr('href'),
						success: function(res){
							$('#result1').html(res);
						}
					});
				});
			});
		</script>
 </body>
</html>
