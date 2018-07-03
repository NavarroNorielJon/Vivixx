<html>
<head>
	<title>Vivixx Ph</title>
  	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" href="../../style/bootstrap/bootstrap.min.css">
	<link type="text/css" rel="stylesheet" href="../style/style.css" media="screen, projection">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="../../style/datatables.css">

    <!--scripts-->
    <script type="text/javascript" src="../../script/datatables.min.js"></script>
	<script type="text/javascript" src="../../script/ajax.js"></script>  
	<script type="text/javascript" src="../../script/popper.min.js"></script>
	<script type="text/javascript" src="../../script/sweetalert.min.js"></script>
    <script type="text/javascript" src="../../script/bootstrap/bootstrap.min.js"></script>
    <script src="../../script/jquery.form.min.js"></script>
</head>
<body>
	<div class="modal fade" id="hi" tabindex="-1" role="dialog"   data-keyboard="false" data-backdrop="static">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-body">
					<h1 class="text-center" style="font-size:5rem">Success!</h1>
					<div class="text-center"><p>Admin have successfully added an announcement</p></div>
          <form action="../google-api-php-client/send_attachments.php" method="post">
            <div class="text-right">
              <button class="btn btn-primary" type="submit" name="submit">Done</button>
            </div>
          </form>	
				</div>
					
			</div>
		</div>
	</div>
</body>
<script>
        $(document).ready(function(){
            $("#hi").modal("show");
        });
    </script>
</html>