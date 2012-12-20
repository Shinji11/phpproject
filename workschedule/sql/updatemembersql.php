 <?php
$authoritycd = $_POST['authority'];
$usercd = $_POST['usercd'];
$comcd = $_SESSION['comcd'];
$bracd = $_SESSION['bracd'];
$adduserid = $comcd.$bracd.$usercd;
$lastnm = $_POST['lastnm'];
$firstnm = $_POST['firstnm'];
$password = $_POST['password'];
$userid = $_SESSION['userid'];
$editusercd = $_POST['editusercd'];
$edituserid = $comcd.$bracd.$editusercd;

$stmt = $db->prepare("UPDATE AM_MEMBER 
 							    SET AUTHORITY_CD = :authoritycd
 							      , USER_CD = :usercd 
 								  , USER_ID = :userid 
 								  , LAST_NM = :lastnm 
 								  , FIRST_NM = :firstnm 
 								  , PASSWORD = :password 
 								  , UPD_USER_ID = :upduserid 
 								  , UPD_TIMESTAMP = CURRENT_TIMESTAMP
 						     WHERE DEL_FLG = '0'
 						       AND USER_ID = :edituserid");
 $stmt->bindValue(':edituserid', $edituserid);
 $stmt->bindValue(':authoritycd', $authoritycd);
 $stmt->bindValue(':usercd', $usercd);
 $stmt->bindValue(':userid', $adduserid);
 $stmt->bindValue(':lastnm', $lastnm);
 $stmt->bindValue(':firstnm', $firstnm);
 $stmt->bindValue(':password', $password);
 $stmt->bindValue(':upduserid', $userid);
 $flag = $stmt->execute();
  
if ($flag) {
	$messagelist[] = "データは正しく更新されました。";
} else {
	$messagelist[] = "データは正しく更新できませんでした。";
}

 ?>