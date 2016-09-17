<?php
	//$DB_HOST = "localhost";
	//$DB_USER = "root";
	//$DB_PASSWORD = "admin";
//function connectDB() {
	define('DB_HOST', 'localhost');
	define('DB_USER', 'root');
	define('DB_PASSWORD', 'admin');
	
	
//function connectDB(){

try{
	$conn = new PDO("mysql:host=".DB_HOST.";dbname=PHPdemo",DB_USER,DB_PASSWORD);
	//set the PDO error mode to exception
	//$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	//echo "Connected successfully";	

}catch(PDOException $e){
	echo "Connection failed:".$e->getMessage();
}
//}

//connectDB();

function selectData() {
	$sql = "select * from employee";
	return $sql;
}


function deleteData($id) {
	$sql = "delete from employee where emp_id = $id";
	return $sql;
}
function insertData($name, $age, $city, $gender, $phone) {
	$sql = "insert into employee values(Null,'".$name."',".$age.",'".$city."','".$gender."',".$phone.")";
	return $sql;
}


function searchData($search) {
	$sql = "select * from employee where name like '%".$search."'";
	return $sql;
}
function updateData($id, $age, $city, $phone) {
	$sql= "update employee set age=$age, city='".$city."', phone=$phone where emp_id=$id";
	return $sql;
}



function selectByID($id) {
	$sql="select name, age, city, gender,phone from employee where emp_id = ".$id;
	return $sql;
}

?>
