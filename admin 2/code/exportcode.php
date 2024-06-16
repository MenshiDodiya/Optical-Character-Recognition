<?php 
include_once('../include/connection.php'); 
if(isset($_GET['del'])){
    $exp_id = $_GET['del'];

    $selUserExport = "SELECT * FROM user_export_file WHERE exp_id = '".$exp_id."'";
    $rsSelUserExport = mysqli_query($conn, $selUserExport);
    $countSelUserExport = mysqli_num_rows($rsSelUserExport);
    if(!empty($countSelUserExport)){
        $userExportData = mysqli_fetch_assoc($rsSelUserExport);
        $userExportName = $userExportData['exp_name'];
        $user_doc_id = $userExportData['user_doc_id'];
        if(!empty($userExportName) && file_exists("../../".$userExportName)){
            unlink("../../".$userExportName);
        }
        
        $selUserDocument = "SELECT * FROM user_document WHERE user_doc_id = '".$user_doc_id."'";
        $rsSelUserDocument = mysqli_query($conn, $selUserDocument);
        $countSelUserDocument = mysqli_num_rows($rsSelUserDocument);
        if(!empty($countSelUserDocument)){
            $userDocData = mysqli_fetch_assoc($rsSelUserDocument);
            $userDocName = $userDocData['doc_name'];
            if(!empty($userDocName) && file_exists("../../".$userDocName)){
                unlink("../../".$userDocName);
            }
            $delData = "DELETE FROM `user_document` WHERE user_doc_id = '".$user_doc_id."'";
            $rsDelData = mysqli_query($conn, $delData);
        }
    }
    
    $delData = "DELETE from `user_export_file` WHERE exp_id = '".$exp_id."'";
    $rsDelData = mysqli_query($conn, $delData);
    if($rsDelData){
        header("location: ../exportmaster.php?msg=5");
        exit;
    }else{
        header("location: ../exportmaster.php?msg=2");
        exit;
    }
}else{
    header("location: ../exportmaster.php?msg=3");
    exit;
}
?>