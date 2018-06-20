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
          <h1>User Information</h1>
          <div id="content">
          <?php
          include 'table_information.php';
           ?>
         </div>
	<!--script for calling data table library-->
  
  <script>
      $(document).ready(function(){
      $('#table').dataTable( {
      "columnDefs": [
        { "orderable": false, "targets": [5,6] }
      ]
      });
      $('#table').DataTable();
      });
      </script>
    </body>
</html>
