 <?php
 $comcd = $_SESSION['comcd'];
 $bracd = $_SESSION['bracd'];
 $editusercd = $_POST['editusercd'];
 $deleteuserid = $comcd.$bracd.$editusercd;

$stmt = $db->prepare("DELETE FROM AM_MEMBER 
 							  WHERE DEL_FLG = '0'
 							   AND USER_ID = :userid");
 $stmt->bindValue(':userid', $deleteuserid);
 $flag = $stmt->execute();
  
	if ($flag) {
		$message = "データは正しく削除できました。";
	} else {
		$message = "データは正しく削除できませんでした。";
	}

 ?>