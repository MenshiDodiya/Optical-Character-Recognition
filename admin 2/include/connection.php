<?php
session_start();
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

<?php
    function checkLoggedIn(){
        if(empty($_SESSION['admin_user'])){
            header("location:index.php");
            exit;
        }
    }
?>