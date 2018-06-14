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
		<h1>Leave Requests</h1>
		<?php
      include 'table_leave_requests.php';
    ?>
  </div>
      <!-- script for calling datatables library -->
      <script>
      $(document).ready(function(){
      $('#leave').dataTable( {
      "columnDefs": [
        { "orderable": false, "targets": 3 }
      ]
      });
      $('#leave').DataTable();
      });
      </script>
</body>
</html>