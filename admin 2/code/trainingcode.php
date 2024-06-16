<?php 
include_once('../include/connection.php'); 
if(isset($_POST['btnNewTraining'])){
    $trainingType = $_POST['trainingType'];
    
    $insData = "INSERT INTO `training_master` (`t_type`) values('$trainingType')";
    $resInsData = mysqli_query($conn, $insData);
    if(!empty($resInsData)){
        header("location:../trainingmaster.php?msg=1");
        exit;
    }else{
        header("location:../trainingmaster.php?msg=2");
        exit;
    }

}else if(isset($_POST['btnUpdateTraining'])){
    $t_m_id = $_POST['t_m_id'];
    $trainingType = $_POST['trainingType'];
    $updateDate = date("Y-m-d");
    
    $upData = "UPDATE `training_master` SET t_type = '".$trainingType."', updated_date = '".$updateDate."' WHERE t_m_id = '".$t_m_id."'";
    $rsUpData = mysqli_query($conn, $upData);
    if($rsUpData){
        header("location: ../trainingmaster.php?msg=4");
        exit;
    }else{
        header("location: ../trainingmaster.php?msg=2");
        exit;
    }
}else if(isset($_GET['del'])){
    $t_m_id = $_GET['del'];
    $delData = "DELETE from `training_master` WHERE t_m_id = '".$t_m_id."'";
    $rsDelData = mysqli_query($conn, $delData);
    if($rsDelData){
        header("location: ../trainingmaster.php?msg=5");
        exit;
    }else{
        header("location: ../trainingmaster.php?msg=2");
        exit;
    }
}else{
    header("location: ../trainingmaster.php?msg=3");
    exit;
}
?>