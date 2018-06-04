<?php

function Connect(){
	$host = "";
	$user = "root";
	$password = "";
	$dbname = "mis";
	
	$connect = new mysqli($host,$user,$password,$dbname) or die("Connection Failure: %s\n". $connect -> error);
	return $connect;
}

function Disconnect(){
	$connect -> close();
}

?>