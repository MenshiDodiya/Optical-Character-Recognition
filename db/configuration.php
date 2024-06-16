<?php
$server_name="localhost";
$user_name="root";
$password="";
$dbName = "ocr";
$conn=mysqli_connect($server_name,$user_name,$password,$dbName);

if($conn)
{
	//echo"connection is done";
}
else
{
	echo mysqli_error($conn);
	exit;
}
?>

