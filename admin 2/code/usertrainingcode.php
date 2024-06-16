<?php 
include_once('../include/connection.php'); 
if(isset($_POST['btnNewUserTraining'])){
    $userId = $_POST['userId'];
    $training = $_POST['training'];

    $selTM = "SELECT * FROM training_master WHERE t_m_id = '".$training."'";
    $rsSelTM = mysqli_query($conn, $selTM);
    $TMData = mysqli_fetch_assoc($rsSelTM);
    $t_name = $TMData['t_type'];

    $selTrainingData = "SELECT * FROM user_training WHERE u_id = '".$userId."' AND t_m_id = '".$training."'";
    $rsSelTrainingData = mysqli_query($conn, $selTrainingData);
    $countSelTrainingData = mysqli_num_rows($rsSelTrainingData);
    if(empty($countSelTrainingData)){
        $insData = "INSERT INTO `user_training` (`u_id`, `t_m_id`, `t_name`) values('$userId', '$training', '$t_name')";
        $resInsData = mysqli_query($conn, $insData);
    }else{
        $resInsData = true;
    }
    if(!empty($resInsData)){
        header("location:../usertrainingmaster.php?msg=1");
        exit;
    }else{
        header("location:../usertrainingmaster.php?msg=2");
        exit;
    }

}else if(isset($_POST['btnUpdateTraining'])){
    $u_t_id = $_POST['u_t_id'];
    $db_u_id = $_POST['db_u_id'];
    $training = $_POST['training'];
    $t_type_id = $_POST['t_type_id'];
    $updateDate = date("Y-m-d");

    $selTM = "SELECT * FROM training_master WHERE t_m_id = '".$training."'";
    $rsSelTM = mysqli_query($conn, $selTM);
    $TMData = mysqli_fetch_assoc($rsSelTM);
    $t_name = $TMData['t_type'];

    $selTrainingData = "SELECT * FROM user_training WHERE u_id = '".$db_u_id."' AND t_m_id = '".$training."'";
    $rsSelTrainingData = mysqli_query($conn, $selTrainingData);
    $countSelTrainingData = mysqli_num_rows($rsSelTrainingData);
    
    $upData = "UPDATE `user_training` SET t_m_id = '".$training."', t_name = '".$t_name."', t_type_id = '".$t_type_id."', updated_date = '".$updateDate."' WHERE u_t_id = '".$u_t_id."'";
    $rsUpData = mysqli_query($conn, $upData);
    
    if($rsUpData){
        header("location: ../usertrainingmaster.php?msg=4");
        exit;
    }else{
        header("location: ../usertrainingmaster.php?msg=2");
        exit;
    }
}else if(isset($_GET['del'])){
    $u_t_id = $_GET['del'];
    $delData = "DELETE from `user_training` WHERE u_t_id = '".$u_t_id."'";
    $rsDelData = mysqli_query($conn, $delData);
    if($rsDelData){
        header("location: ../usertrainingmaster.php?msg=5");
        exit;
    }else{
        header("location: ../usertrainingmaster.php?msg=2");
        exit;
    }
}else{
    header("location: ../usertrainingmaster.php?msg=3");
    exit;
}
?>