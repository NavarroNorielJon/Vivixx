<?php

function Connect(){
	$host = "http://13.251.3.102";
	$user = "vivixx";
	$password = "vivixxojts";
	$dbname = "mis";
	$connect = new mysqli($host,$user,$password,$dbname) or die("Connection Failure: %s\n". $connect->error);
	return $connect;
}

function Disconnect($connect){
	$connect->close();
}

?>
