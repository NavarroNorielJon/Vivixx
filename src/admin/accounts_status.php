<?php
  include 'header.php';
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Table</title>
  <?php
    include 'include.php';
  ?>
</head>

<body>	
	<div id="content">
		<h1>Accounts</h1>
		<?php
       		include 'data_accounts.php';
        ?>
      </div>
      <!-- script for calling datatables library -->
      <script>
      $(document).ready(function(){
      $('#table').dataTable( {
      "columnDefs": [
        { "orderable": false, "targets": 5 }
      ]
      });
      $('#table').DataTable();
      });
      </script>
     </body>
</html>