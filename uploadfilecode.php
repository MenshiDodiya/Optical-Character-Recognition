<?php
session_start();
//define('API_KEY','72d5d8fbeecb1c2a9809997537dc1ec8');
define('API key','558aa90c58cc9dfd91a1185a6db00b5e');

require_once("db/configuration.php");
$u_id = $_SESSION['login_user']['u_id'];
if(isset($_POST['btnUpload'])){

    $checkAPIStatus = "http://api.newocr.com/v1/key/status?key=".API_KEY;
    $getTotalCount = file_get_contents($checkAPIStatus);
    $totalCount = json_decode($getTotalCount);
    $pendingCount = $totalCount->data->ocrs_left;
    if($pendingCount==0){
        header("location:mydocument.php?msg=7");
        exit;
    }

    $filePath = 'uploads/';
    $file = $_FILES['fileToUpload']['name'];
    $tempFile = $_FILES['fileToUpload']['tmp_name'];
    $fileSize = $_FILES['fileToUpload']['size'];
    $fileMime = $_FILES['fileToUpload']['type'];

    $fileExtension = strtolower(pathinfo($file,PATHINFO_EXTENSION));

    $selDocType = "SELECT * FROM document_master WHERE doc_type = '".$fileExtension."'  order by created_date DESC";
    $rsDocType = mysqli_query($conn, $selDocType);
    $countDocType = mysqli_num_rows($rsDocType);
	
    if(empty($countDocType)){
        header("location:mydocument.php?msg=6");
        exit;
    }else{
        $docMaster = mysqli_fetch_assoc($rsDocType);
        $doc_m_id = $docMaster['doc_m_id'];
    }
    $uploadedFile = uploadPicture($file,$tempFile,$filePath);

    $originalFile = realpath($uploadedFile);
    
    $url = 'http://api.newocr.com/v1/upload?key='.API_KEY;
    $json = json_encode(array(
    'name' => $file,
    ));
    $params = array(
    'attributes' => $json,
    'file'=>new CurlFile(realpath($uploadedFile),$fileMime,$file)
    );
    
    $ch1 = curl_init();
    curl_setopt($ch1, CURLOPT_URL, $url);
    curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch1, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch1, CURLOPT_POST, true);
    curl_setopt($ch1, CURLOPT_POSTFIELDS, $params);
    $upload_response = curl_exec($ch1);
    $responseCode = curl_getinfo($ch1, CURLINFO_HTTP_CODE);
    $errNo = curl_errno($ch1);
    $errStr = curl_error($ch1);
    curl_close($ch1);
    
    
    $finalResponse = json_decode($upload_response);

    $status = $finalResponse->status;

    if($status!='success'){
        header("location:mydocument.php?msg=6");
        exit;
    }
    $fileId = $finalResponse->data->file_id;
    $pages = $finalResponse->data->pages;
    
    
    /* OCR Code Start */
    $url = 'http://api.newocr.com/v1/ocr?key='.API_KEY.'&file_id='.$fileId.'&page='.$pages.'&lang=eng&psm=6';
    $ocr_response = file_get_contents($url);
    /* OCR Code End */
    
    
    
    $insertUserDoc = "INSERT INTO user_document (`u_id`, `doc_m_id`, `doc_name`, `upload_response`, `ocr_response`) VALUES('$u_id', '$doc_m_id', '$uploadedFile', '$upload_response', '$ocr_response')";
    
    $rsInsUserDoc = mysqli_query($conn, $insertUserDoc);
    $user_doc_id = mysqli_insert_id($conn);
    if($rsInsUserDoc){

        if(!empty($ocr_response)){
            $ocr = json_decode(preg_replace("/[\r\n]+/", " ", $ocr_response));
            $fetchedText = $ocr->data->text;
            $txtFileName = $filePath.strtotime(date('Y-m-d H:i:s')).rand(00000,9999999).".txt";
            $exportFile = file_put_contents($txtFileName, $fetchedText, FILE_APPEND);
            $insExportFile = "INSERT INTO user_export_file (`user_doc_id`, `u_id`, `a_id`, `exp_name`, `exp_type`) VALUES ('$user_doc_id', '$u_id', '1', '$txtFileName', 'txt')";
            $rsInsExportFile = mysqli_query($conn, $insExportFile);
        }

        header("location:mydocument.php?msg=1");
        exit;
    }else{
        header("location:mydocument.php?msg=2");
        exit;
    }
}

function uploadPicture($user_profile_picture, $user_profile_picture_tmp_name, $folderName){
    $user_profile_picture = $user_profile_picture;
    $user_profile_picture_tmp_name = $user_profile_picture_tmp_name;
	if(!empty($user_profile_picture)){
		$timestamp = strtotime(date('H:i:s')).rand();
		$target_dir = $folderName;
		$onlyFileWOExtention = pathinfo($user_profile_picture);
		$filename = $onlyFileWOExtention['filename'];
		$trimSpace = str_replace(" ","",$filename);
		$target_file = $target_dir .$trimSpace.$timestamp . ".".pathinfo($user_profile_picture,PATHINFO_EXTENSION);
		$file_name = $trimSpace.$timestamp. ".".pathinfo($user_profile_picture,PATHINFO_EXTENSION);
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		if(file_exists($file_name)) {
			$uploadOk = 0;
		}
		
		if (move_uploaded_file($user_profile_picture_tmp_name, $target_file)) {
			return $target_file;
		}
	}
}
?>