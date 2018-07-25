<script type="text/javascript" src="../script/sweetalert.min.js"></script>

<script>
	$(document).ready(function() {
		$('.salary').click(function(e) {
			e.preventDefault();
			$.ajax({
				url: $(this).attr('href'),
				success: function(res) {
					$('#salary_form').html(res);
				}
			});
		});
	});

</script>

<?php
	$sql = "SELECT * from notification WHERE status='new' and user_id='$user_id';";
	$result = $connect->query($sql);
    $row = mysqli_fetch_array($results, MYSQLI_ASSOC);
	$count = mysqli_num_rows($result);
	$stmt= "SELECT * FROM employee_info WHERE user_id='$user_id';";
	$res = mysqli_query($connect,$stmt);
	$row1 = mysqli_fetch_array($res, MYSQLI_ASSOC);
	$date_hired = $row1['date_hired'];
	$today = date("Y-m-d");
    $diff = date_diff(date_create($date_hired),date_create($today))->y;

?>
	<nav class="sidebar">
		<div class="sidebar-header">
			<a class="sidebar-logo" href="home" tabindex="-1"><img src="../img/Lion.png"></a>
		</div>

		<!-- Sidebar Links -->

		<ul class="nav flex-column">
			<li id="profile" class="nav-item">
				<a href="profile" class="nav-link sidebar-item">
                	<i class="material-icons">person</i>
                	<?php echo $first_name?>
				</a>
				<a href="profile" class="icon">
                <i class="material-icons">person</i>
            </a>
			</li>

			<li id="home" class="nav-item ">
				<a href="home" class="nav-link sidebar-item ">
                <i class="material-icons">home</i>Home</a>
				<a class="icon" href="home">
                <i class="material-icons">home</i>
            </a>
			</li>

			<li id="notif" class="nav-item">
				<a href="notification" class="nav-link sidebar-item">
					<?php
					if($count > 0){
						echo"
						<i class='material-icons'>mail</i>Notifications ($count)</a>
						<a class='icon' href='notification'>
                		<i class='material-icons'>mail</i>
						";
					}else {
						echo"
						<i class='material-icons'>mail</i>Notifications</a>
						<a class='icon' href='notification'>
                		<i class='material-icons'>mail</i>
						";
					}

				?>
				</a>
			</li>

			<li class="nav-item">
				<a href="#requests" data-toggle="collapse" class="sidebar-item" aria-expanded="false">
                <i class="material-icons">work</i>
                Requests</a>
				<a href="#requests" data-toggle="collapse" class="icon" aria-expanded="false">
                <i class="material-icons">work</i>
            </a>
				<ul class="collapse list-unstyled" id="requests">

					<?php
					if($diff>=1 && $date_hired != ""){
						echo '
							<li class="active">
								<input name="edit" value="salary" style="display: none;">
								<a href="fragments/salary_request" data-target="#salary" class="nav-link sidebar-item salary">Salary Request</a>
							</li>
							<li class="active">
								<a href="leave_request_form" class="nav-link sidebar-item">Leave Request</a>
							</li>

							<li class="active">
								<input name="edit" value="salary" style="display: none;">
								<a href="fragments/salary_request" data-target="#salary" class="icon">SR</a>
							</li>
							<li class="active">
								<a href="leave_request_form" class="icon">LR</a>
							</li>
						';
					} else {
						echo '
						<li class="active">
							<input name="edit" value="salary" style="display: none;">
							<a href="fragments/salary_request" data-target="#salary" class="nav-link sidebar-item salary">Salary Request</a>
						</li>
						<li class="active">
							<a onclick="leave()" class="nav-link sidebar-item">Leave Request</a>
						</li>

						<li class="active">
							<input name="edit" value="salary" style="display: none;">
							<a href="fragments/salary_request" data-target="#salary" class="icon">SR</a>
						</li>
						<li class="active">
							<a onclick="leave()" class="icon">LR</a>
						</li>
						';
						// echo '
						// 	<li class="active">
						// 		<input name="edit" value="salary" style="display: none;">
						// 		<a href="fragments/salary_request" data-target="#salary" class="nav-link sidebar-item salary">Salary Request</a>
						// 	</li>
						// 	<li class="active">
						// 		<a href="leave_request_form" class="nav-link sidebar-item">Leave Request</a>
						// 	</li>
						//
						// 	<li class="active">
						// 		<input name="edit" value="salary" style="display: none;">
						// 		<a href="fragments/salary_request" data-target="#salary" class="icon">SR</a>
						// 	</li>
						// 	<li class="active">
						// 		<a href="leave_request_form" class="icon">LR</a>
						// 	</li>
						// ';
					}
					?>
				</ul>
			</li>
			<hr>
			<li>
				<a href="../utilities/logout" class="nav-link sidebar-item logout">
                <i class="material-icons">power_settings_new</i>
                Logout
            </a>
				<a class="icon" href="../utilities/logout">
                <i class="material-icons">power_settings_new</i>
            </a>
			</li>
		</ul>
	</nav>
	<div id="salary_form"></div>
	<script>
		function leave() {
			swal({
				type: 'info',
				title: "Please Stay for at least one year.",
				icon: 'info',
			});
		}

	</script>
