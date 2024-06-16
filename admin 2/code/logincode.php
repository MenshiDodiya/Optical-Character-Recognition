<?php 
include_once('../include/connection.php'); 
if(isset($_POST['btnLogin'])){
   $adminEmail = $_POST['email'];
   $adminPassword = $_POST['password'];

    $selAdmin = "SELECT * FROM admin where a_email_id = '".$adminEmail."' and password = '".md5($adminPassword)."'";
    $resSelAdmin = mysqli_query($conn, $selAdmin);
    $adminCount = mysqli_num_rows($resSelAdmin);
    if(!empty($adminCount)){
        $adminData = mysqli_fetch_assoc($resSelAdmin);
        $_SESSION['admin_user'] = $adminData;
        header("location:../dashboard.php");
        exit;
    }else{
        header("location:../index.php?msg=1");
        exit;
    }

}else{
    header("location:../index.php?msg=2");
    exit;
}
?>