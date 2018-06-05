<?php
include 'db.php';

$connection = Connect();

echo "Connected Successfully";

Disconnect($connection);
?>