 <?php
$userid = $_SESSION['userid'];
$comcd = $_POST['comcd'];
$comnm = $_POST['comnm'];
$bracd = $_POST['bracd'];
$branm = $_POST['branm'];
$usercd = $_POST['usercd'];
$lastnm = $_POST['lastnm'];
$firstnm = $_POST['firstnm'];
$password = $_POST['password'];
$adduserid = $comcd.$bracd.$usercd;
$idnum = strlen($usercd);

$stmt = $db->prepare("INSERT INTO AM_COM
 								  (DEL_FLG, 
 								   COM_CD,
 								   COM_NM,
 								   BRA_CD, 
 								   BRA_NM,
 								   ID_NUM,   
 								   ADD_USER_ID, 
 								   ADD_TIMESTAMP, 
 								   UPD_USER_ID, 
 								   UPD_TIMESTAMP)
 						   VALUES ('0',
 						   	       :comcd,
 						   	       :comnm,
 						   	       :bracd,
 						   	       :branm,
 						   	       :idnum,
 						   	       :adduserid,
 						   	       CURRENT_TIMESTAMP,
 						   	       :upduserid,
 						   	       CURRENT_TIMESTAMP)");
 $stmt->bindValue(':comcd', $comcd);
 $stmt->bindValue(':comnm', $comnm);
 $stmt->bindValue(':bracd', $bracd);
 $stmt->bindValue(':branm', $branm);
 $stmt->bindValue(':idnum', $idnum);
 $stmt->bindValue(':adduserid', $userid);
 $stmt->bindValue(':upduserid', $userid);
 $flag = $stmt->execute();

$stmt2 = $db->prepare("INSERT INTO AM_MEMBER 
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
 						   	       '2',
 						   	       :usercd,
 						   	       :userid,
 						   	       :lastnm,
 						   	       :firstnm,
 						   	       :password,
 						   	       :adduserid,
 						   	       CURRENT_TIMESTAMP,
 						   	       :upduserid,
 						   	       CURRENT_TIMESTAMP)");
 $stmt2->bindValue(':comcd', $comcd);
 $stmt2->bindValue(':bracd', $bracd);
 $stmt2->bindValue(':usercd', $usercd);
 $stmt2->bindValue(':userid', $adduserid);
 $stmt2->bindValue(':lastnm', $lastnm);
 $stmt2->bindValue(':firstnm', $firstnm);
 $stmt2->bindValue(':password', $password);
 $stmt2->bindValue(':adduserid', $userid);
 $stmt2->bindValue(':upduserid', $userid);
 $flag2 = $stmt2->execute();
  
	if ($flag && $flag2) {
		$messagelist[] = "データは正しく登録できました。";
	} else {
		$messagelist[] = "データは正しく登録できませんでした。";
	}
 ?>