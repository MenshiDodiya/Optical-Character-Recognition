<?php 
include_once('../include/connection.php'); 
if(isset($_GET['del'])){
    $doc_id = $_GET['del'];
    $delData = "DELETE from `user_share_document` WHERE doc_id = '".$doc_id."'";
    $rsDelData = mysqli_query($conn, $delData);
    if($rsDelData){
        header("location: ../sharedocumentmaster.php?msg=5");
        exit;
    }else{
        header("location: ../sharedocumentmaster.php?msg=2");
        exit;
    }
}else{
    header("location: ../sharedocumentmaster.php?msg=3");
    exit;
}
?>