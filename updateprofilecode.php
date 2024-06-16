<?php
include_once("db/configuration.php");
if(isset($_POST['btnUpdateProfile'])){
    if(!empty($_POST['u_id'])){
        $u_id = $_POST['u_id'];
        $u_name = $_POST['name'];
        $u_contact_no = $_POST['number'];
        $oldpassword = $_POST['oldpassword'];
        $newpassword = $_POST['newpassword'];
        $updatedDate = date('Y-m-d H:i:s');

        $selData = "SELECT * FROM user where u_id = " . $u_id;
        $selResult = mysqli_query($conn, $selData);
        $userdata  = mysqli_fetch_assoc($selResult);
        $dbPassword = $userdata['password'];
        if(!empty($oldpassword) && !empty($newpassword)){
            if($dbPassword != md5($oldpassword)){
                header("location:about.php?msg=1");
                exit;
            }else{
                $updateQuery = "Update user set u_name = '".$u_name."', u_contact_no = '".$u_contact_no."', password = '".md5($newpassword)."', updated_date = '".$updatedDate."' WHERE u_id = '".$u_id."'";
            }
        }else{
            $updateQuery = "Update user set u_name = '".$u_name."', u_contact_no = '".$u_contact_no."', updated_date = '".$updatedDate."'  WHERE u_id = '".$u_id."'";
        }
        $updateSuccess = mysqli_query($conn, $updateQuery);
        if($updateSuccess){
            header("location:about.php?msg=2");
            exit;
        }else{
            header("location:about.php?msg=3");
            exit;
        }

    }else{
        header("location:about.php?msg=4");
        exit;
    }
}
?>