<?php
$servername="localhost";
$username="root";
$password="";
$dbname="todo";
$conn=mysqli_connect($servername,$username,$password,$dbname);
if(!$conn){
	echo("not connected".mysqli_connect_error());
	}
?>