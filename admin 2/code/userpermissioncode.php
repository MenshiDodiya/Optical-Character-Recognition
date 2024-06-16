<?php 
include_once('../include/connection.php'); 
if(isset($_POST['btnNewUserPermission'])){
    $userId = $_POST['userId'];
    $permission = $_POST['permission'];

    $selPermData = "SELECT * FROM user_permission WHERE u_id = '".$userId."' AND p_m_id = '".$permission."'";
    $rsSelPermData = mysqli_query($conn, $selPermData);
    $countSelPermData = mysqli_num_rows($rsSelPermData);
    if(empty($countSelPermData)){
        $insData = "INSERT INTO `user_permission` (`u_id`, `p_m_id`) values('$userId', '$permission')";
        $resInsData = mysqli_query($conn, $insData);
    }else{
        $resInsData = true;
    }
    if(!empty($resInsData)){
        header("location:../userpermissionmaster.php?msg=1");
        exit;
    }else{
        header("location:../userpermissionmaster.php?msg=2");
        exit;
    }

}else if(isset($_POST['btnUpdatePermission'])){
    $u_p_id = $_POST['u_p_id'];
    $db_u_id = $_POST['db_u_id'];
    $permission = $_POST['permission'];
    $updateDate = date("Y-m-d");

    $selPermData = "SELECT * FROM user_permission WHERE u_id = '".$db_u_id."' AND p_m_id = '".$permission."'";
    $rsSelPermData = mysqli_query($conn, $selPermData);
    $countSelPermData = mysqli_num_rows($rsSelPermData);
    if(!empty($countSelPermData)){
        $rsUpData = true;
    }else{
        $upData = "UPDATE `user_permission` SET p_m_id = '".$permission."', updated_date = '".$updateDate."' WHERE u_p_id = '".$u_p_id."'";
        $rsUpData = mysqli_query($conn, $upData);
    }
    
    if($rsUpData){
        header("location: ../userpermissionmaster.php?msg=4");
        exit;
    }else{
        header("location: ../userpermissionmaster.php?msg=2");
        exit;
    }
}else if(isset($_GET['del'])){
    $u_p_id = $_GET['del'];
    $delData = "DELETE from `user_permission` WHERE u_p_id = '".$u_p_id."'";
    $rsDelData = mysqli_query($conn, $delData);
    if($rsDelData){
        header("location: ../userpermissionmaster.php?msg=5");
        exit;
    }else{
        header("location: ../userpermissionmaster.php?msg=2");
        exit;
    }
}else{
    header("location: ../userpermissionmaster.php?msg=3");
    exit;
}
?>