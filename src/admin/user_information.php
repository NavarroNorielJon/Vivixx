<?php
  include 'header.php';
 ?>

<!DOCTYPE html>
<html>
    <head>
        <title>Table</title>
        <script type="text/javascript" src="../script/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="../script/datatables.min.js"></script>
        <link rel="stylesheet" href="../style/bootstrap/bootstrap.min.css">
        <link rel="stylesheet" href="../style/datatables.min.css">
        <link type="text/css" rel="stylesheet" href="../style/style.css" media="screen, projection">
        <script type="text/javascript" src="../script/popper.min.js"></script>
        <script type="text/javascript" src="../script/bootstrap/bootstrap.min.js"></script>
    </head>
    <body>
          <br>
          <div id="content">
          <?php
          include 'data_information.php';
           ?>
         </div>
         <script>
         $('#table').dataTable( {
          "columnDefs": [
            { "orderable": false, "targets": 5 }
          ]
        } );
         $('#table').DataTable();
        </script>
    </body>
</html>
