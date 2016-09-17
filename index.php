<form method="POST">
<table border="0">
<tr>
	<td>Name:</td>
	<td><input type="text" name="txtName"></td>
</tr>
<tr>
	<td>Age:</td>
	<td><input type="text" name="txtAge"></td>
</tr>
<tr>
	<td>City:</td>
	<td><input type="text" name="txtCity"></td>
</tr>
<tr>
	<td>Gender:</td>
	<td>Male<input type="radio" value="Male" name="radGender" checked>
	Female<input type="radio" value="Female" name="radGender"></td>
</tr>
<tr>
	<td>Phone:</td>
	<td><input type="text" name="txtPhone"></td>
</tr>


</table>
<input type="submit" name="btnSubmit" value ="Submit">
<input type="submit" name="btnCancel" value="Cancel">
</form>
<?php
	require_once"connect.php";
if(isset($_POST["btnCancel"])){
	header("Location: test.php");
}
if(isset($_POST["btnSubmit"])){
	$name = $_POST["txtName"];
	$age = $_POST["txtAge"];
	$city = $_POST["txtCity"];
	$gender = $_POST["radGender"];
	if($gender === "Male") {
	$gender = 'M';
	} else {
	$gender = 'F';
	}	
	$phone = $_POST["txtPhone"];
	$conn->query(insertData($name,$age,$city,$gender,$phone));
	header("Location: test.php");
	
}

?>
