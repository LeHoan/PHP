<?php
//echo "fasdf";	
	//import file connect.php
	require_once "connect.php";
	//call function connectDB in file connect.php
	
	//$query = selectData();
?>
	<form  method="post">
	<input type="text" name="txtSearch" value="<?php echo $_POST['txtSearch'] ?>">
	<input type="submit" name="btnSearch" value="Search">
	<table border="1">
	<th>ID</th>
	<th>Name</th>
	<th>Age</th>
	<th>City</th>	
	<th>Gender</th>
	<th>Phone</th>

<?php
if($_POST["txtSearch"] == null || !isset($_POST["btnSearch"])) {

	foreach($conn->query(selectData()) as $row) {
	//	echo"$row[1] $row[2] $row[3] $row[4] $row[5] $row[6]<br>";
	echo"<tr>";
	echo"<td><a href='detail.php/empid=$row[0]'>$row[0]</a></td>";
	echo"<td>$row[1]</td>";
	echo"<td>$row[2]</td>";
	echo"<td>$row[3]</td>";
	echo"<td>$row[4]</td>";
	echo"<td>$row[5]</td>";
	echo"<td><a href='?del_id=$row[0]'>Delete</a></td>";
	echo"<td><a href='detail.php?em_id=$row[0]'>Update</a></td>";
	//echo"<td><input type='submit' name='btnDelete' value='Delete'>
//<input type='hidden' name='hid' value=$row[0]></td>";
	echo"</tr>";
	}
}
?>
<!-- </table>
<input type="submit" value="Insert" name="btnInsert">
</form> -->

<?php

if(isset($_POST["btnSearch"]) && $_POST["txtSearch"] != null){
	$search = $_POST["txtSearch"];
	foreach($conn->query(searchData($search)) as $row) {
	echo"<tr>";
	echo"<td><a href='detail.php?empid=$row[0]'>$row[0]</a></td>";
	echo"<td>$row[1]</td>";
	echo"<td>$row[2]</td>";
	echo"<td>$row[3]</td>";
	echo"<td>$row[4]</td>";
	echo"<td>$row[5]</td>";
	echo"<td><a href='?del_id=$row[0]'>Delete</a></td>";
	echo"</tr>";
	}
}
?>
</table>
<input type="submit" value="Add Employee" name="btnInsert">
</form>


<?php



if(isset($_POST["btnInsert"])){
	header("Location: index.php");
}


if (isset($_GET["del_id"])) {
$id = $_GET["del_id"];
$conn->exec(deleteData($id));
header("Refresh:0; url=test.php");
}


?>


