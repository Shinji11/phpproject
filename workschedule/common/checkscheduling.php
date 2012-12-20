<?php
require("../sql/workschedulesql.php");
  $stt2->bindValue(':comcd', $_SESSION['comcd']);
  $stt2->bindValue(':bracd', $_SESSION['bracd']);
  $stt2->bindValue(':scheduledate', $scheduledate);
  $stt2->execute();

$insertusercd = $_POST['nameselect'];


while ($row = $stt2->fetch()) {
	$usercd = e($row['USER_CD']);
	if ($insertusercd ==  $usercd) {
		$messagelist[] = "登録データの名前が重複しています";
		break;
	}
}
if ($_POST["nameselect"] != "") {
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

