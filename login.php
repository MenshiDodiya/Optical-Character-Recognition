<?php
	include_once("db/dbfun.php");
?>

<?php
   if($_SERVER["REQUEST_METHOD"] == "POST")
   {
		session_start();
      // username and password sent from form 
      
      $e_id = mysqli_real_escape_string($conn,$_POST['email']);
      $password = mysqli_real_escape_string($conn,$_POST['password']); 
      
		$sql = mysqli_query($conn,"SELECT * FROM user WHERE u_email_id = '$e_id' and password = md5('$password')");
	  	$rows = mysqli_num_rows($sql);
		if ($rows == 1) 
		{
			$userData = mysqli_fetch_assoc($sql);
			$_SESSION['login_user'] = $userData;
			header("location: about.php"); 
		}
		else 
		{
		 header("Location:index.php?errormsg=1");
        }
   }
?>