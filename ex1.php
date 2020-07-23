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
if(!empty($_POST['data'])){
$form = $_POST['data'];
foreach($form as $data){
	$form_data[$data['name']] =$data['value'];
}
	echo "<pre>";print_r($form_data);echo"</pre>";die();
}

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
<?php while($row=mysqli_fetch_array($names)){ ?>
<tr>
<td><?php echo $row['id'];  ?></td>
<td><?php echo $row['fname']; ?></td>
</tr>
<?php } ?>

<html>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<body>
<center><h3>FRUITS LIST</h3>
<form method="post" id="frm" action= "<?php echo $_SERVER['PHP_SELF']?>" >
<table>
<tr>
<th>Id</th>
<th>Fruits Name</th>
</tr>
<tr>
<td><input type="text" name="id" id="id" required></td>
<td><input type="text" name="name" id="name" required></td>
<td><input type="button" name="add" id="add" value="add">
<td><input type="button" name="del" id="delete" value="delete"></td>
<td><input type="button" name="edit" id="edit" value="edit"></td>
</tr>
</form>
</center>

<script>
$(document).ready(function(){
$('#add').click(function(){
	var form_data = $('#frm').serializeArray();
	$.ajax({
	url:"ex1.php",
	type:"POST",
	data:{data:form_data},
	success:function(response){
    console.log(response);
    }
	});
	return false;
});
$('#del').click(function(){
	var form_data = $('#frm').serializeArray();
	$.ajax({
	url:"ex1.php",
	type:"POST",
	data:{data:form_data},
	success:function(response){
    console.log(response);
    }
	});
	return false;
});
});



</script>
