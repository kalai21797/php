<html>
<body>

<?php
$servername="localhost";
$username="root";
$password="";
$dbname="todo";
$conn=mysqli_connect($servername,$username,$password,$dbname);
if(!$conn){
	echo"not connected".mysqli_connect_error($conn);
}
?>

<?php
$nameErr="";
$idErr="";
if(isset($_POST['add'])){
	$name=$_POST['name'];
	$id=$_POST['id'];
	$sql="INSERT INTO fruits(id,fname) VALUES('$id','$name')";
	if(mysqli_query($conn,$sql)){
	echo"inserted";
	}
}
if(isset($_POST['del'])){
	$name=$_POST['name'];
	$id=$_POST['id'];
	$sql="DELETE FROM fruits WHERE id=$id";
	if(mysqli_query($conn,$sql)){
	echo"deleted";
	}
}
if(isset($_POST['edit'])){
	$name=$_POST['name'];
	$id=$_POST['id'];
	$sql="UPDATE fruits SET fname='$name' WHERE id='$id' ";
	if(mysqli_query($conn,$sql)){
	echo"edited";
	}
}
$names=mysqli_query($conn,"SELECT * FROM fruits");
?>

<center><h3>LOGGED IN SUCCESSFULLY!!</h3>
<form method="post" action="<?php $_SERVER["PHP_SELF"] ?>">
<table>
<tr>
<th>Id</th>
<th>Fruits Name</th>
</tr>
<tr>
<td><input type="text" name="id" required></td>
<td><input type="text" name="name" required></td>
<td><input type="submit" name="add" value="add">
<td><input type="submit" name="del" value="delete"></td>
<td><input type="submit" name="edit" value="edit"></td>
</tr>

<?php while($row=mysqli_fetch_array($names)){ ?>
<tr>
<td><?php echo $row['id'];  ?></td>
<td><?php echo $row['fname']; ?></td>
</tr>
<?php } ?>
</center>
</body>
</html>
