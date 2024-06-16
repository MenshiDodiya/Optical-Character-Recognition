<?php
 
include_once("include/header.php"); 

echo "<br/><br/><br/><br/>";
if (isset($_FILES['image'])) {
    $file_name = $_FILES['image']['name'];
    $file_tmp = $_FILES['image']['tmp_name'];
    $outputfilename = "output/" . time() . ".txt";
    $outputfilename1 = time();
    touch($outputfilename);

    move_uploaded_file($file_tmp, "images/" . $file_name);
    



 echo "<h3><br/><br/><br/><a href='$outputfilename'>Download File</a></h3>";
    echo "<h3><a href='class/sendmail.php?filename=$outputfilename'>Email File</a></h3>";
    echo "<h3><a href='mydocument.php'>View File</a></h3>";
    echo "<h3>Original Image</h3>";
   
    echo '<img src="images/' . $file_name . '" style="width:50%">';

    shell_exec('"C:\\Program Files (x86)\\Tesseract-OCR\\tesseract" "C:\\xampp\\htdocs\\ocr\\images\\' . $file_name . '" out');

    echo "<br><h3>OCR After Reading</h3><br><pre>";
    copy("out.txt", $outputfilename);
    $myfile = fopen("out.txt", "r") or die("Unable to open file!");
    echo $myfiledata =  fread($myfile, filesize("out.txt"));
    
    
    
    require_once("db/configuration.php");
    $u_id = $_SESSION['login_user']['u_id'];
    $insertUserDoc = "INSERT INTO user_document "
            . "(`u_id`, `doc_m_id`, `doc_name`, `upload_response`)"
            . " VALUES('$u_id', '1', '$outputfilename', '$file_name')";

    $rsInsUserDoc = mysqli_query($conn, $insertUserDoc) or die(mysqli_error($conn));
    
     
    fclose($myfile);
//echo "</pre>";
}
?>