<html>
<style>
.a{
	color:red;
}
</style>
<body>

<?php
include("connection.php");
$nameError="";
$emailError="";
$passwordError="";
$confirm_passwordError="";

$name="";
$email="";
$password="";
$confirm_password="";

if(isset($_POST['save'])){
	if(empty($_POST['name'])){
		$nameError="*please fill the name";
	}else{
		$name=$_POST['name'];
		if(!preg_match("/^[a-zA-Z]*$/",$name)){
			$nameError="Alphabets only allowed.";
		}
	}
	if(empty($_POST['email'])){
		$emailError="*please fill the email id";
	}else{
		$email=$_POST['email'];
		if(!preg_match("/^[.\w-]+@([\w-]+\.)+[a-zA-Z]{2,6}$/",$email)){
			$emailError="*please enter the correct mail id";
		}
	}
	if(empty($_POST['password'])){
		$passwordError="*please enter the password";
	}else{
		$password=$_POST['password'];
	}
		if(empty($_POST['confirm_password'])){
		$confirm_passwordError="*please enter the confirm_password";
	}else{
		$confirm_password=$_POST['confirm_password'];
		if($_POST['password']!=$_POST['confirm_password']){
		$confirm_passwordError="password and confirm_password is not equal";
		}
	}
}
	if($nameError =="" && $emailError == "" && $passwordError == "" && $confirm_passwordError == ""){
		if(isset($_POST['save'])){
			$name=$_POST['name'];
			$email=$_POST['email'];
			$password=$_POST['password'];
			$confirm_password=$_POST['confirm_password'];
			//$sql="CREATE DATABASE container";//
			$sql="INSERT INTO person(name,email,password,confirm_password) VALUES('$name','$email','$password','$confirm_password')";
			    if(mysqli_query($conn,$sql))
					{
					header("location:login.php?mes=data saved.please login here");
					}
				else{
					echo"data not inserted".mysqli_error($conn);
				}
			}
		}
?>

<center><h1>REGISTRATION FORM</h1></center>
<form method="post" action="<?php $_SERVER['PHP_SELF'];?>">
<table>
<tr>
<th>NAME:</th>
<td><input type="text" name="name"></td>
<td><span class="a"><?php echo $nameError;?></span></td>
</tr>
<tr>
<th>EMAIL:</th>
<td><input type="text" name="email"></td>
<td><span class="a"><?php echo $emailError;?></span></td>
</tr>
<tr>
<th>PASSWORD:</th>
<td><input type="password" name="password"></td>
<td><span class="a"><?php echo $passwordError;?></span></td>
</tr>
<tr>
<th>CONFIRM PASSWORD:</th>
<td><input type="password" name="confirm_password"></td>
<td><span class="a"><?php echo $confirm_passwordError;?></span></td>
</tr>
<tr>
<td><input type="submit" name="save" value="save"></td>
</tr>
</table>
</form>
</body>
</html>