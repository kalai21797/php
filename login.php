<?php
include("connection.php");
?>
<html>
<body>
<center><h1>LOGIN PAGE</h1>
<form method="post" action="<?php $_SERVER['PHP_SELF'];?>">
<table>
<tr>
<th>USER NAME:</th>
<td><input type="text" name="name" required></td>
</tr>
<tr>
<th>PASSWORD:</th>
<td><input type="password" name="pass" required></td>
</tr>
<tr>
<td><input type="submit" name="login" value="login"></td>
</tr>
</table>
</center>
</form>
</body>
</html>

<?php
if(isset($_POST['login'])){
	$name=$_POST["name"];
	$pass=$_POST["pass"];
	if($name!=""&$pass!=""){
		$sql="SELECT name,email,password FROM person WHERE name='$name' AND password='$pass' ";
	    $result=$conn->query($sql);
		if($result->num_rows==1){
			header("location:home.php");
		}
	else
		echo"Invalid user or password";
}
}
?>
