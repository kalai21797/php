<?php
include "con2.php";

if(!empty($_POST['data'])){
	$form = $_POST['data'];
	$form_data = [];
	foreach($form as $data){
		$form_data[$data['name']] =$data['value'];
	}
	
	$name = $form_data['name'];
	$id = $form_data['id'];
	$sql = "INSERT INTO fruits(id,fname) VALUES('$id','$name')";
	if(mysqli_query($conn,$sql)){
		echo"inserted";exit;
	}else{
		echo "problem";exit;
	}
}


?>