<?php 
include_once('../include/connection.php'); 
if(isset($_GET['doc_id']) && isset($_GET['u_id'])){
    $user_doc_id = $_GET['doc_id'];
    $u_id = $_GET['u_id'];

    $selUserDocument = "SELECT * FROM user_document WHERE user_doc_id = '".$user_doc_id."'";
    $rsSelUserDocument = mysqli_query($conn, $selUserDocument);
    $countSelUserDocument = mysqli_num_rows($rsSelUserDocument);
    if(!empty($countSelUserDocument)){
        $userDocData = mysqli_fetch_assoc($rsSelUserDocument);
        $userDocName = $userDocData['doc_name'];
        if(!empty($userDocName) && file_exists("../../".$userDocName)){
            unlink("../../".$userDocName);
        }
    }

    $selUserExport = "SELECT * FROM user_export_file WHERE user_doc_id = '".$user_doc_id."'";
    $rsSelUserExport = mysqli_query($conn, $selUserExport);
    $countSelUserExport = mysqli_num_rows($rsSelUserExport);
    if(!empty($countSelUserExport)){
        $userExportData = mysqli_fetch_assoc($rsSelUserExport);
        $userExportName = $userExportData['exp_name'];
        if(!empty($userExportName) && file_exists("../../".$userExportName)){
            unlink("../../".$userExportName);
        }
        $delUserExport = "DELETE FROM user_export_file WHERE user_doc_id = '".$user_doc_id."'";
        $rsDelUserExport = mysqli_query($conn, $delUserExport);
    }
    
    $delData = "DELETE FROM `user_document` WHERE user_doc_id = '".$user_doc_id."' AND u_id = '".$u_id."'";
    $rsDelData = mysqli_query($conn, $delData);
    if($rsDelData){
        header("location: ../userDocument.php?u_id=".$u_id."&msg=5");
        exit;
    }else{
        header("location: ../userDocument.php?u_id=".$u_id."&msg=2");
        exit;
    }
}else{
    header("location: ../userDocument.php?u_id=".$u_id."&msg=3");
    exit;
}
?>