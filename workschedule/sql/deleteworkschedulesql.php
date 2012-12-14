 <?php
 
$comcd = $_SESSION['comcd'];
$bracd = $_SESSION['bracd'];
$editusercd = $_POST['editusercd'];
$edituserid = $comcd.$bracd.$editusercd;
$stmt = $db->prepare("DELETE FROM WORK_SCHEDULE 
 							WHERE DEL_FLG = '0'
 						      AND USER_ID = :edituserid 
 						      AND SCHEDULE_DATE = :scheduledate");
 $stmt->bindValue(':edituserid', $edituserid);
 $stmt->bindValue(':scheduledate', $scheduledate);
 $flag = $stmt->execute();
  
	if ($flag) {
		$message = "データは正しく削除されました。";
	} else {
		$message = "データは正しく削除できませんでした。";
	}

 ?>