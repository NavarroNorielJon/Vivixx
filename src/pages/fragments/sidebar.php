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
?>
	<nav class="sidebar">
		<div class="sidebar-header">
			<a class="sidebar-logo" href="home"><img src="../img/Lion.png"></a>
		</div>

		<!-- Sidebar Links -->

		<ul class="nav flex-column">
			<li id="profile" class="nav-item">
				<a href="profile.php" class="nav-link sidebar-item">
                <i class="material-icons">person</i>
                <?php echo "$first_name"?></a>
				<a href="profile.php" class="icon">
                <i class="material-icons">person</i>
            </a>
			</li>

			<li id="home" class="nav-item ">
				<a href="home.php" class="nav-link sidebar-item ">
                <i class="material-icons">home</i>Home</a>
				<a class="icon" href="home.php">
                <i class="material-icons">home</i>
            </a>
			</li>

			<li id="notif" class="nav-item">
				<a href="notification.php" class="nav-link sidebar-item">
					<?php
					if($count > 0){
						echo"
						<i class='material-icons'>mail</i>Notifications ($count)</a>
						<a class='icon' href='notification.php'>
                		<i class='material-icons'>mail</i>
						";
					}else {
						echo"
						<i class='material-icons'>mail</i>Notifications</a>
						<a class='icon' href='notification.php'>
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
					<li class="active">
						<input name='edit' value='salary' style='display: none;'>
						<a href="fragments/salary_request.php" data-target="#salary" class="nav-link sidebar-item salary">Salary Request</a>
					</li>
					<li class="active">
						<a href="leave_request_form" class="nav-link sidebar-item">Leave Request</a>
					</li>

					<li class="active">
						<a href="fragments/salary_request.php" data-target="#salary" class="icon">SR</a>
					</li>
					<li class="active">
						<a href="leave_request_form" class="icon">LR</a>
					</li>
				</ul>
			</li>
			<hr>
			<li>
				<a href="../utilities/logout.php" class="nav-link sidebar-item logout">
                <i class="material-icons">power_settings_new</i>
                Logout
            </a>
				<a class="icon" href="../utilities/logout.php">
                <i class="material-icons">power_settings_new</i>
            </a>
			</li>
		</ul>
	</nav>
	<div id="salary_form"></div>
