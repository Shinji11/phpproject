<?php
require("../sql/membersql.php");
  $stt->bindValue(':comcd', $_SESSION['comcd']);
  $stt->bindValue(':bracd', $_SESSION['bracd']);
  $stt->execute();

$insertusercd = $_POST['usercd'];
$insertlastnm = $_POST['lastnm'];
$insertfirstnm = $_POST['firstnm'];
$idnum = $_SESSION['idnum'];
if ($sqlflg != 3) {

if ($insertusercd == "") {
	$messagelist[] = "IDは必須入力です";
} else if (strlen($insertusercd) !=  $idnum) {
	$messagelist[] = "IDは".$idnum."桁指定です";
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


if (count($messagelist) == 0) {
	while ($row = $stt->fetch()) {
		$usercd = e($row['USER_CD']);
		if ($insertusercd ==  $usercd) {
			$messagelist[] = "登録データのIDが重複しています";
			break;
		}
	}
 }

} else {
	while ($row = $stt->fetch()) {
		$authority = e($row['AUTHORITY_CD']);
		if ($authority ==  1 
			|| $authority == 2) {
			$usercd = e($row['USER_CD']);
			if ($usercd == $insertusercd) {
			$messagelist[] = "ここでこのデータは削除できません";
			break;
		}
		}
	}
}
?>

