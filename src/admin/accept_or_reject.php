<?php
include '../utilities/db.php';
$connect = Connect();
$req_id=$_POST["req_id"];
echo $req_id;

$sql = "select";