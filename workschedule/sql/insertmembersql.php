 <?php
$comcd = $_SESSION['comcd'];
$bracd = $_SESSION['bracd'];
$usercd = $_POST['usercd'];
$adduserid = $comcd.$bracd.$usercd;
$userid = $_SESSION['userid'];
$authoritycd = $_POST['authority'];
$lastnm = $_POST['lastnm'];
$firstnm = $_POST['firstnm'];


$stmt = $db->prepare("INSERT INTO AM_MEMBER 
 								  (DEL_FLG, 
 								   COM_CD,
 								   BRA_CD,
 								   AUTHORITY_CD, 
 								   USER_CD, 
 								   USER_ID, 
 								   LAST_NM, 
 								   FIRST_NM, 
 								   PASSWORD,  
 								   ADD_USER_ID, 
 								   ADD_TIMESTAMP, 
 								   UPD_USER_ID, 
 								   UPD_TIMESTAMP)
 						   VALUES ('0',
 						   	       :comcd,
 						   	       :bracd,
 						   	       :authoritycd,
 						   	       :usercd,
 						   	       :userid,
 						   	       :lastnm,
 						   	       :firstnm,
 						   	       '9999',
 						   	       :adduserid,
 						   	       CURRENT_TIMESTAMP,
 						   	       :upduserid,
 						   	       CURRENT_TIMESTAMP)");
 $stmt->bindValue(':comcd', $comcd);
 $stmt->bindValue(':bracd', $bracd);
 $stmt->bindValue(':authoritycd', $authoritycd);
 $stmt->bindValue(':usercd', $usercd);
 $stmt->bindValue(':userid', $adduserid);
 $stmt->bindValue(':lastnm', $lastnm);
 $stmt->bindValue(':firstnm', $firstnm);
 $stmt->bindValue(':adduserid', $userid);
 $stmt->bindValue(':upduserid', $userid);
 $flag = $stmt->execute();
  
	if ($flag) {
		$message = "データは正しく登録できました。";
	} else {
		$message = "データは正しく登録できませんでした。";
	}
 ?>