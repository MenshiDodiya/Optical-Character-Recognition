<?php 
include_once('../include/connection.php'); 
if(isset($_POST['btnNewAdmin'])){
    $adminName = $_POST['adminName'];
    $adminEmail = $_POST['adminEmail'];
    $adminPassword = $_POST['adminPassword'];

    $insData = "INSERT INTO `admin` (`a_name`, `a_email_id`, `password`) values('$adminName', '$adminEmail', md5('$adminPassword'))";
    $resInsData = mysqli_query($conn, $insData);
    if(!empty($resInsData)){
        header("location:../adminmaster.php?msg=1");
        exit;
    }else{
        header("location:../adminmaster.php?msg=2");
        exit;
    }

}else if(isset($_POST['btnUpdateAdmin'])){
    $adminId = $_POST['admin_id'];
    $adminName = $_POST['adminName'];
    $adminPassword = $_POST['adminPassword'];
    $updateDate = date("Y-m-d");
    if(!empty($adminPassword)){
        $upData = "UPDATE `admin` SET a_name = '".$adminName."', password = '".md5($adminPassword)."', updated_date = '".$updateDate."' WHERE a_id = '".$adminId."'";
    }else{
        $upData = "UPDATE `admin` SET a_name = '".$adminName."', updated_date = '".$updateDate."' WHERE a_id = '".$adminId."'";
    }
    $rsUpData = mysqli_query($conn, $upData);
    if($rsUpData){
        header("location: ../adminmaster.php?msg=4");
        exit;
    }else{
        header("location: ../adminmaster.php?msg=2");
        exit;
    }
}else if(isset($_GET['del'])){
    $adminId = $_GET['del'];
    if($adminId==1){
        header("location: ../adminmaster.php?msg=3");
    }else{
        $delData = "DELETE from `admin` WHERE a_id = '".$adminId."'";
        $rsDelData = mysqli_query($conn, $delData);
        if($rsDelData){
            header("location: ../adminmaster.php?msg=5");
            exit;
        }else{
            header("location: ../adminmaster.php?msg=2");
            exit;
        }
    }
}else{
    header("location: ../adminmaster.php?msg=3");
    exit;
}
?>