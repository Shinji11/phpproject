 <?php
$userid = $_SESSION['userid'];
$comcd = $_POST['comcd'];
$comnm = $_POST['comnm'];
$bracd = $_POST['bracd'];
$branm = $_POST['branm'];
$stmt = $db->prepare("UPDATE AM_COM
 							  SET COM_NM = :comnm
 								, BRA_NM = :branm
 								, UPD_USER_ID = :upduserid
 								, UPD_TIMESTAMP = CURRENT_TIMESTAMP
 						    WHERE DEL_FLG = '0'
 						      AND COM_CD = :comcd
 						      AND BRA_CD = :bracd");
 $stmt->bindValue(':comcd', $comcd);
 $stmt->bindValue(':bracd', $bracd);
 $stmt->bindValue(':comnm', $comnm);
 $stmt->bindValue(':branm', $branm);
 $stmt->bindValue(':upduserid', $userid);
 $flag = $stmt->execute();
  
	if ($flag) {
		$messagelist[] = "データは正しく更新できました。";
	} else {
		$messagelist[] = "データは正しく更新できませんでした。";
	}
 ?>