<?php 
	require_once"connect.php";
	
	foreach($conn->query(selectByID($_GET["em_id"])) as $row) {

	
?>

<form method="post">
<table border="0">
<tr>
	<td>Name:</td>
	<td><input type="text" name="txtName" value="<?php echo $row[0] ?>" readonly></td>
</tr>
<tr>
	<td>Age:</td>
	<td><input type="text" name="txtAge" value=<?php echo $row[1] ?>></td>
</tr>
<tr>
	<td>City:</td>
	<td><input type="text" name="txtCity" value="<?php echo $row[2]?>"></td>
</tr>
<tr>
	<td>Gender:</td>
	<td>
<?php
	if($row[3] === 'M'){
	echo"Male<input type='radio' value='Male' name='radGender' checked>";}else{
	echo"Female<input type='radio' value='Female' name='radGender' checked>";}
?>

</td>
</tr>
<tr>
	<td>Phone:</td>
	<td><input type="text" name="txtPhone" value="<?php echo $row[4]?>"></td>
</tr>
</table>
<?php } ?>
<input type="submit" name="btnUpdate" value="Update">
<input type="submit" name="btnReturn" value="Return">

</form>


<?php
if(isset($_POST["btnReturn"])) {
	header("Location: test.php");
}

if(isset($_POST["btnUpdate"])) {
	$stmt = $conn ->prepare(updateData($_GET["em_id"], $_POST["txtAge"], $_POST["txtCity"], $_POST["txtPhone"]));
	$stmt->execute();
	echo $stmt->rowCount()."records UPDATED successfully";
}







?>
