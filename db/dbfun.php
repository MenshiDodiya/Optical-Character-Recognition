<?php
require_once('configuration.php');
function insertData($tableName, $valueArray){
	$sql = "insert into ". $tableName . "". $valueArray;
	$result = mysqli_query($conn, $sql);
	return $result;
}
?>