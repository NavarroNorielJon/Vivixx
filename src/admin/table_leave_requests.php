<html>
<head>
    <title>Leave Requests</title>
</head>
<body>
    <div id="content">
        <table class="table" id="leave">
        <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Contact Number</th>
                <th>View</th>
            </tr>
        </thead>

        <?php
        $sql = "select * from leave_req;";
        $result = $connect->query($sql);

        if($result-> num_rows > 0){
            while($row = $result->fetch_assoc()){
            $show = "
                    <input name='show' value='show' style='display: none;'>
                    <a href='show_leave_request_form.php?user_id=".$row['user_id']."& fname=".$row['first_name']."& mname=".$row['middle_name'] ."& lname=" .$row['last_name'] ."' class='show btn btn-primary'>Show more</a>";
            //print data in table
                echo "
                <tr>
                <td>" . ucwords($row['first_name']) . "</td>
                <td>" . ucwords($row['last_name']) . "</td>
                <td>" . $row['contact_number'] . "</td>
                <td>" . $show ."</td>
                </tr>";
            }
            }

        $connect-> close();
        ?>
        </table>
    </div>
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