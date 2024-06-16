<?php
session_start();
include_once("db/configuration.php");
if(isset($_POST['btnTraining'])){
    $u_id = $_SESSION['login_user']['u_id'];
    $t_m_id = $_POST['t_m_id'];

    $selTraining = "SELECT * FROM training_master WHERE t_m_id = '".$t_m_id."' ORDER BY t_type ASC";
    $rsTraining = mysqli_query($conn, $selTraining);
    $countTraining = mysqli_num_rows($rsTraining);
    if(!empty($countTraining)){
        $training = mysqli_fetch_assoc($rsTraining);
        $t_name = $training['t_type'];
    }else{
        $t_name = '';
    }

    $selUTraining = "SELECT * FROM user_training WHERE u_id = '".$u_id."'";
    $rsSelUTraining = mysqli_query($conn, $selUTraining);
    $countUTraining = mysqli_num_rows($rsSelUTraining);
    if(empty($countUTraining)){
        $insTraining = "INSERT INTO user_training (`u_id`, `t_m_id`, `t_name`) VALUES('$u_id', '$t_m_id', '$t_name')";
        $rsInsTraining = mysqli_query($conn, $insTraining);
        if($rsInsTraining){
            header("location:training.php?msg=1");
            exit;
        }else{
            header("location:training.php?msg=2");
            exit;
        }
    }else{
        header("location:training.php?msg=7");
        exit;
    }
}else{
    header("location:training.php?msg=3");
    exit;
}
?>