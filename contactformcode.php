<?php
include_once("db/configuration.php");
if(isset($_POST['btnContactNow'])){
    $firstname = $_POST['firstname'];    
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    $insContact = "INSERT INTO contact_inquiry (`firstname`, `email`, `phone`, `message`) VALUES('$firstname', '$email', '$phone', '$message')";
    $rsInsContact = mysqli_query($conn, $insContact);
    if($rsInsContact){
        header("location:contact.php?msg=1");
        exit;
    }else{
        header("location:contact.php?msg=2");
        exit;
    }
}
?>