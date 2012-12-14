 <?php
$comcd = $_SESSION['comcd'];
$bracd = $_SESSION['bracd'];
$usercd = $_POST['nameselect'];
$userid = $_SESSION['userid'];
$insertuserid = $comcd.$bracd.$usercd;
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
$hours = 0;
if ($six == 1) {
	$hours++;
}
if($seven == 1) {
	$hours++;
}
if($eight == 1) {
	$hours++;
}
if($nine == 1) {
	$hours++;
}
if($ten == 1) {
	$hours++;
}
if($eleven == 1) {
	$hours++;
}
if($twelve == 1) {
	$hours++;
}
if($thirteen == 1) {
	$hours++;
}
if($fourteen == 1) {
	$hours++;
}
if($fifteen == 1) {
	$hours++;
}
if($sixteen == 1) {
	$hours++;
}
if($seventeen == 1) {
	$hours++;
}
if($eighteen == 1) {
	$hours++;
}
if($nineteen == 1) {
	$hours++;
}
if($twenty == 1) {
	$hours++;
}
if($twentyone == 1) {
	$hours++;
}
if($twentytwo == 1) {
	$hours++;
}
if($twentythree == 1) {
	$hours++;
}
if($zero == 1) {
	$hours++;
}
if($one == 1) {
	$hours++;
}

if ($hours == 0) {
	$message = "登録するデータがありません";
} else {
$stmt = $db->prepare("INSERT INTO WORK_SCHEDULE 
 								  (DEL_FLG, 
 								   USER_ID,
 								   SCHEDULE_DATE,
 								   HOURS, 
 								   SIX, 
 								   SEVEN, 
 								   EIGHT, 
 								   NINE, 
 								   TEN, 
 								   ELEVEN, 
 								   TWELVE, 
 								   THIRTEEN, 
 								   FOURTEEN, 
 								   FIFTEEN, 
 								   SIXTEEN, 
 								   SEVENTEEN, 
 								   EIGHTEEN, 
 								   NINETEEN, 
 								   TWENTY, 
 								   TWENTY_ONE, 
 								   TWENTY_TWO, 
 								   TWENTY_THREE, 
 								   ZERO, 
 								   ONE, 
 								   ADD_USER_ID, 
 								   ADD_TIMESTAMP, 
 								   UPD_USER_ID, 
 								   UPD_TIMESTAMP)
 						   VALUES ('0',
 						   	       :userid,
 						   	       :scheduledate,
 						   	       :hours,
 						   	       :six,
 						   	       :seven,
 						   	       :eight,
 						   	       :nine,
 						   	       :ten,
 						   	       :eleven,
 						   	       :twelve,
 						   	       :thirteen,
 						   	       :fourteen,
 						   	       :fifteen,
 						   	       :sixteen,
 						   	       :seventeen,
 						   	       :eighteen,
 						   	       :nineteen,
 						   	       :twenty,
 						   	       :twentyone,
 						   	       :twentytwo,
 						   	       :twentythree,
 						   	       :zero,
 						   	       :one,
 						   	       :adduserid,
 						   	       CURRENT_TIMESTAMP,
 						   	       :upduserid,
 						   	       CURRENT_TIMESTAMP)");
 $stmt->bindValue(':userid', $insertuserid);
 $stmt->bindValue(':scheduledate', $scheduledate);
 $stmt->bindValue(':hours', $hours);
 $stmt->bindValue(':six', $six);
 $stmt->bindValue(':seven', $seven);
 $stmt->bindValue(':eight', $eight);
 $stmt->bindValue(':nine', $nine);
 $stmt->bindValue(':ten', $ten);
 $stmt->bindValue(':eleven', $eleven); 
 $stmt->bindValue(':twelve', $twelve);
 $stmt->bindValue(':thirteen', $thirteen); 
 $stmt->bindValue(':fourteen', $fourteen);
 $stmt->bindValue(':fifteen', $fifteen);
 $stmt->bindValue(':sixteen', $sixteen);
 $stmt->bindValue(':seventeen', $seventeen);
 $stmt->bindValue(':eighteen', $eighteen);
 $stmt->bindValue(':nineteen', $nineteen);
 $stmt->bindValue(':twenty', $twenty);
 $stmt->bindValue(':twentyone', $twentyone);
 $stmt->bindValue(':twentytwo', $twentytwo);
 $stmt->bindValue(':twentythree', $twentythree);
 $stmt->bindValue(':zero', $zero);
 $stmt->bindValue(':one', $one);
 $stmt->bindValue(':adduserid', $userid);
 $stmt->bindValue(':upduserid', $userid);
 $flag = $stmt->execute();
  
	if ($flag) {
		$message = "データは正しく登録できました。";
	} else {
		$message = "データは正しく登録できませんでした。";
	}
}
 ?>