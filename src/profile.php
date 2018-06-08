<?php
    include 'utilities/session.php';
?>

<html>
    <head>
        <title>Profile</title>
    </head>
    
    <body>
		<div class="row">
        	<div class="col-3">
				<?php include 'module/sidenav.php'?>
			</div>
			
			<div class="col-9">
				<p>Hi! <?php echo "$user_first"?></p>
			</div>			
		</div>
    </body>
</html>