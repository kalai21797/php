<?php
include "con2.php";
?>
<html>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<body>
<form method="post" id="frm" action= "<?php echo $_SERVER['PHP_SELF']?>" >
<center>
<table>
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
		//console.log(form_data);
		//return false;
		$.ajax({
			url:"example.php",
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
