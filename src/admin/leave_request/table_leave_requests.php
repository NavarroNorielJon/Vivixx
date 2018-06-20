<?php include '../../utilities/session.php'; ?> 
<!DOCTYPE html>
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
                <th>Middle Name</th>
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
                $fname = explode(",",$row["employee"])[0];
                $mname = explode(",",$row["employee"])[1];
                $lname = explode(",",$row["employee"])[2];
            $show = "
                    <input name='show' value='show' style='display: none;'>
                    <a href='view_leave_request_form.php?user_id=".$row['user_id']."&req_id=".$row['leave_req_id']."&fname=".$fname."&mname=".$mname."&lname=".$lname."'   class='show btn btn-primary'>Show more</a>";
            //print data in table
                echo "
                <tr>
                <td>" . ucwords($fname) . "</td>
                <td>" . ucwords($mname) . "</td>
                <td>" . ucwords($lname) . "</td>
                <td>" . $row['contact_number'] . "</td>
                <td>" . $show ."</td>
                </tr>";
            }
            }

        $connect-> close();
        ?>
        </table>
    </div>
    <div id="result"></div>		
		
	<!-- Script for showing the show more content inside a modal -->
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