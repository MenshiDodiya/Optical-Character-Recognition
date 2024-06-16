<?php 
include_once('../include/connection.php'); 
if(isset($_POST['btnNewPermission'])){
    $permissionName = $_POST['permissionName'];
    $permissionDetail = $_POST['permissionDetail'];
    
    $insData = "INSERT INTO `permission_master` (`p_name`, `permission`) values('$permissionName', '$permissionDetail')";
    $resInsData = mysqli_query($conn, $insData);
    if(!empty($resInsData)){
        header("location:../permissionmaster.php?msg=1");
        exit;
    }else{
        header("location:../permissionmaster.php?msg=2");
        exit;
    }

}else if(isset($_POST['btnUpdatePermission'])){
    $permissionId = $_POST['perm_id'];
    $permissionName = $_POST['permissionName'];
    $permissionDetail = $_POST['permissionDetail'];
    $updateDate = date("Y-m-d");
    
    $upData = "UPDATE `permission_master` SET p_name = '".$permissionName."', permission = '".$permissionDetail."', updated_date = '".$updateDate."' WHERE p_m_id = '".$permissionId."'";
    $rsUpData = mysqli_query($conn, $upData);
    if($rsUpData){
        header("location: ../permissionmaster.php?msg=4");
        exit;
    }else{
        header("location: ../permissionmaster.php?msg=2");
        exit;
    }
}else if(isset($_GET['del'])){
    $perm_id = $_GET['del'];
    $delData = "DELETE from `permission_master` WHERE p_m_id = '".$perm_id."'";
    $rsDelData = mysqli_query($conn, $delData);
    if($rsDelData){
        header("location: ../permissionmaster.php?msg=5");
        exit;
    }else{
        header("location: ../permissionmaster.php?msg=2");
        exit;
    }
}else{
    header("location: ../permissionmaster.php?msg=3");
    exit;
}
?>