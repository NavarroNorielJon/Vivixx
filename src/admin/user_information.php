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
        <link rel="stylesheet" href="../style/datatables.css">
        <link type="text/css" rel="stylesheet" href="../style/style.css" media="screen, projection">
        <script type="text/javascript" src="../script/popper.min.js"></script>
        <script type="text/javascript" src="../script/bootstrap/bootstrap.min.js"></script>
    </head>
    <body>
          <h1>User Information</h1>
          <div id="content">
          <?php
          include 'data_information.php';
           ?>
         </div>
         <!--script for calling data table library-->
         <script>
         $(document).ready(function(){
         $('#table').dataTable( {
          "columnDefs": [
            { "orderable": false, "targets": [6,7] }

          ],
          "responsive": true,
          "order": [
            [4, "desc"]
          ]
        } );
         $('#table').DataTable();
         });
        </script>
    </body>
</html>
