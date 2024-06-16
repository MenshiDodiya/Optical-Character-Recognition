<?php 
include_once('../include/connection.php'); 
if(isset($_GET['del'])){
    $contact_id = $_GET['del'];
    $delData = "DELETE from `contact_inquiry` WHERE contact_id = '".$contact_id."'";
    $rsDelData = mysqli_query($conn, $delData);
    if($rsDelData){
        header("location: ../contactmaster.php?msg=5");
        exit;
    }else{
        header("location: ../contactmaster.php?msg=2");
        exit;
    }
}else{
    header("location: ../contactmaster.php?msg=3");
    exit;
}
?>