<?php
$stt = $db->prepare("SELECT * FROM AM_MEMBER ME 
  	                      INNER JOIN AM_COM CO
  	                              ON CO.BRA_CD = ME.BRA_CD
  	                           WHERE ME.DEL_FLG = '0'
  	                             AND ME.AUTHORITY_CD = '2'");
$stt->execute();

$insertcomcd = $_POST['comcd'];
$insertcomnm = $_POST['comnm'];
$insertbracd = $_POST['bracd'];
$insertbranm = $_POST['branm'];
$insertusercd = $_POST['usercd'];
$insertlastnm = $_POST['lastnm'];
$insertfirstnm = $_POST['firstnm'];
$insertpassword = $_POST['password'];
$insertpassword2 = $_POST['password2'];
$insertuserid = $insertcomcd.$insertbracd.$insertusercd;


if ($insertcomcd == "") {
	$messagelist[] = "COMPANY CODEは必須入力です";
} else if (strlen($insertcomcd) >  50) {
	$messagelist[] = "COMPANY CODEは最大文字数を超えています";
}

if ($insertcomnm == "") {
	$messagelist[] = "COMPANY NAMEは必須入力です";
} else if (strlen($insertcomnm) >  50) {
	$messagelist[] = "COMPANY NAMEは最大文字数を超えています";
}

if ($insertbracd == "") {
	$messagelist[] = "BRANCH CODEは必須入力です";
} else if (strlen($insertbracd) >  50) {
	$messagelist[] = "BRANCH CODEは最大文字数を超えています";
}

if ($insertbranm == "") {
	$messagelist[] = "BRANCH NAMEは必須入力です";
} else if (strlen($insertbranm) >  50) {
	$messagelist[] = "BRANCH NAMEは最大文字数を超えています";
}

if ($insertusercd == "") {
	$messagelist[] = "BRANCH IDは必須入力です";
} else if (strlen($insertusercd) >  50) {
	$messagelist[] = "BRANCH IDは最大文字数を超えています";
}

if ($insertlastnm == "") {
	$messagelist[] = "LAST NAMEは必須入力です";
} else if (strlen($insertlastnm) >  50) {
	$messagelist[] = "LAST NAMEは最大文字数を超えています";
}

if ($insertfirstnm == "") {
	$messagelist[] = "FIRST NAMEは必須入力です";
} else if (strlen($insertfirstnm) >  50) {
	$messagelist[] = "FIRST NAMEは最大文字数を超えています";
}

IF ($sqlflg == 1) {
if ($insertpassword == "") {
	$messagelist[] = "PASSWORDは必須入力です";
} else if (strlen($insertpassword) <  6) {
	$messagelist[] = "PASSWORDは６文字以上で入力してください";
} else if (strlen($insertpassword) >  50) {
	$messagelist[] = "PASSWORDは最大文字数を超えています";
} else if ($insertpassword != $insertpassword2) {
	$messagelist[] = "PASSWORDが一致しません";
}

if (count($messagelist) == 0) {
	while ($row = $stt->fetch()) {
		$userid = e($row['USER_ID']);
		if ($insertuserid ==  $userid) {
			$messagelist[] = "登録データのIDが重複しています";
			break;
		}
	}
 }
}
?>

