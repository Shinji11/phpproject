 <?php
 
$editdate = explode("/", $_POST["editdate"]);
$day = $editdate[1];
$userid = $_SESSION['userid'];
$stmt = $db->prepare("DELETE FROM PERSONAL_SCHEDULE 
 							  WHERE DEL_FLG = '0'
 							   AND USER_ID = :userid 
 							   AND YEAR = :year 
 							   AND MONTH = :month 
 							   AND DAY = :day");
 $stmt->bindValue(':userid', $userid);
 $stmt->bindValue(':year', $year);
 $stmt->bindValue(':month', $month);
 $stmt->bindValue(':day', $day);
 $flag = $stmt->execute();
  
	if ($flag) {
		$message = "データは正しく削除できました。";
	} else {
		$message = "データは正しく削除できませんでした。";
	}

 ?>