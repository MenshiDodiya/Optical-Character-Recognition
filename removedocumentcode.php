<?php
include_once("db/configuration.php");
if(isset($_GET['del'])){
    $user_doc_id = $_GET['del'];
    $selUserDocument = "SELECT * FROM user_document WHERE user_doc_id = '".$user_doc_id."'";
    $rsSelUserDocument = mysqli_query($conn, $selUserDocument);
    $countSelUserDocument = mysqli_num_rows($rsSelUserDocument);
    if(!empty($countSelUserDocument)){
        $userDocData = mysqli_fetch_assoc($rsSelUserDocument);
        $userDocName = $userDocData['doc_name'];
        if(!empty($userDocName) && file_exists($userDocName)){
            unlink($userDocName);
        }

        $selUserExport = "SELECT * FROM user_export_file WHERE user_doc_id = '".$user_doc_id."'";
        $rsSelUserExport = mysqli_query($conn, $selUserExport);
        $countSelUserExport = mysqli_num_rows($rsSelUserExport);
        if(!empty($countSelUserExport)){
            $userExportData = mysqli_fetch_assoc($rsSelUserExport);
            $userExportName = $userExportData['exp_name'];
            if(!empty($userExportName) && file_exists($userExportName)){
                unlink($userExportName);
            }
            $delUserExport = "DELETE FROM user_export_file WHERE user_doc_id = '".$user_doc_id."'";
            $rsDelUserExport = mysqli_query($conn, $delUserExport);
        }
        
        $delUserDoc = "DELETE FROM user_document WHERE user_doc_id = '".$user_doc_id."'";
        $rsDelUserDoc = mysqli_query($conn, $delUserDoc);
        if($rsDelUserDoc){
            header("location:mydocument.php?msg=5");
            exit;
        }else{
            header("location:mydocument.php?msg=2");
            exit;
        }
    }else{
        header("location:mydocument.php?msg=2");
        exit;
    }
}else{
    header("location:mydocument.php?msg=3");
    exit;
}
?>