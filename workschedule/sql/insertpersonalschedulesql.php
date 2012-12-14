 <?php
 if(!$_POST["insertdate"] == "") {
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
	$message = "登録するデータがありません";
} else {

$stmt = $db->prepare("INSERT INTO PERSONAL_SCHEDULE 
 								  (DEL_FLG, 
 								   USER_ID, 
 								   YEAR, 
 								   MONTH, 
 								   DAY, 
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
 						   	       :year,
 						   	       :month,
 						   	       :day,
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
 $stmt->bindValue(':userid', $userid);
 $stmt->bindValue(':year', $year);
 $stmt->bindValue(':month', $month);
 $stmt->bindValue(':day', $day);
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
}
 ?>