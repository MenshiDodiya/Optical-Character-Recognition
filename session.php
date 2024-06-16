<?php

	include_once("db/dbfun.php");
	
	//session_start();
	
	// Storing Session
	//$user_check = $_SESSION['login_user'];
	if(isset($_SESSION['login_user'])){
		$user_check = $_SESSION['login_user'];
		$u_id = $_SESSION['login_user']['u_id'];
		// SQL Query To Fetch Complete Information Of User
		$ses_sql=mysqli_query($conn, "SELECT * FROM user WHERE u_id=".$u_id);
		$row = mysqli_fetch_assoc($ses_sql);
		$login_session = $row['u_email_id'];
		
		/*if(!isset($login_session))
		{
			header('Location: index.php'); 
		}
		
		if(session_destroy()) 
		{
			header("Location: index.php"); 
		}*/
	}
?>