<?php
$lastnm = $_POST['lastnm'];
$firstnm = $_POST['firstnm'];
$password = $_POST['password'];
$password2 = $_POST['password2'];
$idnum = $_SESSION['idnum'];

if ($lastnm == "") {
	$messagelist[] = "LAST NAMEは必須入力です";
} else if (strlen($lastnm) >  50) {
	$messagelist[] = "LAST NAMEは最大文字数を超えています";
}

if ($firstnm == "") {
	$messagelist[] = "FIRST NAMEは必須入力です";
} else if (strlen($firstnm) >  50) {
	$messagelist[] = "FIRST NAMEは最大文字数を超えています";
}

if ($password == "") {
	$messagelist[] = "PASSWORDは必須入力です";
} else if (strlen($password) <  6) {
	$messagelist[] = "PASSWORDは６文字以上で入力してください";
} else if (strlen($password) >  50) {
	$messagelist[] = "PASSWORDは最大文字数を超えています";
} else if ($password != $password2) {
	$messagelist[] = "PASSWORDが一致しません";
}

?>

