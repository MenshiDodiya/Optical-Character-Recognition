<?php 
include_once('../include/connection.php'); 
if(isset($_POST['btnNewDocument'])){
    $documentType = $_POST['documentType'];
    $documentDetail = $_POST['documentDetail'];
    
    $insData = "INSERT INTO `document_master` (`doc_type`, `doc_name`) values('$documentType', '$documentDetail')";
    $resInsData = mysqli_query($conn, $insData);
    if(!empty($resInsData)){
        header("location:../documentmaster.php?msg=1");
        exit;
    }else{
        header("location:../documentmaster.php?msg=2");
        exit;
    }

}else if(isset($_POST['btnUpdateDocument'])){
    $doc_m_id = $_POST['doc_m_id'];
    $documentType = $_POST['documentType'];
    $documentDetail = $_POST['documentDetail'];
    $updateDate = date("Y-m-d");
    
    $upData = "UPDATE `document_master` SET doc_type = '".$documentType."', doc_name = '".$documentDetail."', updated_date = '".$updateDate."' WHERE doc_m_id = '".$doc_m_id."'";
    $rsUpData = mysqli_query($conn, $upData);
    if($rsUpData){
        header("location: ../documentmaster.php?msg=4");
        exit;
    }else{
        header("location: ../documentmaster.php?msg=2");
        exit;
    }
}else if(isset($_GET['del'])){
    $doc_m_id = $_GET['del'];
    $delData = "DELETE from `document_master` WHERE doc_m_id = '".$doc_m_id."'";
    $rsDelData = mysqli_query($conn, $delData);
    if($rsDelData){
        header("location: ../documentmaster.php?msg=5");
        exit;
    }else{
        header("location: ../documentmaster.php?msg=2");
        exit;
    }
}else{
    header("location: ../documentmaster.php?msg=3");
    exit;
}
?>