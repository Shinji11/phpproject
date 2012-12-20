 <?php
$userid = $_SESSION['userid'];
$comcd = $_POST['comcd'];
$bracd = $_POST['bracd'];

$stmt = $db->prepare("UPDATE AM_COM
 							  SET DEL_FLG = '1'
 								, UPD_USER_ID = :upduserid
 								, UPD_TIMESTAMP = CURRENT_TIMESTAMP
 						    WHERE COM_CD = :comcd
 						      AND BRA_CD = :bracd");
 $stmt->bindValue(':comcd', $comcd);
 $stmt->bindValue(':bracd', $bracd);
 $stmt->bindValue(':upduserid', $userid);
 $flag = $stmt->execute();

$stmt2 = $db->prepare("UPDATE AM_MEMBER
 							  SET DEL_FLG = '1'
 								, UPD_USER_ID = :upduserid
 								, UPD_TIMESTAMP = CURRENT_TIMESTAMP
 						    WHERE COM_CD = :comcd
 						      AND BRA_CD = :bracd");
 $stmt2->bindValue(':comcd', $comcd);
 $stmt2->bindValue(':bracd', $bracd);
 $stmt2->bindValue(':upduserid', $userid);
 $flag2 = $stmt2->execute();
  
	if ($flag && $flag2) {
		$messagelist[] = "データは正しく削除できました。";
	} else {
		$messagelist[] = "データは正しく削除できませんでした。";
	}
 ?>