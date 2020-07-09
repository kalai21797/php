<html>
<body>
<?php
$servername="localhost";
$username="root";
$password="";
$dbname="container";

$conn=mysqli_connect($servername,$username,$password,$dbname);
if(!$conn){
	echo("not connected".mysqli_connect_error());
}
if(isset($_POST['save'])){
$name=$_POST['name'];
$email=$_POST['email'];
$password=$_POST['password'];
$confirm_password=$_POST['confirm_password'];
//$sql="CREATE DATABASE container";//
$sql="INSERT INTO person(name,email,password,confirm_password) VALUES('$name','$email','$password','$confirm_password')";
if(mysqli_query($conn,$sql)){
	if(mysqli_query($conn,$sql))
	{
	echo"data saved";
	}
    else{
	echo"data not inserted".mysqli_error($conn);
}
mysqli_close($conn);
}
}
?>
</body>
</html>