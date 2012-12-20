<?php
require("../sql/personalschedulesql.php");
$stt3->bindValue(':userid', $_SESSION['userid']);
$stt3->bindValue(':comcd', $_SESSION['comcd']);
$stt3->bindValue(':bracd', $_SESSION['bracd']);
$stt3->bindValue(':year', $year);
$stt3->bindValue(':month', $month);
$stt3->execute();

$insertdate = $_POST['insertdate'];

while ($row = $stt3->fetch()) {
	$monthdata = e($row['MONTH']);
	$daydata = e($row['DAY']);
	$date = $monthdata."/".$daydata;
	if ($insertdate ==  $date) {
		$messagelist[] = "登録データの日付が重複しています";
		break;
	}
}
if ($_POST["insertdate"] != "") {
$insertdatelist = explode("/", $_POST["insertdate"]);
$day = $insertdatelist[1];
$userid = $_SESSION['userid'];
$six = $_POST['cb6'];
$seven = $_POST['cb7'];
$eight = $_POST['cb8'];
$nine = $_POST['cb9'];
$ten = $_POST['cb10'];
$eleven = $_POST['cb11'];
$twelve = $_POST['cb12'];
$thirteen = $_POST['cb13'];
$fourteen = $_POST['cb14'];
$fifteen = $_POST['cb15'];
$sixteen = $_POST['cb16'];
$seventeen = $_POST['cb17'];
$eighteen = $_POST['cb18'];
$nineteen = $_POST['cb19'];
$twenty = $_POST['cb20'];
$twentyone = $_POST['cb21'];
$twentytwo = $_POST['cb22'];
$twentythree = $_POST['cb23'];
$zero = $_POST['cb24'];
$one = $_POST['cb25'];

if ($six == 0 
		&& $seven == 0
		&& $eight == 0
		&& $nine == 0
		&& $ten == 0
		&& $eleven == 0
		&& $twelve == 0
		&& $thirteen == 0
		&& $fourteen == 0
		&& $fifteen == 0
		&& $sixteen == 0
		&& $seventeen == 0
		&& $eighteen == 0
		&& $nineteen == 0
		&& $twenty == 0
		&& $twentyone == 0
		&& $twentytwo == 0
		&& $twentythree == 0
		&& $zero == 0
		&& $one == 0 ) {
	$messagelist[] = "登録するデータがありません";
	}
}

?>

