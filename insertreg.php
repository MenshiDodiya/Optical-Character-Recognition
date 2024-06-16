<?php 
include_once("db/dbfun.php");
?>

<?php
if(isset($_POST['btnsubmit']))
{
	
	
	$u_name = $_POST['name'];
	$u_contact_no = $_POST['number'];
	$u_email_id = $_POST['email'];
	$password = $_POST['pass'];
	
	$sqldb = "SELECT * FROM user WHERE u_email_id";
	
	//Insert Query
	$sql = "INSERT INTO user(u_name, u_contact_no, u_email_id, password) VALUES('".$u_name."','".$u_contact_no."','".$u_email_id."','".md5($password)."')";
	//echo $sql;exit;
	$insertData = mysqli_query($conn, $sql);
	if($insertData)
	{
		header("location:index.php");
	}
	else
	{
	}
	
	/*if($insertData)
	{
		$last_id = mysqli_insert_id($conn);
		echo "New record created successfully. <br> Last inserted ID is: " . $last_id;
	}
	else 
	{ 
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}

	if($insertData)
	{
		echo "<br> Information Saved Successfully";
	}
	else
	{
		echo "Something went Wrong". mysqli_error($conn);
	}*/
	
}
else
{
	echo "You are not authorized to run this page.";
}
		
?>